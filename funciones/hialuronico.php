<?php

function hialuronico($pdo, $from) {
    
        /*/////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM headerAcido ORDER BY RAND() LIMIT 1");
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
        
        
        ////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM subHeaderAcido ORDER BY RAND() LIMIT 1");
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
            "http://bot.tienderu.com/app/storage?url=1/hialuronico.png",
            "http://bot.tienderu.com/app/storage?url=1/hialuronicoDos.png"
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

        $stmt = $pdo->query("SELECT * FROM subHeaderAcidoDos ORDER BY RAND() LIMIT 1");
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
        
        ////////////////////////////////////
        
        // Incluir el archivo que contiene la API key
        require_once 'api_key.php';
        
        // Construir los mensajes del menú
        $menuMessages = [
            "El suero de ácido hialurónico es un paso esencial en tu rutina de cuidado facial. 
Después de la limpieza y tonificación, aplícalo en todo el rostro dando suaves palmaditas para una absorción óptima. 
Una vez absorbido, sigue con tu crema hidratante. Si es durante el día, no olvides aplicar tu protector solar. 
¡Tu piel lo agradecerá! ✨💧🌞",
            
"El ácido hialurónico es un verdadero aliado para tu piel. 
Con sus propiedades hidratantes y rellenadoras, ayuda a mantener tu piel suave, tersa e increíblemente hidratada. 
¡Una elección perfecta para lucir una piel radiante y saludable! 💧✨🌟"
        ];
        
        // Establecer la API utilizando la constante definida en api_key.php
        $api_key = API_KEY;
        
        // Enviar cada mensaje del menú
        foreach ($menuMessages as $menuMessage) {
            // Mensaje de texto con el menú
            $body = array(
                "api_key" => $api_key,
                "receiver" => $from,
                "data" => array("message" => $menuMessage)
            );
        
            // Enviar solicitud de texto
            $response = sendCurlRequestText($body);
        }
        
        
        
        
        /*/////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM menuAcido");
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
        update_status($pdo, $from, 'hialuronico');
        
        
    }
    
?>
