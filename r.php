<?php
require_once __DIR__ . '/database/database.php';

function getUserInfo()
{
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    if ($ip === '::1') {
        $ip = '127.0.0.1';
    }

    $userAgent = $_SERVER['HTTP_USER_AGENT'];


    $userInfo = [
        'ip' => $ip,
        'agent' => $userAgent,
    ];

    return $userInfo;
}

if (!isset($_GET['url']) || empty($_GET['url'])) {
    die('ID inválido');
}

$id = $_GET['url'];

$stmt = $pdo->prepare("SELECT url FROM urls WHERE id = :id");
$stmt->execute([':id' => $id]);
$url = $stmt->fetchColumn();

if ($url) {
    $userInfo = getUserInfo();
    $stmt = $pdo->prepare("INSERT INTO urlAccessed (url_id, user_ip, user_agent) VALUES (:url_id, :user_ip, :user_agent)");
    $stmt->execute([
        ':url_id' => $id,
        ':user_ip' => $userInfo['ip'],
        ':user_agent' => $userInfo['agent'],
    ]);

    header("Location: $url");
} else {
    die('URL não encontrada.');
}
