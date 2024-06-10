<?php

function nueve($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    if ($status === 'inicio') {
        // Construir el mensaje del menú
        $menuMessage = menuDos($pdo, $from);
    }

    elseif ($status === 'menuDos') {
        // Construir el mensaje del menú
        $menuMessage = menu($pdo, $from);
    }
    
    elseif ($status === 'preguntas') {
        // Construir el mensaje del menú
        $menuMessage = catalogo($pdo, $from);
    }
    
    else  {
        // Construir el mensaje del menú
        $menuMessage = noValida($pdo, $from);
    }
    
}

?>
