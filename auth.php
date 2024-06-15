<?php
// auth/auth.php
session_start();
include '../config.php';

function login($username, $password) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: ../admin/dashboard.php");
    } else {
        echo "<script>alert('Invalid credentials');</script>";
    }
}

function register($username, $password, $role) {
    global $pdo;
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->execute([$username, $passwordHash, $role]);
    echo "<script>alert('Registration successful');</script>";
}
?>
