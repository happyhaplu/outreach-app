<?php
require_once('../../sprint-1-authentication/inc/db.php');

try {
    $db->exec("
        CREATE TABLE IF NOT EXISTS leads (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT NOT NULL,
            name TEXT,
            company TEXT,
            tag TEXT NOT NULL,
            user_id INTEGER,
            UNIQUE(email, user_id)
        )
    ");
    echo "✅ Leads table created.";
} catch (PDOException $e) {
    error_log("DB Error: " . $e->getMessage());
    echo "❌ Error creating table.";
}
?>
