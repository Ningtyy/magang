<?php
// Include database connection
include 'db_connect.php';

// Fetch chat messages from both user_messages and admin_replies tables
$sql = "SELECT admin_id, reply_text AS message_text, timestamp FROM admin_replies UNION SELECT user_id, message_text, timestamp FROM user_messages ORDER BY timestamp ASC";
$result = mysqli_query($conn, $sql);

// Check if query was successful
if ($result) {
    // Check if there are any rows returned
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            if(isset($row['admin_id']) && $row['admin_id'] == 1){
                echo '<div class="message-box">';
                echo '<strong>Customer:</strong> ' . $row['message_text'];
                echo '</div>';
            } elseif(isset($row['user_id']) && $row['user_id'] == 2) {
                echo '<div class="message-box">';
                echo '<strong>Admin:</strong> ' . $row['message_text'];
                echo '</div>';
            }
        }
    } else {
        echo '<div class="message-box">No messages yet.</div>';
    }
} else {
    // Display error message
    echo "Error executing the query: " . mysqli_error($conn);
}
?>