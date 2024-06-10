<?php

     
    $host = 'localhost';
    $db   = 'educovxy_skinBot';
    $user = 'educovxy_skinBot';
    $pass = 'Juanes801+';
    $charset = 'utf8mb4';
    
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    
    try {
        $pdo = new PDO($dsn, $user, $pass, $opt);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Connection failed: ' . $e->getMessage()]);
        die();
    }