<?php
// Database configuration
$db_host = 'localhost';
$db_user = 'root'; // Ganti dengan username database Anda
$db_pass = ''; // Ganti dengan password database Anda
$db_name = 'chatapp'; // Ganti dengan nama database Anda

// Create database connection
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
