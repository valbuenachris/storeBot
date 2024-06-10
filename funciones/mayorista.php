<?php

function mayorista($pdo, $from) {
    // Incluir el archivo que contiene la API key
    require_once 'api_key.php';

    // Mensajes de texto
    $mensajes = array(
        "¡Aquí te presento nuestras políticas para convertirte en distribuidora! 🌟",
        "Para acceder a nuestros precios al por mayor, simplemente necesitas comprar un mínimo de 6 unidades de la misma referencia. ¡No olvides que no se permite mezclar 6 unidades de diferentes productos!",
        "Una vez hecho esto, ¡estarás lista para convertirte en una distribuidora oficial de la mejor marca de cuidado facial! 💼",
        "Nosotros te proporcionaremos fotos, videos e imágenes para que tus clientes sepan que eres una de nuestras distribuidoras autorizadas. ¡Además, te brindaremos apoyo durante todo el proceso! 💪",
        "Ya te envío el catálogo ¿tienes alguna otra pregunta? ¡Estamos aquí para ayudarte! 😊📦",
        "1️⃣ Ver Preguntas Frecuentes (FAQ) 🤔 \n2️⃣ Para ir al *Menu* Principal 🛍"
    );

    // Enviar cada mensaje de texto
    foreach ($mensajes as $mensaje) {
        enviarMensajeTexto($from, $mensaje);
    }

    // Enviar el catálogo como imagen
    $response = enviarImagen($from, "http://bot.tienderu.com/app/storage?url=1/catalogoMayoristas.pdf");
    // Enviar el catálogo como imagen
    $response = enviarImagen($from, "http://bot.tienderu.com/app/storage?url=1/catalogoSkinNuevo.pdf");

    // Actualizar el estado 
    update_status($pdo, $from, 'faQmayorista');
}

// Función para enviar mensajes de texto
function enviarMensajeTexto($from, $mensaje) {
    enviarMensaje($from, $mensaje);
}

// Función para enviar imágenes
function enviarImagen($from, $url) {
    $api_key = API_KEY;
    $body = array(
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => array(
            "url" => $url,
            "media_type" => "file",
            "caption" => ""
        )
    );
    return sendCurlRequestImage($body);
}

// Función genérica para enviar mensajes
function enviarMensaje($from, $mensaje) {
    $api_key = API_KEY;
    $body = array(
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => array("message" => $mensaje)
    );
    return sendCurlRequestText($body);
}

?>
