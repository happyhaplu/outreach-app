<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Upload Leads</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<?php if (!isset($_SESSION['user_id'])) die("🔒 Login required."); ?>

<h2>Upload Leads (CSV)</h2>
<form method="POST" action="../controllers/upload-controller.php" enctype="multipart/form-data">
  <label>CSV File:</label>
  <input type="file" name="lead_csv" accept=".csv" required>

  <label>Tag:</label>
  <input type="text" name="tag" placeholder="e.g. Demo" required>

  <button type="submit">Upload</button>
</form>
</body>
</html>
