<?php

function registrarCliente($pdo, $from) {
    try {
        // Eliminar registros de la tabla 'clientes' donde 'user_id' coincide con el valor dado
        $stmt = $pdo->prepare("DELETE FROM clientes WHERE user_id = ?");
        $stmt->execute([$from]);
        
        // Insertar un nuevo registro si el usuario no existe
        $stmt = $pdo->prepare("INSERT INTO clientes (user_id, nombre, telefono) VALUES (?, 'Sin Nombre', ?)");
        
        // Extraer los primeros 12 caracteres del número de teléfono
        $telefono = substr($from, 0, 12);
        
        // Ejecutar la consulta
        $stmt->execute([$from, $telefono]);
        
        // Construir el mensaje del menú
        $menuMessage = "👋🏼 ¿Podrías proporcionarnos tu nombre completo, incluyendo tanto tu nombre como tu apellido? Por ejemplo, *Juan Pérez*. ¡Gracias! 😊📝\n";
        
        
        // Actualizar el estado del cliente en la tabla 'sesiones'
        $stmt = $pdo->prepare("UPDATE sesiones SET status = 'nombreCliente' WHERE user_id = ?");
        $stmt->execute([$from]);

        // Mostrar mensajes al cliente
        enviarMensajeTexto($from, $menuMessage);

        return $menuMessage;
    } catch (PDOException $e) {
        // Manejar errores de base de datos
        return "Se produjo un error al registrar al cliente. Por favor, inténtalo de nuevo más tarde.";
    }
}



// Definición de la función para manejar el caso del estado 'registrar'
function nombreCliente($pdo, $from, $message) {
    
    // Actualizar el estado a "registrado" para indicar que se ha recibido el nombre
    
    $stmt = $pdo->prepare("UPDATE clientes SET nombre = ? WHERE user_id = ? AND nombre = 'Sin Nombre'");
    $stmt->execute([$message, $from]);

    // Obtener todos los registros del usuario
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE user_id = ?");
    $stmt->execute([$from]);
    $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Construir el mensaje del menú
    $menuMessage = '';
    foreach ($menuItems as $item) {
        $menuMessage .= "👋🏼 Ingresa tu dirección de envío 🏠📦";
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
    
    // Actualizar el estado del cliente en la tabla 'sesiones'
        $stmt = $pdo->prepare("UPDATE sesiones SET status = 'direccionCliente' WHERE user_id = ?");
        $stmt->execute([$from]);

    return $response;
}


// Definición de la función para manejar el caso del estado 'registrar'
function direccionCliente($pdo, $from, $message) {
    
    // Actualizar el estado a "registrado" para indicar que se ha recibido el nombre
    
    $stmt = $pdo->prepare("UPDATE clientes SET direccion = ? WHERE user_id = ?");
    $stmt->execute([$message, $from]);

    // Obtener todos los registros del usuario
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE user_id = ?");
    $stmt->execute([$from]);
    $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Construir el mensaje del menú
    $menuMessage = '';
    foreach ($menuItems as $item) {
        $menuMessage .= "😊 Indícanos tu ciudad  🌆 ";
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
    
    // Actualizar el estado del cliente en la tabla 'sesiones'
        $stmt = $pdo->prepare("UPDATE sesiones SET status = 'ciudadCliente' WHERE user_id = ?");
        $stmt->execute([$from]);

    return $response;
}

// Definición de la función para manejar el caso del estado 'registrar'
function ciudadCliente($pdo, $from, $message) {
    
    // Actualizar el estado a "registrado" para indicar que se ha recibido el nombre
    
    $stmt = $pdo->prepare("UPDATE clientes SET ciudad = ? WHERE user_id = ?");
    $stmt->execute([$message, $from]);

    // Obtener todos los registros del usuario
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE user_id = ?");
    $stmt->execute([$from]);
    $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Construir el mensaje del menú
    $menuMessage = '';
    foreach ($menuItems as $item) {
        $menuMessage .= "Gracias *{$item['nombre']}* 💖💄 ";
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
        
    // Construir el mensaje del menú
            $menuMessage = verCompra($pdo, $from);
    

    return $response;
}

?>