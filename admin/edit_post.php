<?php
// admin/edit_post.php
session_start();
if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] != 'admin' && $_SESSION['user']['role'] != 'pengelola')) {
    header("Location: ../auth/login.php");
    exit;
}
include '../config.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM tblposts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE tblposts SET title = ?, seotitle = ?, content = ?, status = ? WHERE id = ?");
    $stmt->execute([$title, strtolower(str_replace(" ", "-", $title)), $content, $status, $id]);

    header("Location: posts.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Edit Post</h1>
    <form method="POST" action="">
        <label>Title: <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required></label><br>
        <label>Content: <textarea name="content" required><?= htmlspecialchars($post['content']) ?></textarea></label><br>
        <label>Status:
            <select name="status">
                <option value="draft" <?= $post['status'] == 'draft' ? 'selected' : '' ?>>Draft</option>
                <option value="published" <?= $post['status'] == 'published' ? 'selected' : '' ?>>Published</option>
            </select>
        </label><br>
        <button type="submit">Update Post</button>
    </form>
</body>
</html>
