<?php
// 1. Database connection
$host = "localhost";
$user = "letlotk0v8e8_admin";
$pass = "@letlotlo";
$db   = "letlotk0v8e8_letlotlo_data";

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// 2. Clean incoming POST data
$surname = trim($_POST['surname']);
$name    = trim($_POST['name']);
$phone   = trim($_POST['phone']);
$message = trim($_POST['textarea']);

// 3. Insert into database
$stmt = $conn->prepare("INSERT INTO registrations (surname, name, phone, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $surname, $name, $phone, $message);

if ($stmt->execute()) {
    echo "<h2>Registration Successful</h2>";
    echo "<p>Thank you, we have received your details.</p>";
} else {
    echo "<h2>Error</h2>";
    echo "<p>Something went wrong. Please try again.</p>";
}

$stmt->close();
$conn->close();
?>
