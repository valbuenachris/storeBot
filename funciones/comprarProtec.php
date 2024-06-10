<?php

function comprarProtector($pdo, $from) {
    
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    // Incluir el archivo que contiene la API key
    require_once 'api_key.php';
    
    // La primera condicion es solo una puerta. Se debe cambiar al terminar
    if ($status === 'protector') {
      
    // Mensajes de texto
    $mensajes = array(
        
        "1️⃣ Protector Vegano x 60 ml \n2️⃣ Protector Vegano x 120 ml \n3️⃣ Protector Color BB Cream"
    );

    // Enviar cada mensaje de texto
    foreach ($mensajes as $mensaje) {
        enviarMensajecomprarProtector($from, $mensaje);
    }
    
    // Actualizar el estado 
    update_status($pdo, $from, 'comprarProtector');
    
    } 
}


// Función para enviar mensajes de texto
function enviarMensajecomprarProtector($from, $mensaje) {
    enviarMensajescomprarProtector($from, $mensaje);
}

// Función genérica para enviar mensajes
function enviarMensajescomprarProtector($from, $mensaje) {
    $api_key = API_KEY;
    $body = array(
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => array("message" => $mensaje)
    );
    return sendCurlRequestText($body);
}

?>

