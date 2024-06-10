<?php

function dos($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    // La primera condicion es solo una puerta. Se debe cambiar al terminar
    if ($status === 'tonico' || $status === 'protector' || $status === 'serum' || $status === 'hialuronico' || $status === 'kit' || $status === 'niacinamida' 
    || $status === 'jabon' || $status === 'cremas' || $status === 'desmaquillante' || $status === 'spray' || $status === 'ojeras'
    || $status === 'hidratar' || $status === 'rosas' || $status === 'corporal' || $status === 'mayorista' || $status === 'tonicoRespuesta' 
    || $status === 'manchas' || $status === 'contraentrega' || $status === 'faQhorario' || $status === 'faQubicacion' || $status === 'faQmayorista' || $status === 'faQgarantizado' 
        || $status === 'faQcatalogo' || $status === 'faQmanchas' || $status === 'faQcontraentrega' || $status === 'faQresultados' || $status === 'faQayuda'
        || $status === 'faQrutina') {
    
    // Construir el mensaje del menú
        $menuMessage = menu($pdo, $from);
    }

    elseif ($status === 'inicio') {
        // Construir el mensaje del menú
        $menuMessage = protector($pdo, $from);
        }
        
    elseif ($status === 'menuDos') {
        // Incluir el archivo que contiene la API key
        require_once 'api_key.php';

        /*/////////////   MENSAJE   ////////////*/

        $stmt = $pdo->query("SELECT * FROM headerSpray ORDER BY RAND() LIMIT 1");
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
            "http://bot.tienderu.com/app/storage?url=1/glitterSprayMng.png",
            "http://bot.tienderu.com/app/storage?url=1/glitterSprayBom.png"
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

        $stmt = $pdo->query("SELECT * FROM subHeaderSpray ORDER BY RAND() LIMIT 1");
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

        $stmt = $pdo->query("SELECT * FROM menuSpray");
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
        update_status($pdo, $from, 'spray');
        }
    
    elseif ($status === 'faQayuda') {
        
        // Construir el mensaje del menú
        $menuMessage = asesor($pdo, $from);
        }
        
    elseif ($status === 'preguntas') {
        
        // Construir el mensaje del menú
        $menuMessage = ubicacion($pdo, $from);

        // Actualizar el estado 
        update_status($pdo, $from, 'ubicacion');
        
    }
    
    elseif ($status === 'comprarProtector' ) {
           
        // Construir el mensaje del menú
            $menuMessage = comprarProtector120($pdo, $from);
        }
    
    elseif ($status === 'comprarKit' ) {
           
        // Construir el mensaje del menú
            $menuMessage = comprarKitcompleto($pdo, $from);
        }
        
    elseif ($status === 'comprarSpray' ) {
           
        // Construir el mensaje del menú
            $menuMessage = comprarSprayBom($pdo, $from);
        }
    
    elseif ($status === 'comprarContorno' ) {
           
        // Construir el mensaje del menú
            $menuMessage = comprarContornoNoche($pdo, $from);
        }
    
    elseif ($status === 'comprarMantequilla' ) {
           
        // Construir el mensaje del menú
            $menuMessage = comprarMantequillaBom($pdo, $from);
        }
        
    elseif ($status === 'comprarCorporal' ) {
           
        // Construir el mensaje del menú
            $menuMessage = comprarCorporalBom($pdo, $from);
        }
    
    elseif ($status === 'metodosPago' ) {
           
        // Construir el mensaje del menú
            $menuMessage = nequi($pdo, $from);
        }
    
    else  {
        
        // Construir el mensaje del menú
        $menuMessage = noValida($pdo, $from);

        
        }
    
}

?>
