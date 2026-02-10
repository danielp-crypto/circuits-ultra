<?php
session_start();
if (empty($_SESSION['admin_email'])) {
    header('Location: login.php');
    exit;
}
// db.php - database connection
$host = "localhost";
$user = "kasixpx6x9k6_daniel";   // your MySQL username
$pass = "@kasixPage9";       // your MySQL password
$dbname = "kasixpx6x9k6_d"; // your database name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle search query (customer name only)
$search = $_GET['search'] ?? '';
$sql = "SELECT * FROM orders";

if (!empty($search)) {
    $search = $conn->real_escape_string($search);
    $sql .= " WHERE full_name LIKE '%$search%'";
}

$sql .= " ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Orders List</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/animatecss/animate.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;0,700;1,400;1,700&display=swap&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;0,700;1,400;1,700&display=swap&display=swap"></noscript>
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&display=swap"></noscript>
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css?v=6i0PMT"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css?v=6i0PMT" type="text/css">
<!-- Bootstrap & theme -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/theme/css/style.css">
<link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<section data-bs-version="5.1" class="menu menu3 cid-sFAA5oUu2Y" once="menu" id="menu3-2">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="https://www.kasixpage.co.za">
                        <img src="assets/images/icon-logo-removebg-preview.png-65x96.png" alt="kasixpage" style="height: 3rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-primary display-7" href="https://www.kasixpage.co.za/">KasiXpage</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-primary display-7" href="https://www.kasixpage.co.za/">Home&nbsp;</a></li>
                    
                    <li class="nav-item"><a class="actives nav-link link text-primary display-7" href="https://www.kasixpage.co.za/products.php">Shop</a>
                    </li><li class="nav-item"><a class="nav-link link text-primary display-7" href="https://www.kasixpage.co.za/about.html">About</a></li><li class="nav-item"><a class="nav-link link text-primary display-7" href="https://www.kasixpage.co.za/contact.html">Contact</a></li></ul>
                <div class="icons-menu">
                    <a class="iconfont-wrapper" href="https://www.facebook.com/share/1CQ2ZnouWm/?mibextid=wwXIfr" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-facebook socicon" style="color: rgb(5, 56, 107); fill: rgb(5, 56, 107);"></span>
                    </a>
                    <a class="iconfont-wrapper" href="https://www.instagram.com/nyathi_syndicatesa/?utm_source=ig_web_button_share_sheet " target="_blank">
                        <span class="p-2 mbr-iconfont socicon-instagram socicon" style="color: rgb(5, 56, 107); fill: rgb(5, 56, 107);"></span>
                    </a>
                    <a class="iconfont-wrapper" href="https://www.tiktok.com/@dennisnyathisa?_t=ZS-8zulYORdnSD&_r=1" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-tiktok socicon"></span>
                    </a>
                    
                </div>
                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-primary-outline display-4" href="https://www.kasixpage.co.za/products.php">
                        Shop Now</a></div>
            </div>
        </div>
    </nav>
</section><br><br><br><br>
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
  <div class="container">
    <a class="navbar-brand" href="#">Admin</a>
    <div class="ms-auto">
      <span class="me-3">Signed in as <?= htmlspecialchars($_SESSION['admin_email']) ?></span>
      <a href="logout.php" class="btn btn-sm btn-outline-secondary">Logout</a>
    </div>
  </div>
</nav>
<div class="container mt-5">
  <h2 class="mb-4 text-center">📦 All Orders</h2>

  <!-- Search Bar -->
  <form method="GET" class="mb-4">
    <div class="input-group">
      <input type="text" name="search" class="form-control" placeholder="Search by Customer Name" value="<?= htmlspecialchars($search) ?>">
      <button class="btn btn-primary" type="submit">Search</button>
      <a href="orders.php" class="btn btn-secondary">Reset</a>
    </div>
  </form>

  <!-- Orders Table -->
  <div class="card shadow">
    <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Item</th>
            <th>Amount (R)</th>
            
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= htmlspecialchars($row['order_id']) ?></td>
              <td><?= htmlspecialchars($row['full_name']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
              <td><?= nl2br(htmlspecialchars($row['address'])) ?></td>
              <td><?= htmlspecialchars($row['items']) ?></td>
              <td><?= number_format($row['total'], 2) ?></td>
              
              <td><?= $row['created_at'] ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="9" class="text-center text-muted">No orders found.</td>
          </tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
</body>
</html>

