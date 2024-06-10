<?php

function comprarSpray($pdo, $from) {
    
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    // Incluir el archivo que contiene la API key
    require_once 'api_key.php';
    
    // La primera condicion es solo una puerta. Se debe cambiar al terminar
    if ($status === 'spray') {
      
    // Mensajes de texto
    $mensajes = array(
        
        "1️⃣ Spray Glitter Mango \n2️⃣  Spray Glitter Bombombum"
    );

    // Enviar cada mensaje de texto
    foreach ($mensajes as $mensaje) {
        enviarMensajecomprarSpray($from, $mensaje);
    }
    
    // Actualizar el estado 
    update_status($pdo, $from, 'comprarSpray');
    
    } 
}


// Función para enviar mensajes de texto
function enviarMensajecomprarSpray($from, $mensaje) {
    enviarMensajescomprarSpray($from, $mensaje);
}

// Función genérica para enviar mensajes
function enviarMensajescomprarSpray($from, $mensaje) {
    $api_key = API_KEY;
    $body = array(
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => array("message" => $mensaje)
    );
    return sendCurlRequestText($body);
}

?>

