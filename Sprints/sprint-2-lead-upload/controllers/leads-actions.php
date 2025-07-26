<?php
session_start();
require_once('../../sprint-1-authentication/inc/db.php');
if (!isset($_SESSION['user_id'])) die("🔒 Unauthorized");
$user_id = $_SESSION['user_id'];

if (!isset($_POST['lead_ids']) || !is_array($_POST['lead_ids'])) {
    header('Location: ../views/my-leads.php?error=No leads selected');
    exit;
}
$lead_ids = array_map('intval', $_POST['lead_ids']);
$action = $_POST['action'] ?? '';

if ($action === 'delete') {
    $in = str_repeat('?,', count($lead_ids) - 1) . '?';
    $sql = "DELETE FROM leads WHERE id IN ($in) AND user_id = ?";
    $params = array_merge($lead_ids, [$user_id]);
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    header('Location: ../views/my-leads.php?deleted=' . count($lead_ids));
    exit;
} elseif ($action === 'archive') {
    // Add 'archived' column if not exists
    $db->exec("ALTER TABLE leads ADD COLUMN archived INTEGER DEFAULT 0");
    $in = str_repeat('?,', count($lead_ids) - 1) . '?';
    $sql = "UPDATE leads SET archived = 1 WHERE id IN ($in) AND user_id = ?";
    $params = array_merge($lead_ids, [$user_id]);
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    header('Location: ../views/my-leads.php?archived=' . count($lead_ids));
    exit;
}
header('Location: ../views/my-leads.php?error=Unknown action');
exit;
