<?php
// semua_berita.php
include 'config.php';
$posts = $pdo->query("SELECT * FROM tblposts WHERE status = 'published' ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All News</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>All News</h1>
    <div class="container">
        <?php foreach ($posts as $post): ?>
        <div class="news-article">
            <h2><a href="berita.php?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h2>
            <p><?= htmlspecialchars(substr($post['content'], 0, 150)) ?>...</p>
            <a href="berita.php?id=<?= $post['id'] ?>">Baca Selengkapnya</a>
        </div>
        <?php endforeach; ?>
    </div>
    <a href="index.php">Kembali ke Beranda</a>
</body>
</html>
