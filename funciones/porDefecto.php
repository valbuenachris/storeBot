<?php

function porDefecto($pdo, $from) {
    try {
        // Consultar el perfil del usuario
        $stmt = $pdo->prepare("SELECT * FROM sesiones WHERE user_id = ?");
        $stmt->execute([$from]);
        $pedido = $stmt->fetch(PDO::FETCH_ASSOC);

        // Determinar el perfil del usuario y construir el menú correspondiente
        
        if ($pedido && isset($pedido['perfil']) && $pedido['perfil'] == 'registrado') {

                    $menuMessage = menuRegistrado($pdo, $from);
                    
        }elseif ($pedido && isset($pedido['perfil']) && $pedido['perfil'] == 'invitado') {
            
                    $menuMessage = menuInvitado($pdo, $from);
                
        }else {
            
            $menuMessage = registrarUsuario($pdo, $from);
            $menuMessage = inicioBienvenida($pdo, $from);
        }
        
        

        return $responseData;
        
    } catch (PDOException $e) {
        // Manejar errores de la base de datos
        return [
            'message_type' => 'text',
            'message' => [
                'message' => 'Error en la base de datos: ' . $e->getMessage()
            ]
        ];
    }
}

?>
