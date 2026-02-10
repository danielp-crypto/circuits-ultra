<?php
session_start();

// Set your admin credentials
$admin_user = "admin";
$admin_pass = "@letlotlo9"; // change this

// Get posted login data
$user = $_POST['username'];
$pass = $_POST['password'];

if ($user === $admin_user && $pass === $admin_pass) {
    $_SESSION['admin'] = true;
    header("Location: dashboard.php");
    exit();
} else {
    $_SESSION['error'] = "Incorrect login details";
    header("Location: login.php");
}
?>

