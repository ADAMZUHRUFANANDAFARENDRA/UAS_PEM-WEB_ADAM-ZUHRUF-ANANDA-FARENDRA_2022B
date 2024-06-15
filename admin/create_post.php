<?php
// admin/create_post.php
session_start();
if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] != 'admin' && $_SESSION['user']['role'] != 'pengelola')) {
    header("Location: ../auth/login.php");
    exit;
}
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $user_id = $_SESSION['user']['id'];

    $stmt = $pdo->prepare("INSERT INTO tblposts (title, seotitle, user_id, content, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, strtolower(str_replace(" ", "-", $title)), $user_id, $content, $status]);

    header("Location: posts.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Post</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Create Post</h1>
    <form method="POST" action="">
        <label>Title: <input type="text" name="title" required></label><br>
        <label>Content: <textarea name="content" required></textarea></label><br>
        <label>Status:
            <select name="status">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </label><br>
        <button type="submit">Create Post</button>
    </form>
</body>
</html>
