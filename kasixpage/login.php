<?php
// login.php
session_start();
if (!empty($_SESSION['admin_email'])) {
    header('Location: orders.php');
    exit;
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container" style="max-width:480px; margin-top:6rem;">
    <div class="card shadow">
      <div class="card-body">
        <h4 class="mb-3">Admin Login</h4>
        <?php if(!empty($_GET['error'])): ?>
          <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
        <?php endif; ?>
        <form method="post" action="authenticate.php" autocomplete="off">
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required autofocus>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <button class="btn btn-primary w-100" type="submit">Log in</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

