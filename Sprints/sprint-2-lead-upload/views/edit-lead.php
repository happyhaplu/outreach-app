<?php
session_start();
require_once('../../sprint-1-authentication/inc/db.php');
if (!isset($_SESSION['user_id'])) die("🔒 Unauthorized");
$user_id = $_SESSION['user_id'];

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if (!$id) die('Invalid lead ID');

// Fetch lead
$stmt = $db->prepare("SELECT * FROM leads WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $user_id]);
$lead = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$lead) die('Lead not found');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $company = trim($_POST['company'] ?? '');
    $tag = trim($_POST['tag'] ?? '');
    if ($name && $email && $company && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $db->prepare("UPDATE leads SET name=?, email=?, company=?, tag=? WHERE id=? AND user_id=?");
        $stmt->execute([$name, $email, $company, $tag, $id, $user_id]);
        header('Location: my-leads.php?edited=1');
        exit;
    } else {
        $error = 'All fields required and email must be valid.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Lead</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<h2>Edit Lead</h2>
<?php if (!empty($error)) echo '<p style="color:red;">' . htmlspecialchars($error) . '</p>'; ?>
<form method="post">
    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($lead['name']) ?>" required><br>
    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($lead['email']) ?>" required><br>
    <label>Company:</label>
    <input type="text" name="company" value="<?= htmlspecialchars($lead['company']) ?>" required><br>
    <label>Tag:</label>
    <input type="text" name="tag" value="<?= htmlspecialchars($lead['tag']) ?>" required><br>
    <button type="submit">Save</button>
    <a href="my-leads.php">Cancel</a>
</form>
</body>
</html>
