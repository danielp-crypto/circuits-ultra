<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("db.php");
$result = $conn->query("SELECT * FROM registrations ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/whatsapp-image-2025-11-18-at-09.33.29-removebg-preview.png-96x96.png" type="image/x-icon">
  
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f5f5f5; }
        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th { background: #007bff; color: white; }
        a.logout { float:right; padding: 8px 12px; background:red; color:#fff; text-decoration:none; border-radius:5px; }
        .table-scroll {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.table-scroll table {
    min-width: 600px; /* ensures horizontal scroll on small screens */
}
td {text-align:center;}
    </style>
</head>
<body>

<h2>Registrations Database <a class="logout" href="logout.php">Logout</a></h2>
<div class="table-scroll">
<table>
    <tr>
        
        <th>Name</th>
        <th>Surname</th>
        <th>Phone Number</th>
        <th>Class or Subject</th>
        <th>Registration Date</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        
        <td><?= $row['name'] ?></td>
        <td><?= $row['surname'] ?></td>
        <td><?= $row['phone'] ?></td>
        <td><?= $row['message'] ?></td>
        <td><?= $row['created_at'] ?></td>
    </tr>
    <?php endwhile; ?>

</table>
    </div>
</body>
</html>

