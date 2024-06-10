<?php

function diez($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    // La primera condicion es solo una puerta. Se debe cambiar al terminar
    if ($status === 'preguntas') {
        
        // Construir el mensaje del menú
        $menuMessage = contraentrega($pdo, $from);

        // Actualizar el estado 
        update_status($pdo, $from, 'contraentrega');
        
    }
    
    else  {
        // Construir el mensaje del menú
        $menuMessage = noValida($pdo, $from);
    }
    
}

?>
