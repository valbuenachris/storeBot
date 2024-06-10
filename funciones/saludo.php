<?php

function responderSaludo($pdo, $from) {
    try {
        
        // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT perfil FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $perfil = $stmt->fetchColumn();
    
        if ($perfil === 'registrado') {
       // Obtener la hora actual en formato de 24 horas
        $currentHour = date('H');

        // Determinar el saludo correspondiente según la hora
        $saludoColumna = ($currentHour < 12) ? 'buenos_dias' : (($currentHour < 18) ? 'buenas_tardes' : 'buenas_noches');

        // Preparar la consulta SQL para obtener un mensaje aleatorio de saludo
        $stmt = $pdo->prepare("
            SELECT $saludoColumna AS mensaje
            FROM saludos
            ORDER BY RAND()
            LIMIT 1
        ");

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado de la consulta
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Obtener el mensaje de saludo
        $menuMessage = $resultado['mensaje'];

        // Establecer la API utilizando la constante definida en api_key.php
        $api_key = API_KEY;

        // Mensaje de texto con el saludo
        $body = array(
            "api_key" => $api_key,
            "receiver" => $from,
            "data" => array("message" => $menuMessage)
        );

        // Enviar solicitud de texto
        $response = sendCurlRequestText($body);
        
        //////////////////////////////////////////
        
        // Construir el mensaje del menú
        $menuMessage = menuRegistrado($pdo, $from);
        
        }
        
        else {
            
            $menuMessage = registrarUsuario($pdo, $from);
            $menuMessage = inicioBienvenida($pdo, $from);
        }
        

        
    } catch (PDOException $e) {
        // Manejar errores de la base de datos
        return "Error al ejecutar la consulta: " . $e->getMessage();
    }
}

?>
