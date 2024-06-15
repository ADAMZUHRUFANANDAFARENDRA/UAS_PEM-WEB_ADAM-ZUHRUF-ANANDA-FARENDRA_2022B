<?php
// index.php
include 'config.php';
$latestPosts = $pdo->query("SELECT * FROM tblposts WHERE status = 'published' ORDER BY created_at DESC LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
$otherPosts = $pdo->query("SELECT * FROM tblposts WHERE status = 'published' ORDER BY created_at DESC LIMIT 3, 18446744073709551615")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News Website</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Latest News</h1>
    <div class="container">
        <?php foreach ($latestPosts as $post): ?>
        <div class="news-article">
            <h2><a href="berita.php?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h2>
            <p><?= htmlspecialchars(substr($post['content'], 0, 150)) ?>...</p>
            <a href="berita.php?id=<?= $post['id'] ?>">Baca Selengkapnya</a>
        </div>
        <?php endforeach; ?>
    </div>
    <h1>Other News</h1>
    <div class="container">
        <?php foreach ($otherPosts as $post): ?>
        <div class="news-article">
            <h2><a href="berita.php?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h2>
            <p><?= htmlspecialchars(substr($post['content'], 0, 150)) ?>...</p>
            <a href="berita.php?id=<?= $post['id'] ?>">Baca Selengkapnya</a>
        </div>
        <?php endforeach; ?>
        <a href="semua_berita.php">Semua Berita</a>
    </div>
</body>
</html>
