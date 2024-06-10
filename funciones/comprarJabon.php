<?php

function comprarEspuma($pdo, $from) {
    
    // Verificar el estado del usuario en la tabla sesiones
    $stmt = $pdo->prepare("SELECT perfil FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $perfil = $stmt->fetchColumn();
   
    // Incluir el archivo que contiene la API key
    require_once 'api_key.php';
    
    
    // Obtener el producto y el precio del id=7 en la tabla productos
    $stmt = $pdo->prepare("SELECT producto, precio FROM productos WHERE id = 7");
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    // Insertar el pedido en la tabla pedidos con el producto y el precio obtenidos
    $stmt = $pdo->prepare("INSERT INTO pedidos (user_id, perfil, producto, precio) VALUES (?, 'comprando', ?, ?)");
    $stmt->execute([$from, $producto['producto'], $producto['precio']]);

    
    /*/////////////   MENSAJE   ////////////*/

        $stmt = $pdo->query("SELECT * FROM headerComprar ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']}\n";
        }

        // Establecer la API utilizando la constante definida en api_key.php
        $api_key = API_KEY;

        // Mensaje de texto con el menú
        $body = array(
            "api_key" => $api_key,
            "receiver" => $from,
            "data" => array("message" => $menuMessage)
        );

        // Enviar solicitud de texto
        $response = sendCurlRequestText($body);
        
        // Actualizar el perfil 
        update_perfil($pdo, $from, 'cantidades');
        // Actualizar el estado 
        update_status($pdo, $from, 'jabon');
    
    // Retornar la respuesta
    return $response;
}

?>
