<?php

function asesor($pdo, $from) {
    $asesor = '573114357068';


    // Consulta para obtener un mensaje de ayuda aleatorio
    $stmt = $pdo->prepare("SELECT * FROM notiAsesor ORDER BY RAND() LIMIT 1");
    $stmt->execute();
    $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($menuItems as $item) {
        $menuMessage .= "{$item['mensaje']}\n*DATOS DEL CLIENTE* \n*Teléfono:* "  . substr($from, 0, 12);
    }
    
    // Consulta en la tabla sesiones para obtener el nombre asociado al user_id
    $stmt = $pdo->prepare("SELECT nombre FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $sesionInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($sesionInfo && isset($sesionInfo['nombre'])) {
        $menuMessage .= "\n*Nombre:* " . $sesionInfo['nombre'];
    }
    
    // Enviar mensaje al asesor
    $api_key = API_KEY;
    $body = array(
        "api_key" => $api_key,
        "receiver" => $asesor,
        "data" => array("message" => $menuMessage)
    );
    $response = sendCurlRequestText($body);

    
    
    /*/////////////   MENSAJE DE AYUDA PARA EL USUARIO   ////////////*/

    // Consulta para obtener un mensaje de ayuda aleatorio
    $stmt = $pdo->query("SELECT * FROM headerAsesor ORDER BY RAND() LIMIT 1");
    $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Construir el mensaje de ayuda
    $menuMessage = "";
    foreach ($menuItems as $item) {
        $menuMessage .= "{$item['mensaje']}\n";
    }

    // Enviar mensaje de ayuda al usuario
    $body = array(
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => array("message" => $menuMessage)
    );
    $response = sendCurlRequestText($body);

    // Actualizar el estado 
    update_status($pdo, $from, 'asesor');
}

    
?>
