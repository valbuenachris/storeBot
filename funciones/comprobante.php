<?php

function comprobante($pdo, $from, $message) {
    try {
        // Incluir el archivo que contiene la API key
        require_once 'api_key.php';
        
        // Construir el mensaje del menú
        $menuMessage = "🏦 ¡Aquí tienes los datos de nuestra cuenta bancaria para que puedas realizar tu transferencia!

ℹ️ Banco: Bancolombia
💼 Tipo de cuenta: Ahorros
💰 Número de cuenta: 123-456789-00
👤 Titular: Tienderu S.A.S

¡Gracias por elegirnos para tus compras!";
        
        // Establecer la API utilizando la constante definida en api_key.php
        $api_key = API_KEY;
        
        // Mensaje de texto con el menú
        $body = [
            "api_key" => $api_key,
            "receiver" => $from,
            "data" => ["message" => $menuMessage]
        ];
        
        // Enviar solicitud de texto
        $response = sendCurlRequestText($body);
        
        // URL por defecto para la imagen del comprobante
        $defaultImageURL = "http://example.com/default_comprobante.jpg";
        
        // Si se recibió una imagen en el mensaje
        if(isset($message['image_url'])) {
            // Guardar la imagen en un directorio
            $imageURL = guardarImagen($message['image_url']);
        } else {
            $imageURL = $defaultImageURL;
        }
        
        // Insertar la URL de la imagen del comprobante en la base de datos
        $stmt = $pdo->prepare("INSERT INTO comprobantes (user_id, image_url) VALUES (?, ?)");
        $stmt->execute([$from, $imageURL]);
        
        // Establecer la API utilizando la constante definida en api_key.php
        $api_key = API_KEY;
        
        // Mensaje de imagen con el comprobante
        $body = [
            "api_key" => $api_key,
            "receiver" => $from,
            "data" => [
                "url" => $imageURL,
                "media_type" => "image",
                "caption" => ""
            ]
        ];
        
        // Enviar solicitud de imagen
        $response = sendCurlRequestImage($body);
        
        // Obtener el mensaje del menú
        $stmt = $pdo->query("SELECT * FROM subHeaderComprobante ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']}\n";
        }
        
        // Mensaje de texto con el menú
        $body = [
            "api_key" => $api_key,
            "receiver" => $from,
            "data" => ["message" => $menuMessage]
        ];
        
        // Enviar solicitud de texto
        $response = sendCurlRequestText($body);
        
        // Obtener el mensaje del menú de la función menuComprobante
        $menuMessage = menuComprobante($pdo, $from);
        
        // Actualizar el estado 
        update_status($pdo, $from, 'comprobante');
        
        return $response;
    } catch (PDOException $e) {
        // Manejar errores de la base de datos
        return [
            'message_type' => 'text',
            'message' => [
                'message' => 'Error en la base de datos: ' . $e->getMessage()
            ]
        ];
    } catch (Exception $e) {
        // Manejar otros errores
        return [
            'message_type' => 'text',
            'message' => [
                'message' => 'Error: ' . $e->getMessage()
            ]
        ];
    }
}

// Función para guardar la imagen en un directorio y retornar la URL
function guardarImagen($imageData) {
    // Directorio donde se guardará la imagen
    $uploadDir = "uploads/";
    
    // Crear el directorio si no existe
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    // Generar un nombre único para la imagen
    $fileName = uniqid() . '.jpg';
    
    // Ruta completa de la imagen
    $filePath = $uploadDir . $fileName;
    
    // Decodificar y guardar la imagen
    $imageData = base64_decode($imageData);
    file_put_contents($filePath, $imageData);
    
    // Retornar la URL de la imagen guardada
    return $filePath;
}



?>
