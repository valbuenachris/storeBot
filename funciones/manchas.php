<?php

function manchas($pdo, $from) {
    // Incluir el archivo que contiene la API key
    require_once 'api_key.php';

    // Mensajes de texto
    $mensajes = array(
        "Las manchas deben tratarse de por vida.",
        
        "🌟 *NINGUN* producto para manchas, láser, químico, peeling, ni limpiezas de hígado son definitivas.",
        "Inicialmente, usar el producto DIARIO hasta eliminar las manchas, aproximadamente 5 tónicos.",
        "Luego, por MANTENIMIENTO, usarlo 3 VECES POR SEMANA.",
        "Si alguna empresa te promete eliminar las manchas de por vida con 1 o 2 productos, te están queriendo ESTAFAR, ya que tal cosa no existe.",

        "1️⃣ Ver Preguntas Frecuentes (FAQ) 🤔 \n2️⃣ Para ir al *Menu* Principal 🛍️"
    );

    // Enviar cada mensaje de texto
    foreach ($mensajes as $mensaje) {
        enviarMensajeManchas($from, $mensaje);
    }

    // Actualizar el estado 
    update_status($pdo, $from, 'faQmanchas');
}

// Función para enviar mensajes de texto
function enviarMensajeManchas($from, $mensaje) {
    enviarMensajesManchas($from, $mensaje);
}

// Función genérica para enviar mensajes
function enviarMensajesManchas($from, $mensaje) {
    $api_key = API_KEY;
    $body = array(
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => array("message" => $mensaje)
    );
    return sendCurlRequestText($body);
}

?>
