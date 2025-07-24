<?php
require_once '../inc/db.php';
$stmt = $db->query("SELECT id, email, is_admin FROM users");
$users = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
  <title>User List</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
  <h2>Registered Users</h2>
  <table border="1" cellpadding="8" style="margin: 20px auto; background:#fff;">
    <tr><th>ID</th><th>Email</th><th>Admin</th></tr>
    <?php foreach ($users as $user): ?>
      <tr>
        <td><?= $user['id'] ?></td>
        <td><?= htmlspecialchars($user['email']) ?></td>
        <td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <p><a href="../index.php">Back to Home</a></p>
</body>
</html>
