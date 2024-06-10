<?php

function tonico($pdo, $from) {
    
        /*/////////////   MENSAJE   ////////////*/

        $stmt = $pdo->query("SELECT * FROM headerTonico ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']}\n";
        }

        // Establecer la API utilizando la constante definida en api_key.php
        $api_key = API_KEY;

        // Mensaje de texto con el menú
        $body = array(
            "api_key" => $api_key,
            "receiver" => $from,
            "data" => array("message" => $menuMessage)
        );

        // Enviar solicitud de texto
        $response = sendCurlRequestText($body);
        
        /*/////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM subHeaderTonico ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']}\n";
        }

        // Establecer la API utilizando la constante definida en api_key.php
        $api_key = API_KEY;

        // Mensaje de texto con el menú
        $body = array(
            "api_key" => $api_key,
            "receiver" => $from,
            "data" => array("message" => $menuMessage)
        );

        // Enviar solicitud de texto
        $response = sendCurlRequestText($body);
        
        /*/////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM tonico ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']}\n";
        }

        // Establecer la API utilizando la constante definida en api_key.php
        $api_key = API_KEY;

        // Mensaje de texto con el menú
        $body = array(
            "api_key" => $api_key,
            "receiver" => $from,
            "data" => array("message" => $menuMessage)
        );

        // Enviar solicitud de texto
        $response = sendCurlRequestText($body);
        
        /*/////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM tonicoUno ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']}\n";
        }

        // Establecer la API utilizando la constante definida en api_key.php
        $api_key = API_KEY;

        // Mensaje de texto con el menú
        $body = array(
            "api_key" => $api_key,
            "receiver" => $from,
            "data" => array("message" => $menuMessage)
        );

        // Enviar solicitud de texto
        $response = sendCurlRequestText($body);
        
        /*/////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM tonicoDos ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']}\n";
        }

        // Establecer la API utilizando la constante definida en api_key.php
        $api_key = API_KEY;

        // Mensaje de texto con el menú
        $body = array(
            "api_key" => $api_key,
            "receiver" => $from,
            "data" => array("message" => $menuMessage)
        );

        // Enviar solicitud de texto
        $response = sendCurlRequestText($body);
        
        //////////////   MENSAJE IMAGEN  ////////////
        
        // Establecer la API utilizando la constante definida en api_key.php
$api_key = API_KEY;

// Array de URLs de las imágenes
$image_urls = array(
    "http://bot.tienderu.com/app/storage?url=1/tonicoTestimonioUno.jpeg",
    "http://bot.tienderu.com/app/storage?url=1/tonicoTestimonioDos.jpeg",
    "http://bot.tienderu.com/app/storage?url=1/tonicoTestimonioTres.jpeg",
    "http://bot.tienderu.com/app/storage?url=1/tonicoTestimonioCuatro.jpeg",
    "http://bot.tienderu.com/app/storage?url=1/tonicoTestimonioCinco.jpeg",
    "http://bot.tienderu.com/app/storage?url=1/tonicoTestimonioSeis.jpeg",
    "http://bot.tienderu.com/app/storage?url=1/tonicoTestimonioSiete.jpeg",
    "http://bot.tienderu.com/app/storage?url=1/tonicoTestimonioOcho.jpeg",
    "http://bot.tienderu.com/app/storage?url=1/tonicoTestimonioNueve.jpeg",
    "http://bot.tienderu.com/app/storage?url=1/tonicoTestimonioDiez.jpeg",
    "http://bot.tienderu.com/app/storage?url=1/tonicoTestimonioOnce.jpeg",
    "http://bot.tienderu.com/app/storage?url=1/tonicoTestimonioDoce.jpeg"
);

// Iterar sobre cada URL de imagen y enviarla como una solicitud individual
foreach ($image_urls as $url) {
    $body = array(
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => array(
            "url" => $url,
            "media_type" => "image",
            "caption" => ""
        )
    );

    // Enviar solicitud de imagen
    $response = sendCurlRequestImage($body);
}
                    
        /*/////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM tonicoTres ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']}\n";
        }

        // Establecer la API utilizando la constante definida en api_key.php
        $api_key = API_KEY;

        // Mensaje de texto con el menú
        $body = array(
            "api_key" => $api_key,
            "receiver" => $from,
            "data" => array("message" => $menuMessage)
        );

        // Enviar solicitud de texto
        $response = sendCurlRequestText($body);
        
        /*/////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM tonicoCuatro ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']}\n";
        }

        // Establecer la API utilizando la constante definida en api_key.php
        $api_key = API_KEY;

        // Mensaje de texto con el menú
        $body = array(
            "api_key" => $api_key,
            "receiver" => $from,
            "data" => array("message" => $menuMessage)
        );

        // Enviar solicitud de texto
        $response = sendCurlRequestText($body);
        
        
        /*/////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM menuTonico");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['icono']} {$item['item']}\n";
        }

        // Establecer la API utilizando la constante definida en api_key.php
        $api_key = API_KEY;

        // Mensaje de texto con el menú
        $body = array(
            "api_key" => $api_key,
            "receiver" => $from,
            "data" => array("message" => $menuMessage)
        );

        // Enviar solicitud de texto
        $response = sendCurlRequestText($body);
        
        
        // Actualizar el estado 
        update_status($pdo, $from, 'tonico');
    }
    
?>
