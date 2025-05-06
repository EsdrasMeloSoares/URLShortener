<?php

require_once __DIR__ . '/database/database.php';

if (!isset($_GET['url']) || empty($_GET['url'])) {
    die('ID inválido');
}

$id = $_GET['url'];

$stmt = $pdo->prepare("SELECT url FROM urls WHERE id = :id");
$stmt->execute([':id' => $id]);
$url = $stmt->fetchColumn();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM urlAccessed WHERE url_id = :url_id");
$stmt->execute([':url_id' => $id]);
$access_count = $stmt->fetchColumn();

echo "Sua url redireciona para: " . $url . "\n";
echo "<br>";
echo $access_count . " pessoas acessaram sua URL encurtada";
?>