<?php

function tres($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    // La primera condicion es solo una puerta. Se debe cambiar al terminar
    if ($status === 'inicio' ) {
        // Incluir el archivo que contiene la API key
        require_once 'api_key.php';

    /////////////////////////////////////////////
        
        // Establecer la API utilizando la constante definida en api_key.php
        $api_key = API_KEY;
        
        // Array de URLs de las imágenes
        $image_urls = array(
            "http://bot.tienderu.com/app/storage?url=1/serumCejas.png",
            "http://bot.tienderu.com/app/storage?url=1/serumCejasDos.png"
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
    
    /////////////////////////////////////////////////
    
    $stmt = $pdo->query("SELECT mensaje, mensajeUno, mensajeDos, mensajeTres FROM headerSerum ORDER BY RAND() LIMIT 1");
    $menuItems = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Establecer la API utilizando la constante definida en api_key.php
    $api_key = API_KEY;
    
    // Mensajes de texto con el menú
    $menuMessage1 = $menuItems['mensaje'] ?? "";
    $menuMessage2 = $menuItems['mensajeUno'] ?? "";
    $menuMessage3 = $menuItems['mensajeDos'] ?? "";
    $menuMessage4 = $menuItems['mensajeTres'] ?? "";
    
    // Enviar solicitud de texto
    $response1 = sendCurlRequestText([
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => ["message" => $menuMessage1]
    ]);
    
    $response2 = sendCurlRequestText([
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => ["message" => $menuMessage2]
    ]);
    $response3 = sendCurlRequestText([
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => ["message" => $menuMessage3]
    ]);
    
    $response4 = sendCurlRequestText([
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => ["message" => $menuMessage4]
    ]);

    //////////////   MENSAJE IMAGEN  ////////////
        
    // Establecer la API utilizando la constante definida en api_key.php
    $api_key = API_KEY;
    
    // Array de URLs de las imágenes
    $image_urls = array(
        "http://bot.tienderu.com/app/storage?url=1/serumTestimonioUno.jpeg",
        "http://bot.tienderu.com/app/storage?url=1/serumTestimonioDos.jpeg",
        "http://bot.tienderu.com/app/storage?url=1/serumTestimonioCuatro.jpeg",
        "http://bot.tienderu.com/app/storage?url=1/serumTestimonioTres.jpeg"
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

        $stmt = $pdo->query("SELECT * FROM menuSerum");
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
        update_status($pdo, $from, 'serum');
        }
    
    elseif ($status === 'menuDos') {
        // Incluir el archivo que contiene la API key
        require_once 'api_key.php';

        /*/////////////   MENSAJE   ////////////*/

        $stmt = $pdo->query("SELECT * FROM headerOjeras ORDER BY RAND() LIMIT 1");
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

        $stmt = $pdo->query("SELECT * FROM subHeaderOjeras ORDER BY RAND() LIMIT 1");
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
        
        /////////////////////////////////////////////
        
        // Establecer la API utilizando la constante definida en api_key.php
        $api_key = API_KEY;
        
        // Array de URLs de las imágenes
        $image_urls = array(
            "http://bot.tienderu.com/app/storage?url=1/contornoDia.png",
            "http://bot.tienderu.com/app/storage?url=1/contornoDiaDos.png"
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

        $stmt = $pdo->query("SELECT * FROM ojeras ORDER BY RAND() LIMIT 1");
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
        
        /////////////////////////////////////////////
        
        // Establecer la API utilizando la constante definida en api_key.php
        $api_key = API_KEY;
        
        // Array de URLs de las imágenes
        $image_urls = array(
            "http://bot.tienderu.com/app/storage?url=1/contornoNoche.png",
            "http://bot.tienderu.com/app/storage?url=1/contornoNocheDos.png"
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

        $stmt = $pdo->query("SELECT * FROM ojerasUno ORDER BY RAND() LIMIT 1");
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

        $stmt = $pdo->query("SELECT * FROM menuOjeras");
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
        update_status($pdo, $from, 'ojeras');
        }
        
    elseif ($status === 'preguntas') {
        
        // Construir el mensaje del menú
        $menuMessage = mayorista($pdo, $from);

        // Actualizar el estado 
        update_status($pdo, $from, 'mayorista');
        
    }
    // La primera condicion es solo una puerta. Se debe cambiar al terminar
    elseif ($status === 'tonico' || $status === 'protector' || $status === 'serum' || $status === 'hialuronico' || $status === 'kit' || $status === 'niacinamida' 
    || $status === 'jabon' || $status === 'cremas' || $status === 'desmaquillante' || $status === 'spray' || $status === 'ojeras'
    || $status === 'hidratar' || $status === 'rosas' || $status === 'corporal' || $status === 'catalogo' || $status === 'ubicacion' || $status === 'horario' 
    || $status === 'mayorista' || $status === 'tonicoRespuesta' || $status === 'manchas' || $status === 'contraentrega'  ) {
    
        // Construir el mensaje del menú
            $menuMessage = verCompra($pdo, $from);
        }
    
    elseif ($status === 'comprarProtector' ) {
           
        // Construir el mensaje del menú
            $menuMessage = comprarProtectorBb($pdo, $from);
        }
        
    elseif ($status === 'metodosPago' ) {
           
        // Construir el mensaje del menú
            $menuMessage = daviplata($pdo, $from);
        }
    
    else  {

        // Construir el mensaje del menú
        $menuMessage = noValida($pdo, $from);
    }
    
}

?>
