<?php

function menuConfirmarCompra($pdo, $from) {
    
        // Incluir el archivo que contiene la API key
        require_once 'api_key.php';

        /*/////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM menuConfirmarCompra");
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
        
        // Actualizar el estado del cliente en la tabla 'sesiones'
        $stmt = $pdo->prepare("UPDATE sesiones SET status = 'confirmarCompra' WHERE user_id = ?");
        $stmt->execute([$from]);
        
}

?>
