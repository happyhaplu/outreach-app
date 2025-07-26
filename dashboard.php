<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /outreach-app/Sprints/sprint-1-authentication/views/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="/outreach-app/Sprints/sprint-1-authentication/assets/style.css">
</head>
<body>
    <h2>Welcome to Your Dashboard</h2>
    <nav>
        <ul>
            <li><a href="/outreach-app/Sprints/sprint-2-lead-upload/views/upload-leads.php">Upload Leads</a></li>
            <li><a href="/outreach-app/Sprints/sprint-2-lead-upload/views/my-leads.php">My Leads</a></li>
            <li><a href="/outreach-app/Sprints/sprint-1-authentication/inc/logout.php">Logout</a></li>
        </ul>
    </nav>
</body>
</html>
