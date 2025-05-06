<?php

require_once __DIR__ . '/../database.php';

try {
    $sql = "
        CREATE TABLE IF NOT EXISTS urls (
            id VARCHAR(23) PRIMARY KEY,
            url LONGTEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $pdo->exec($sql);
    echo "Tabela 'urls' verificada/criada com sucesso.<br>";

    $sql = "
        CREATE TABLE IF NOT EXISTS urlAccessed (
            id INT AUTO_INCREMENT PRIMARY KEY,
            url_id VARCHAR(23) NOT NULL,
            user_ip VARCHAR(45) NOT NULL,
            user_agent VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (url_id) REFERENCES urls(id)
                ON DELETE CASCADE
                ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $pdo->exec($sql);
    echo "Tabela 'urlAccessed' verificada/criada com sucesso.<br>";

} catch (PDOException $e) {
    echo "Erro ao criar tabelas: " . htmlspecialchars($e->getMessage());
}
