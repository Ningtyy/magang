<?php
// Connecting to database
$conn = mysqli_connect("localhost", "root", "", "chatapp") or die("Database Error");

// Getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);
$isFromAdmin = isset($_POST['role']) && $_POST['role'] === 'admin';

// Admin's replies (you can fetch these from the database as well)
$adminReplies = array(
    "Hello there! How can I assist you?",
    "What can I do for you today?",
    "Feel free to ask any questions.",
    "I'm here to help. How can I assist you?"
);

if ($isFromAdmin) {
    // If message is from admin, directly send admin's message to user
    $replay = $getMesg;
} else {
    // If message is from user, fetch a random reply from admin's replies
    $replay = $adminReplies[array_rand($adminReplies)];
}

echo $replay;
?>
