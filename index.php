<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head><title>Outreach App MVP</title>
<link rel="stylesheet" href="assets/style.css">

</head>
<body>
    <h2>Welcome to Outreach App MVP</h2>
    <?php if (isset($_SESSION['user_id'])): ?>
        <p>You are logged in. <a href="inc/logout.php">Logout</a></p>
    <?php else: ?>
        <p><a href="views/login.php">Login</a> or <a href="views/signup.php">Signup</a></p>
    <?php endif; ?>
</body>
</html>
