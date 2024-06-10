<?php

// Definición de la función para manejar el caso del estado 'registrar'
function manejarEstadoRegistrar($pdo, $from, $message) {
    
    // Actualizar el estado a "registrado" para indicar que se ha recibido el nombre
    
    $stmt = $pdo->prepare("UPDATE sesiones SET status = 'inicio', perfil = 'registrado', nombre = ? WHERE user_id = ?");
    $stmt->execute([$message, $from]);

    // Obtener todos los registros del usuario
    $stmt = $pdo->prepare("SELECT * FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Construir el mensaje del menú
    $menuMessage = '';
    foreach ($menuItems as $item) {
        $menuMessage .= "Hola *{$item['nombre']}* 💖💄\n";
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
    
    //////////////////////////////////////////////
    
    // Construir el mensaje del menú
        $menuMessage = menu($pdo, $from);

    return $response;
}

?>