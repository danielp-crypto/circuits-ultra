<?php
$host = "localhost";
$user = "letlotk0v8e8_admin";
$pass = "@letlotlo";
$db   = "letlotk0v8e8_letlotlo_data";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
