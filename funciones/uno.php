<?php

    function uno($pdo, $from) {
        // Verificar si el estado es igual a 'inicio'
        $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
        $stmt->execute([$from]);
        $status = $stmt->fetchColumn();
        
        if ($status === 'inicio') {
            
            $menuMessage = tonico($pdo, $from);
            
        }elseif ($status === 'faQhorario' || $status === 'faQubicacion' || $status === 'faQmayorista' || $status === 'faQgarantizado' 
        || $status === 'faQcatalogo' || $status === 'faQmanchas' || $status === 'faQcontraentrega' || $status === 'faQresultados' || $status === 'faQayuda'
        || $status === 'faQrutina') {
           
            $menuMessage = preguntas($pdo, $from);
            
        }elseif ($status === 'niacinamida' || $status === 'tonico' || $status === 'serum' || $status === 'hialuronico' || $status === 'espuma' || $status === 'cremas' 
        || $status === 'desmaquillante' || $status === 'rosas' ) {
           
            $menuMessage = comprar($pdo, $from);
        }
        
        elseif ($status === 'protector' ) {
           
            $menuMessage = comprarProtector($pdo, $from);
        }
        
        elseif ($status === 'comprarProtector' ) {
           
            $menuMessage = comprarProtector60($pdo, $from);
        }
        
        elseif ($status === 'kit' ) {
           
            $menuMessage = comprarKit($pdo, $from);
        }
        
        elseif ($status === 'comprarKit' ) {
           
            $menuMessage = comprarKitBasico($pdo, $from);
        }
    
        elseif ($status === 'spray' ) {
           
            $menuMessage = comprarSpray($pdo, $from);
        }
        
        elseif ($status === 'comprarSpray' ) {
           
            $menuMessage = comprarSprayMango($pdo, $from);
        }
        
        elseif ($status === 'ojeras' ) {
           
            $menuMessage = comprarContorno($pdo, $from);
        }
        
        elseif ($status === 'comprarContorno' ) {
           
            $menuMessage = comprarContornoDia($pdo, $from);
        }
        
        elseif ($status === 'hidratar' ) {
           
            $menuMessage = comprarMantequilla($pdo, $from);
        }
        
        elseif ($status === 'comprarMantequilla' ) {
           
            $menuMessage = comprarMantequillaMango($pdo, $from);
        }
        
        elseif ($status === 'corporal' ) {
           
            $menuMessage = comprarCorporal($pdo, $from);
        }
        
        elseif ($status === 'comprarCorporal' ) {
           
            $menuMessage = comprarCorporalMango($pdo, $from);
        }
        
        elseif ($status === 'menuDos') {
        
        $menuMessage = desmaquilladora($pdo, $from);
        }
    
        elseif ($status === 'preguntas') {
        
        $menuMessage = horario($pdo, $from);
        }
        
        elseif ($status === 'confirmarCompra' ) {
           
            $menuMessage = finalizarCompra($pdo, $from);
        }
        
        elseif ($status === 'metodosPago' ) {
           
            $menuMessage = bancolombia($pdo, $from);
        }
        
        else  {
    
        $menuMessage = noValida($pdo, $from);
        }
    
    } 

?>
