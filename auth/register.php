<?php
// auth/register.php
include 'auth.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    register($_POST['username'], $_POST['password'], $_POST['role']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="POST" action="">
        <label>Username: <input type="text" name="username" required></label><br>
        <label>Password: <input type="password" name="password" required></label><br>
        <label>Role:
            <select name="role" required>
                <option value="admin">Admin</option>
                <option value="pengelola">Pengelola</option>
            </select>
        </label><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
