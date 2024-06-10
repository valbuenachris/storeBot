
<?php
    
function preguntas($pdo, $from) {
    // Incluir el archivo que contiene la API key
    require_once 'api_key.php';
    
    // Actualizar el estado 
    update_status($pdo, $from, 'preguntas');

    // Mensajes de texto para el encabezado
    $mensajesHeader = array(
        "¡Explora nuestras preguntas frecuentes y encuentra respuestas útiles! Simplemente envía el número correspondiente y te ayudaremos. 🌟💬",
"¿Tienes dudas? Nuestras preguntas frecuentes tienen todas las respuestas que necesitas. ¡Envía el número y descúbrelo ahora mismo! 🤔📋",
"¿Buscas respuestas rápidas? ¡Consulta nuestras preguntas frecuentes! Solo envía el número de la pregunta que te interesa y te ayudaremos. 📝💬",
"¿Necesitas información? Accede a nuestras preguntas frecuentes y resuelve tus dudas al instante. ¡Envía el número de la pregunta que te intriga y conoce más! 🧐📖",
"¡Encuentra soluciones en nuestras preguntas frecuentes! Solo envía el número de la pregunta y te proporcionaremos la respuesta que necesitas. 💬🔍"
    );

    // Obtener un mensaje aleatorio para el encabezado
    $mensajeAleatorioHeader = $mensajesHeader[array_rand($mensajesHeader)];

    // Enviar el mensaje aleatorio para el encabezado
    enviarMensajeHeader($from, $mensajeAleatorioHeader);
    
    // Mensajes de texto para las preguntas
    $mensajesPreguntas = array(
        "1️⃣ ¿Cuál es el horario de atención?  ⏰ ",
        "2️⃣ ¿Dónde se encuentran ubicados? 📍",
        "3️⃣ ¿Cómo puedo ser mayorista?  💼",
        "4️⃣ ¿Cuál es la garantía del tónico despigmentante? 🔍",
        "5️⃣ ¿Cuáles son los componentes del tónico? 🌿",
        "6️⃣️ ¿Cómo tratar manchas? 🧖‍♀",
        "7️⃣ ¿En cuánto tiempo se ven los resultados? ⏳ ",
        "8️⃣ ¿Qué hacer si tengo 🚫 enrojecimiento? ",
        "9️⃣ ¿Tienen catálogo? 📚",
        "🔟 ¿Manejan pagos contra entrega? 💳 ",
        "0️⃣ Para ir al *Menu* Principal 🛍️"
    );

    // Enviar cada mensaje de texto para las preguntas
    foreach ($mensajesPreguntas as $mensajePregunta) {
        enviarMensajePreguntas($from, $mensajePregunta);
    }

    
}

// Función para enviar mensajes de texto para el encabezado
function enviarMensajeHeader($from, $mensaje) {
    $api_key = API_KEY;
    $body = array(
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => array("message" => $mensaje)
    );
    return sendCurlRequestText($body);
}

// Función para enviar mensajes de texto para las preguntas
function enviarMensajePreguntas($from, $mensaje) {
    $api_key = API_KEY;
    $body = array(
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => array("message" => $mensaje)
    );
    return sendCurlRequestText($body);
}

?>