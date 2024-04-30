<?php
// Include database connection
include 'db_connect.php';

// Get message from POST data
$message = $_POST['message'];

// Insert message into user_messages table
$sql = "INSERT INTO user_messages (user_id, message_text) VALUES (1, '$message')";
mysqli_query($conn, $sql);

// Send success response
echo 'Message sent successfully!';
?>
