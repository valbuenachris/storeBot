<?php

function comprarProtector60($pdo, $from) {
    
    // Verificar el estado del usuario en la tabla sesiones
    $stmt = $pdo->prepare("SELECT perfil FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $perfil = $stmt->fetchColumn();
   
    // Obtener el producto y el precio del id= en la tabla productos
        $stmt = $pdo->prepare("SELECT producto, precio FROM productos WHERE id = 15");
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Insertar el pedido en la tabla pedidos con el producto y el precio obtenidos
        $stmt = $pdo->prepare("INSERT INTO pedidos (user_id, perfil, producto, precio) VALUES (?, 'comprando', ?, ?)");
        $stmt->execute([$from, $producto['producto'], $producto['precio']]);
    
        // Preguntar cuántas unidades desea agregar
        $menuMessage = headerCantidades($pdo, $from);
        
        // Actualizar el perfil 
        update_perfil($pdo, $from, 'cantidades');
        // Actualizar el estado 
        update_status($pdo, $from, 'protector');
    
    // Retornar la respuesta
    return $response;
}

?>
