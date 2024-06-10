<?php

function cinco($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    // La primera condicion es solo una puerta. Se debe cambiar al terminar
    if ($status === 'inicio' ) {
        // Incluir el archivo que contiene la API key
        require_once 'api_key.php';

    
    /*/////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM headerKit ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']} \n";
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

        $stmt = $pdo->query("SELECT * FROM subHeaderKit ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']} \n";
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
        
        $body = array(
            "api_key" => $api_key,
            "receiver" => "$from",
            "data" => array(
                "url" => "http://bot.tienderu.com/app/storage?url=1/kitPeque.JPEG",
                "media_type" => "image",
                "caption" => ""
            )
        );
        
        // Enviar solicitud de texto
        $response = sendCurlRequestImage($body);
        
        /*/////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM subHeaderKitUno ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']} \n";
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
        
        $body = array(
            "api_key" => $api_key,
            "receiver" => "$from",
            "data" => array(
                "url" => "http://bot.tienderu.com/app/storage?url=1/kitMed.JPEG",
                "media_type" => "image",
                "caption" => ""
            )
        );
        
        // Enviar solicitud de texto
        $response = sendCurlRequestImage($body);
        
        
        /*/////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM subHeaderKitDos ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']} \n";
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
        
        $body = array(
            "api_key" => $api_key,
            "receiver" => "$from",
            "data" => array(
                "url" => "http://bot.tienderu.com/app/storage?url=1/kitCompleto.JPEG",
                "media_type" => "image",
                "caption" => ""
            )
        );
        
        // Enviar solicitud de texto
        $response = sendCurlRequestImage($body);
        
        
        
        /*/////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM menuKit");
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
        update_status($pdo, $from, 'kit');
        
    }
    
    elseif ($status === 'menuDos') {
        // Incluir el archivo que contiene la API key
        require_once 'api_key.php';

    /*/////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM headerRosas ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']} \n";
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

        $stmt = $pdo->query("SELECT * FROM subHeaderRosas ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']} \n";
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
            "http://bot.tienderu.com/app/storage?url=1/rosas.JPG",
            "http://bot.tienderu.com/app/storage?url=1/rosasDos.JPEG"
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

        $stmt = $pdo->query("SELECT * FROM rosas ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']} \n";
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

        $stmt = $pdo->query("SELECT * FROM rosasUno ORDER BY RAND() LIMIT 1");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = "";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['mensaje']} \n";
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

        $stmt = $pdo->query("SELECT * FROM menuRosas");
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
        update_status($pdo, $from, 'rosas');
        }
    
    elseif ($status === 'preguntas') {
        
        // Construir el mensaje del menú
        $menuMessage = componentes($pdo, $from);

        // Actualizar el estado 
        update_status($pdo, $from, 'componentes');
        
    }
    
    else  {
        
        // Construir el mensaje del menú
        $menuMessage = noValida($pdo, $from);

    }
    
}

?>
