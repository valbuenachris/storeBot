<?php

function componentesTonico($pdo, $from) {
    
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    // Incluir el archivo que contiene la API key
    require_once 'api_key.php';
    
    // La primera condicion es solo una puerta. Se debe cambiar al terminar
    if ($status === 'tonicoRespuesta') {
      
    // Mensajes de texto
    $mensajes = array(
        "🌿🌊 Los ingredientes de nuestro tónico facial incluyen:",
        "🌿 Alcohol
💧 Niacinamida
🌟 Ácido glicólico
🌺 Glicerina
🌟 Retinol
🌿 Aceite de ricino hidrogenado PEG-40
🍋 Ácido cítrico
❄️ Alcanfor
💦 Agua
🌸 Fragancia",
        "1️⃣ Ver Preguntas Frecuentes (FAQ) 🤔 \n2️⃣ Para ir al *Menu* Principal 🛍️"
    );

    // Enviar cada mensaje de texto
    foreach ($mensajes as $mensaje) {
        enviarMensajeComponentesTonico($from, $mensaje);
    }
    
    // Actualizar el estado 
    update_status($pdo, $from, 'tonicoRespuesta');
    
    } 
}


// Función para enviar mensajes de texto
function enviarMensajeComponentesTonico($from, $mensaje) {
    enviarMensajesComponentesTonico($from, $mensaje);
}

// Función genérica para enviar mensajes
function enviarMensajesComponentesTonico($from, $mensaje) {
    $api_key = API_KEY;
    $body = array(
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => array("message" => $mensaje)
    );
    return sendCurlRequestText($body);
}


function componentes($pdo, $from) {
    // Incluir el archivo que contiene la API key
    require_once 'api_key.php';

    // Mensajes de texto
    $mensajes = array(
        "🌿🌊 Los ingredientes de nuestro tónico facial incluyen:",
        "🌿 Alcohol
💧 Niacinamida
🌟 Ácido glicólico
🌺 Glicerina
🌟 Retinol
🌿 Aceite de ricino hidrogenado PEG-40
🍋 Ácido cítrico
❄️ Alcanfor
💦 Agua
🌸 Fragancia",
        "1️⃣ Ver Preguntas Frecuentes (FAQ) 🤔 \n2️⃣ Para ir al *Menu* Principal 🛍️"
    );

    // Enviar cada mensaje de texto
    foreach ($mensajes as $mensaje) {
        enviarMensajeComponentes($from, $mensaje);
    }

    // Actualizar el estado 
    update_status($pdo, $from, 'tonicoRespuesta');
}

// Función para enviar mensajes de texto
function enviarMensajeComponentes($from, $mensaje) {
    enviarMensajesComponentes($from, $mensaje);
}

// Función genérica para enviar mensajes
function enviarMensajesComponentes($from, $mensaje) {
    $api_key = API_KEY;
    $body = array(
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => array("message" => $mensaje)
    );
    return sendCurlRequestText($body);
}

/////////////////////////////////////////////////////////////

?>
