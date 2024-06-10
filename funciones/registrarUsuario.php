<?php

function registrarUsuario($pdo, $from) {
    // Insertar un nuevo registro si el usuario no existe
    $stmt = $pdo->prepare("INSERT INTO sesiones (user_id, status, nombre, perfil, telefono) VALUES (?, 'registrar', 'Sin Nombre', 'invitado', ?)");
    
    // Extraer los primeros 12 caracteres del número de teléfono
    $telefono = substr($from, 0, 12);
    
    // Ejecutar la consulta
    $stmt->execute([$from, $telefono]);

    // Obtener elementos de menú personalizado
    $stmt = $pdo->query("SELECT * FROM mensajeNuevo ORDER BY RAND() LIMIT 1");
    $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Construir el mensaje del menú
    $menuMessage = "";
    foreach ($menuItems as $item) {
        $menuMessage .= "{$item['mensaje']}\n";
    }

    return $menuMessage;
}


?>