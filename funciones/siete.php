<?php

function siete($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    // La primera condicion es solo una puerta. Se debe cambiar al terminar
    if ($status === 'inicio' ) {
        
        $menuMessage = espuma($pdo, $from);
        
    }
    
    elseif ($status === 'menuDos') {
        
        $menuMessage = catalogo($pdo, $from);
        
    }
        
    elseif ($status === 'preguntas') {
        
        $menuMessage = resultados($pdo, $from);

    }
    
    else  {

        $menuMessage = noValida($pdo, $from);

    }
    
}

?>
