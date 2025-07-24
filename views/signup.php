<?php
require_once '../inc/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $db->prepare("INSERT INTO users (email, password_hash) VALUES (?, ?)");
    $stmt->execute([$email, $pass]);
    echo "Signup successful. <a href='login.php'>Login here</a>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<form method="post">
  <h2>Signup</h2>
  Email: <input type="email" name="email" required><br>
  Password: <input type="password" name="password" required><br>
  <button type="submit">Signup</button>
</form>
</body>
</html>
