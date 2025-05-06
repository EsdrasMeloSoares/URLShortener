<?php

require 'env.php';

$host = $env['DB_HOST'];
$user = $env['DB_USERNAME'];
$pass = $env['DB_PASSWORD'];
$data = $env['DB_DATABASE'];

try {
    $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$data` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

    $pdo->exec("USE `$data`");

} catch (PDOException $e) {
    echo "Erro na conexão: " . htmlspecialchars($e->getMessage());
    exit;
}