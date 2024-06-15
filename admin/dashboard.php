<?php
// admin/dashboard.php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Welcome, Admin</h1>
    <nav>
        <a href="posts.php">Manage Posts</a> |
        <a href="../auth/logout.php">Logout</a>
    </nav>
</body>
</html>
