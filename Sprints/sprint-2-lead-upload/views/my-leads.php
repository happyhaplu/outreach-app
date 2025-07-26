<?php
session_start();
require_once('../../sprint-1-authentication/inc/db.php');

if (!isset($_SESSION['user_id'])) die("🔒 Login required");

$user_id = $_SESSION['user_id'];
$tag = $_GET['tag'] ?? '';
$q = $_GET['q'] ?? '';

$sql = "SELECT * FROM leads WHERE user_id = ?";
$params = [$user_id];

if ($tag) {
    $sql .= " AND tag = ?";
    $params[] = $tag;
}
if ($q) {
    $sql .= " AND (name LIKE ? OR company LIKE ?)";
    $params[] = "%$q%";
    $params[] = "%$q%";
}

$stmt = $db->prepare($sql);
$stmt->execute($params);
$leads = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Leads</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<h2>My Lead Inbox</h2>
<?php if (isset($_GET['uploaded'])): ?>
    <p style="color:green;">✅ <?= (int)$_GET['uploaded'] ?> new lead(s) uploaded.</p>
<?php endif; ?>
<?php if (isset($_GET['deleted'])): ?>
    <p style="color:orange;">🗑️ <?= (int)$_GET['deleted'] ?> lead(s) deleted.</p>
<?php endif; ?>
<?php if (isset($_GET['archived'])): ?>
    <p style="color:blue;">📦 <?= (int)$_GET['archived'] ?> lead(s) archived.</p>
<?php endif; ?>
<?php if (isset($_GET['edited'])): ?>
    <p style="color:green;">✏️ Lead updated.</p>
<?php endif; ?>
<?php if (isset($_GET['error'])): ?>
    <p style="color:red;">❌ <?= htmlspecialchars($_GET['error']) ?></p>
<?php endif; ?>
<form method="GET">
  <label>Tag:</label>
  <input type="text" name="tag" value="<?= htmlspecialchars($tag) ?>">

  <label>Search (name/company):</label>
  <input type="text" name="q" value="<?= htmlspecialchars($q) ?>">

  <button type="submit">Filter</button>
</form>

<?php if (count($leads) > 0): ?>
<form method="post" action="../controllers/leads-actions.php" onsubmit="return confirm('Are you sure?');">
<table>
  <tr>
    <th><input type="checkbox" id="select-all" onclick="toggleAll(this)"></th>
    <th>Email</th><th>Name</th><th>Company</th><th>Tag</th><th>Action</th>
  </tr>
  <?php foreach ($leads as $lead): ?>
  <tr>
    <td><input type="checkbox" name="lead_ids[]" value="<?= $lead['id'] ?>"></td>
    <td><?= htmlspecialchars($lead['email']) ?></td>
    <td><?= htmlspecialchars($lead['name']) ?></td>
    <td><?= htmlspecialchars($lead['company']) ?></td>
    <td><?= htmlspecialchars($lead['tag']) ?></td>
    <td><a href="edit-lead.php?id=<?= $lead['id'] ?>">Edit</a></td>
  </tr>
  <?php endforeach; ?>
</table>
<button type="submit" name="action" value="delete">Delete Selected</button>
<button type="submit" name="action" value="archive">Archive Selected</button>
</form>
<script>
function toggleAll(source) {
  checkboxes = document.getElementsByName('lead_ids[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
<?php else: ?>
    <p style="color:gray;">No leads found for your filter.</p>
<?php endif; ?>
</body>
</html>
