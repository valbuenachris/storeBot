<?php

function horario($pdo, $from) {
    
        /*/////////////   MENSAJE   ////////////*/

        // Construir el mensaje del menú
        $menuMessage = "🕘 Nuestro horario de atención es de 9 am a 12 pm, y luego continuamos de 2 pm a 7 pm. ¡Estamos aquí para ayudarte en cualquier momento del día! 🌟";
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
        
        
        // Actualizar el estado 
        update_status($pdo, $from, 'faQhorario');
        
        ////////////////////////////////////////////
        
        // Construir el mensaje del menú
        $menuMessage = menuCatalogo($pdo, $from);
        
    }
    
?>
