<?php
// berita.php
include 'config.php';
$id = $_GET['id'];
$post = $pdo->prepare("SELECT * FROM tblposts WHERE id = ?");
$post->execute([$id]);
$post = $post->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($post['title']) ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p><?= htmlspecialchars($post['content']) ?></p>
    <a href="index.php">Kembali ke Beranda</a>
</body>
</html>
