<?php

    function garantizado($pdo, $from) {
        // Verificar  el estado 
        $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
        $stmt->execute([$from]);
        $status = $stmt->fetchColumn();
        
        // Incluir el archivo que contiene la API key
        require_once 'api_key.php';
        
        // La primera condicion es solo una puerta. Se debe cambiar al terminar
        if ($status === 'tonico') {
        
        // Mensajes de texto
        $mensajes = array(
            "¡La efectividad de nuestro despigmentante es impresionante, alcanzando más del 83% de satisfacción si sigues correctamente las indicaciones de uso! 💪",
            "Sin embargo, es importante tener en cuenta que cada piel es única y puede reaccionar de manera diferente y en tiempos distintos. Aunque la mayoría de nuestros usuarios han notado beneficios incluso en el primer mes de uso. 😊",
            "1️⃣ Ver Preguntas Frecuentes (FAQ) 🤔 \n2️⃣ Para ir al *Menu* Principal 🛍️"
        );
    
        // Enviar cada mensaje de texto
        foreach ($mensajes as $mensaje) {
            enviarMensajeComponentesTonico($from, $mensaje);
        }
        
        // Actualizar el estado 
        update_status($pdo, $from, 'faQgarantizado');
        
        } 
        
    }
        
    
    // Función para enviar mensajes de texto
    function enviarMensajeGarantizado($from, $mensaje) {
        enviarMensajesGarantizado($from, $mensaje);
    }
    
    // Función genérica para enviar mensajes
    function enviarMensajesGarantizado($from, $mensaje) {
        $api_key = API_KEY;
        $body = array(
            "api_key" => $api_key,
            "receiver" => $from,
            "data" => array("message" => $mensaje)
        );
        return sendCurlRequestText($body);
    }

?>
