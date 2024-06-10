<?php

function agregarCantidades($pdo, $from, $message) {
    
    
    // Obtener el precio del producto
    $stmtPrecio = $pdo->prepare("SELECT precio FROM pedidos WHERE user_id = ? AND perfil = 'comprando'");
    $stmtPrecio->execute([$from]);
    $precio = $stmtPrecio->fetchColumn();

    // Realizar la multiplicación de cantidad y precio para obtener el total
    $total = $message * $precio;

    // Actualizar la cantidad y el total en el pedido
    $stmtUpdate = $pdo->prepare("UPDATE pedidos SET cantidad = ?, total = ?, perfil = 'agendado' WHERE user_id = ? AND perfil = 'comprando'");
    $stmtUpdate->execute([$message, $total, $from]);

    // Obtener todos los registros de la tabla pedidos para ese user_id en perfil agendado
    $stmtPedidos = $pdo->prepare("SELECT * FROM pedidos WHERE user_id = ? AND perfil = 'agendado'");
    $stmtPedidos->execute([$from]);
    $pedidos = $stmtPedidos->fetchAll(PDO::FETCH_ASSOC);

    // Calcular el total del pedido sumando los valores de la columna total
    $totalPedido = 0;
    foreach ($pedidos as $pedido) {
        $totalPedido += $pedido['total'];
    }

    // Obtener el nombre del usuario
    $stmtNombre = $pdo->prepare("SELECT nombre FROM sesiones WHERE user_id = ?");
    $stmtNombre->execute([$from]);
    $nombreUsuario = $stmtNombre->fetchColumn();

    // Construir el mensaje del menú con la cantidad y el total actualizados
    $menuMessage = "*$nombreUsuario* 💖💄, agregaste \n👉🏼 *$message* - *{$pedido['producto']}*  \n\nAquí está tu pedido actualizado:\n\n";
    
    // Agregar los detalles de los pedidos al mensaje
    foreach ($pedidos as $pedido) {
        $menuMessage .= "{$pedido['cantidad']} - {$pedido['producto']}  $ {$pedido['total']}\n";
    }

    // Agregar el total del pedido al mensaje
    $menuMessage .= "\nEl Total de tu pedido es: $ *$totalPedido*";

    // Establecer la API utilizando la constante definida en api_key.php
    $api_key = API_KEY;

    // Mensaje de texto con el menú
    $body = [
        "api_key" => $api_key,
        "receiver" => $from,
        "data" => ["message" => $menuMessage]
    ];

    // Enviar solicitud de texto
    $response = sendCurlRequestText($body);
    
    // Construir el mensaje del menú
        $menuMessage = menuCompras($pdo, $from);

    return $response;
}

?>
