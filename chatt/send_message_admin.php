<?php
// Include database connection
include 'db_connect.php';

// Check if form is submitted
if(isset($_POST['message'])) {
    // Escape user inputs for security
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert admin reply into database
    $sql = "INSERT INTO admin_replies (admin_id, message_text) VALUES (1, '$message')";
    if(mysqli_query($conn, $sql)) {
        echo "Message sent successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
