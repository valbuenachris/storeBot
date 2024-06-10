<?php

function rutina($pdo, $from) {
    // Incluir el archivo que contiene la API key
    require_once 'api_key.php';

    // Mensajes de texto
    $mensajes = array(

"*Rutina de Skincare Básica Noche*
Piel normal / mixta / grasa / seca:
-Leche desmaquillante 
-Espuma Facial
-Niacinamida 
-Contorno de ojos noche",  

"*Rutina de Skincare anti Manchas Noche* 
-Leche desmaquillante 
-Espuma facial 
-Tonico despigmentante 
-Contorno de ojos noche",

"*Rutina de Skincare para Acné Noche* 
-Leche desmaquillante 
-Espuma facial 
-Tonico despigmentante 
-Contorno de ojos noche",

"*Rutina de Skincare Básica Día*
Piel normal - mixta:
-Tonico de rosas 
-Niacinamida 
-Ácido hialuronico serum
-Bloqueador solar",

"*Rutina de Skincare Básica Dia*
Piel grasa:
-Tónico de rosas 
-Niacinamida 
-Ácido hialuronico en gel 
-Bloqueador solar",

"*Rutina de Skincare Básica Dia*
Piel seca
-Tonico de rosas 
-Niacinamida 
-Ácido hialuronico serum 
-Crema hidratante 
-Bloqueador solar",


"*Rutina de Skincare anti Manchas Día:*
-Tonico facial de rosas 
-Niacinamida 
-ácido hialuronico serum
-Bloqueador solar ",


"*Rutina de Skincare Acné Día:* 
-Tonico facial de rosas 
-Niacinamida 
-Ácido hialuronico 
-Bloqueador solar"

);

    // Enviar cada mensaje de texto
    foreach ($mensajes as $mensaje) {
        enviarMensajeRutina($from, $mensaje);
    }

    // Actualizar el estado 
    update_status($pdo, $from, 'faQrutina');
}

// Función para enviar mensajes de texto
function enviarMensajeRutina($from, $mensaje) {
    enviarMensajesRutina($from, $mensaje);
}

// Función genérica para enviar mensajes
function enviarMensajesRutina($from, $mensaje) {
    $api_key = API_KEY;
    $body = array(
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => array("message" => $mensaje)
    );
    return sendCurlRequestText($body);
}

?>
