<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head><title>Outreach App MVP</title>
<link rel="stylesheet" href="Sprints/sprint-1-authentication/assets/style.css">

</head>
<body>
    <?php if (isset($_SESSION['user_id'])) {
        header('Location: /outreach-app/dashboard.php');
        exit;
    } ?>
    <h2>Welcome to Outreach App MVP</h2>
    <p><a href="/outreach-app/Sprints/sprint-1-authentication/views/login.php">Login</a> or <a href="/outreach-app/Sprints/sprint-1-authentication/views/signup.php">Signup</a></p>
</body>
</html>
