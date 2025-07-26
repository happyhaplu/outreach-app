<?php
session_start();
session_destroy();
header('Location: /outreach-app/index.php');
exit;
?>
