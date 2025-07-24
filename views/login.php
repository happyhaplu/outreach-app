<?php
session_start();
require_once '../inc/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['is_admin'] = $user['is_admin'];
        header('Location: ../index.php');
        exit;
    } else {
        echo "<p style='color:red;'>Invalid login.</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<form method="post">
  <h2>Login</h2>
  Email: <input type="email" name="email" required><br>
  Password: <input type="password" name="password" required><br>
  <button type="submit">Login</button>
</form>
</body>
</html>
