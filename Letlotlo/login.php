<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/whatsapp-image-2025-11-18-at-09.33.29-removebg-preview.png-96x96.png" type="image/x-icon">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: white;
            padding: 30px;
            width: 350px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        input {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            background: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
            font-size: 16px;
        }
        .error { color: red; margin-top: 10px; }
        .logo {
  width: 120px;
  margin-bottom: 20px;
}
    </style>
</head>
<body>

    <div class="login-box">
    <img src="assets/images/whatsapp-image-2025-11-18-at-09.33.29-removebg-preview.png-96x96.png" alt="Company Logo" class="logo" />
        <h2>Admin Login</h2>

        <?php 
        if (isset($_SESSION['error'])) {
            echo "<p class='error'>".$_SESSION['error']."</p>";
            unset($_SESSION['error']);
        }
        ?>

        <form action="login_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

