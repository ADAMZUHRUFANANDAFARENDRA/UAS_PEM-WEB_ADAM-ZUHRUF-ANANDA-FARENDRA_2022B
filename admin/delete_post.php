<?php
// admin/delete_post.php
session_start();
if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] != 'admin' && $_SESSION['user']['role'] != 'pengelola')) {
    header("Location: ../auth/login.php");
    exit;
}
include '../config.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM tblposts WHERE id = ?");
$stmt->execute([$id]);

header("Location: posts.php");
exit;
?>
