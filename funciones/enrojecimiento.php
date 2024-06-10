<?php

function enrojecimiento($pdo, $from) {
    // Incluir el archivo que contiene la API key
    require_once 'api_key.php';
    

    // Mensajes de texto
    $mensajes = array(
        "Te cuento sobre los componentes del tónico despigmentante: 💬",
        "Debido a que contiene ácidos, es completamente normal experimentar un poco de enrojecimiento, descamación, sequedad, comezón, brotes o pequeñas inflamaciones. Estos efectos pueden presentarse en algunos casos.",
        "Si te ocurre alguno de estos síntomas, no dudes en pedir recomendaciones para aliviarlos. Este proceso puede durar de 3 a 7 días, aunque dependiendo del tipo de piel, puede durar más o menos tiempo.",
        "Para contrarrestar estos efectos, te recomendamos aplicar un hidratante durante el día, como ácido hialurónico o niacinamida, y utilizar protector solar al menos 3 veces al día. ¡Así garantizas una piel saludable y protegida! ☀️🌿",
        "1️⃣ Ver Preguntas Frecuentes (FAQ) 🤔 \n2️⃣ Para ir al *Menu* Principal 🛍️"
    );

    // Enviar cada mensaje de texto
    foreach ($mensajes as $mensaje) {
        enviarMensajeEnrojecimiento($from, $mensaje);
    }

    // Actualizar el estado 
    update_status($pdo, $from, 'tonicoRespuesta');
}

// Función para enviar mensajes de texto
function enviarMensajeEnrojecimiento($from, $mensaje) {
    enviarMensajesEnrojecimiento($from, $mensaje);
}

// Función genérica para enviar mensajes
function enviarMensajesEnrojecimiento($from, $mensaje) {
    $api_key = API_KEY;
    $body = array(
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => array("message" => $mensaje)
    );
    return sendCurlRequestText($body);
}

?>
