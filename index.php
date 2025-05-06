<?php
require_once __DIR__ . '/env.php';
require_once __DIR__ . '/database/database.php';

if (isset($_POST['url'])) {
    $id = uniqid();
    $url = $_POST['url'];

    $stmt = $pdo->prepare("INSERT INTO urls (id, url) VALUES (:id, :url)");
    $stmt->execute([
        ':id' => $id,
        ':url' => $url
    ]);

    $protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];

    $short_url = $protocolo . $host . '/Portifoli/URLShortener/r.php?url=' . $id;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $env['title']; ?></title>
</head>
<form action="" method="POST">
    <input type="text" name="url" placeholder="Insira sua URL">
    <button type="submit">Encurtar</button>
</form>

<?php if (!empty($short_url)) { ?>
    <p>Sua URL encurtada: <?php echo $short_url ?></p> <br>
    <a href="urlInfo.php?url=<?php echo $id ?>"><?php echo $id ?>Informações sobre sua URL</a>
<?php } ?>

<body>
</body>

</html>