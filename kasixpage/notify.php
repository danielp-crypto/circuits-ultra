<?php
// Database connection
$servername = "localhost";
$username   = "kasixpx6x9k6_daniel";
$password   = "@kasixPage9";
$database   = "kasixpx6x9k6_d";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    http_response_code(500);
    die("DB connection failed");
}

// Collect PayFast POST data
$full_name = $_POST['name_first'] ?? '';
$email     = $_POST['email_address'] ?? '';
$address   = $_POST['custom_str2'] ?? '';
$items     = $_POST['item_name'] ?? '';
$total     = $_POST['amount_gross'] ?? 0;
$status    = "pending"; // you can later update this when payment is confirmed

// Insert into database
$stmt = $conn->prepare("INSERT INTO orders (full_name, email, address, items, total, status) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssds", $full_name, $email, $address, $items, $total, $status);
$stmt->execute();
$stmt->close();
$conn->close();

// Send yourself an email notification
$to      = "enterprisewebtech@gmail.com"; // change to your email
$subject = "New Order Received";
$message = "New order placed:\n\nName: $full_name\nEmail: $email\nAddress: $address\nItems: $items\nTotal: R$total";
$headers = "From: no-reply@kasixpage.co.za";

mail($to, $subject, $message, $headers);

// Respond with 200 so PayFast knows notify.php ran fine
http_response_code(200);
echo "OK";
?>


