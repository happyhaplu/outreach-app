<?php
require 'db.php';

$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    email TEXT UNIQUE,
    password_hash TEXT,
    is_admin INTEGER DEFAULT 0,
    reset_token TEXT,
    plan_type TEXT DEFAULT 'free'
)");
echo "User table created!";
?>
