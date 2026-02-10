<?php
// authenticate.php
session_start();

// DB config - set to your values
$host = 'localhost';
$user = 'kasixpx6x9k6_daniel';
$pass = '@kasixPage9';
$dbname = 'kasixpx6x9k6_d';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("DB connection failed");
}

// Grab POST
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    header('Location: login.php?error=' . urlencode('Please enter both email and password.'));
    exit;
}

// Prepared statement: fetch admin
$stmt = $conn->prepare("SELECT id, password_hash FROM admins WHERE email = ?");
$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    $stmt->close();
    $conn->close();
    header('Location: login.php?error=' . urlencode('Invalid credentials.'));
    exit;
}

$stmt->bind_result($id, $password_hash);
$stmt->fetch();
$stmt->close();

// verify password
if (password_verify($password, $password_hash)) {
    // regenerate session id and set session
    session_regenerate_id(true);
    $_SESSION['admin_id'] = $id;
    $_SESSION['admin_email'] = $email;
    header('Location: orders.php');
    exit;
} else {
    header('Location: login.php?error=' . urlencode('Invalid credentials.'));
    exit;
}

