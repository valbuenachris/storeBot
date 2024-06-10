<?php

function contraentrega($pdo, $from) {
    // Incluir el archivo que contiene la API key
    require_once 'api_key.php';

    // Mensajes de texto
    $mensajes = array(
        "¡Por supuesto! 💳 Aceptamos pagos contra entrega en la ciudad de Neiva, Huila",
        "1️⃣ Ver Preguntas Frecuentes (FAQ) 🤔\n2️⃣ Para ir al *Menu* Principal🛍️"
    );

    // Enviar cada mensaje de texto
    foreach ($mensajes as $mensaje) {
        enviarMensajeContraentrega($from, $mensaje);
    }

    // Actualizar el estado 
    update_status($pdo, $from, 'faQcontraentrega');
}

// Función para enviar mensajes de texto
function enviarMensajeContraentrega($from, $mensaje) {
    enviarMensajesContraentrega($from, $mensaje);
}

// Función genérica para enviar mensajes
function enviarMensajesContraentrega($from, $mensaje) {
    $api_key = API_KEY;
    $body = array(
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => array("message" => $mensaje)
    );
    return sendCurlRequestText($body);
}

?>
