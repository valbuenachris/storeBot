<?php

    function borrar($pdo, $from) {
    try {
        

        // Eliminar registros de la tabla 'sesiones' donde 'user_id' coincide con el valor dado
        $stmt = $pdo->prepare("DELETE FROM sesiones WHERE user_id = ?");
        $stmt->execute([$from]);
        
        $stmt = $pdo->prepare("DELETE FROM pedidos WHERE user_id = ?");
        $stmt->execute([$from]);
        
        $stmt = $pdo->prepare("DELETE FROM clientes WHERE user_id = ?");
        $stmt->execute([$from]);

        // Devolver un mensaje indicando que la eliminación ha sido exitosa
        return [
            'message_type' => 'text',
            'message' => [
                'message' => 'Ya puedes iniciar de nuevo en nuestro *MENÚ PRINCIPAL*.'
            ]
        ];
    } catch (PDOException $e) {
        // Manejar excepciones PDO
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
        die();
    }
}
?>

