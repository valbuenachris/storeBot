<?php

function comprar($pdo, $from) {
        
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    if ($status === 'tonico') {
        
        $menuMessage = comprarTonico($pdo, $from);
    }
    
    elseif ($status === 'protector') {
        
        $menuMessage = comprarProtector($pdo, $from);
    }
    
    elseif ($status === 'serum') {
        
        $menuMessage = comprarSerum($pdo, $from);
    }
    
    elseif ($status === 'hialuronico') {
        
        $menuMessage = comprarHialuronico($pdo, $from);
    }
    
    elseif ($status === 'kit') {
        
        $menuMessage = comprarKit($pdo, $from);
    }
    
    elseif ($status === 'niacinamida') {
        
        $menuMessage = comprarNiacinamida($pdo, $from);
    }
    
    elseif ($status === 'espuma') {
        
        $menuMessage = comprarJabon($pdo, $from);
    }
    
    elseif ($status === 'cremas') {
        
        $menuMessage = comprarCremas($pdo, $from);
    }
    
    elseif ($status === 'desmaquillante') {
        
        $menuMessage = comprarDesmaquillante($pdo, $from);
    }
    
    elseif ($status === 'spray') {
        
        $menuMessage = comprarSpray($pdo, $from);
    }
    
    elseif ($status === 'ojeras') {
        
        $menuMessage = comprarContorno($pdo, $from);
    }
    
    elseif ($status === 'hidratar') {
        
        $menuMessage = comprarMantequilla($pdo, $from);
    }
    
    elseif ($status === 'rosas') {
        
        $menuMessage = comprarTonicoRosas($pdo, $from);
    }
    
    elseif ($status === 'corporal') {
        
        $menuMessage = comprarCorporal($pdo, $from);
    }
    
    else  {
        
        $menuMessage = noValida($pdo, $from);

    }
    
}

?>

