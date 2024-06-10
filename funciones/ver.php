<?php

function ver($pdo, $from) {
    try {
        // Consultar el estado del pedido y el nombre para el usuario dado
        $stmt = $pdo->prepare("SELECT status, nombre, perfil, registro, ultima_conexion FROM sesiones WHERE user_id = ?");
        $stmt->execute([$from]); // Ejecutar la consulta
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados de la consulta

        // Construir el mensaje a partir de los resultados de la consulta
        $menuMessage = '*DATOS DEL USUARIO*';
        foreach ($menuItems as $item) {
            $menuMessage .= "\nNombre: {$item['nombre']} \nEstatus: {$item['status']} \nPerfil: {$item['perfil']} \nRegistro: {$item['registro']} \nÚltima Conexión: {$item['ultima_conexion']} ";
        }
        

        // Crear el array de respuesta con el mensaje construido
        $responseData = [
            'message_type' => 'text',
            'message' => [
                'message' => $menuMessage
            ]
        ];

        // Devolver los datos de respuesta
        return $responseData;
    } catch (PDOException $e) {
        // Manejar excepciones PDO
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
        die();
    } catch (Exception $e) {
        // Manejar otras excepciones
        echo json_encode(['error' => 'Error: ' . $e->getMessage()]);
        die();
    }
}

?>
