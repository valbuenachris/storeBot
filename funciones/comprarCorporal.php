<?php

function comprarCorporal($pdo, $from) {
    
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    // Incluir el archivo que contiene la API key
    require_once 'api_key.php';
    
    // La primera condicion es solo una puerta. Se debe cambiar al terminar
    if ($status === 'corporal') {
      
    // Mensajes de texto
    $mensajes = array(
        
        "1️⃣ Dúo Corporal Mango \n2️⃣ Dúo Corporal Bombombum "
    );

    // Enviar cada mensaje de texto
    foreach ($mensajes as $mensaje) {
        enviarMensajeComprarCorporal($from, $mensaje);
    }
    
    // Actualizar el estado 
    update_status($pdo, $from, 'comprarCorporal');
    
    } 
}


// Función para enviar mensajes de texto
function enviarMensajeComprarCorporal($from, $mensaje) {
    enviarMensajesComprarCorporal($from, $mensaje);
}

// Función genérica para enviar mensajes
function enviarMensajesComprarCorporal($from, $mensaje) {
    $api_key = API_KEY;
    $body = array(
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => array("message" => $mensaje)
    );
    return sendCurlRequestText($body);
}

?>

