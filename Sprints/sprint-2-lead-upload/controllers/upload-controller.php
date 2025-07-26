<?php
session_start();
require_once('../../sprint-1-authentication/inc/db.php');

if (!isset($_SESSION['user_id'])) die("🔒 Unauthorized");

$tag = trim($_POST['tag']);
$user_id = $_SESSION['user_id'];

if ($_FILES['lead_csv']['error'] === 0) {
    $csv = fopen($_FILES['lead_csv']['tmp_name'], 'r');
    $inserted = 0;
    $header = fgetcsv($csv);
    if (!$header) {
        echo "❌ Invalid or empty CSV file.";
        exit;
    }
    // Map columns by header name (case-insensitive, partial match)
    $map = ['email' => null, 'name' => null, 'company' => null];
    foreach ($header as $i => $col) {
        $col_lc = strtolower($col);
        if (strpos($col_lc, 'email') !== false) $map['email'] = $i;
        elseif (strpos($col_lc, 'name') !== false && $map['name'] === null) $map['name'] = $i;
        elseif (strpos($col_lc, 'company') !== false) $map['company'] = $i;
    }
    if ($map['email'] === null || $map['name'] === null || $map['company'] === null) {
        echo "❌ CSV must have columns for email, name, and company.";
        exit;
    }
    while (($row = fgetcsv($csv)) !== false) {
        $email = isset($row[$map['email']]) ? trim($row[$map['email']]) : '';
        $name = isset($row[$map['name']]) ? trim($row[$map['name']]) : '';
        $company = isset($row[$map['company']]) ? trim($row[$map['company']]) : '';
        if ($email && $name && $company && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $stmt = $db->prepare("INSERT OR IGNORE INTO leads (email, name, company, tag, user_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$email, $name, $company, $tag, $user_id]);
            if ($stmt->rowCount() > 0) $inserted++;
        }
    }
    fclose($csv);
    if ($inserted > 0) {
        header('Location: ../views/my-leads.php?tag=' . urlencode($tag) . '&uploaded=' . $inserted);
        exit;
    } else {
        echo "❌ No valid leads found in the uploaded file.";
    }
} else {
    echo "❌ Upload failed.";
}
?>
