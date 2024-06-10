<?php

function noValida($pdo, $from) {
    
        // Incluir el archivo que contiene la API key
        require_once 'api_key.php';
        
        // Construir los mensajes del menú
        $menuMessages = [
            "🙈 *OPCION NO VALIDA*",
            "Por favor, selecciona una opción ☑️ válida.",
            "Si prefieres, escribe *menu* para ir al 🛍️ *MENU PRINCIPAL*"
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
    
}
    
?>
