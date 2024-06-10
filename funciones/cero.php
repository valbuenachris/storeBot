<?php

function cero($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    if ($status === 'preguntas') {
        
        // Construir el mensaje del menú
        $menuMessage = menu($pdo, $from);

        // Actualizar el estado 
        update_status($pdo, $from, 'inicio');
        
    }
    
    else  {
        
        // Construir el mensaje del menú
        $menuMessage = noValida($pdo, $from);

    }
    
}

?>
