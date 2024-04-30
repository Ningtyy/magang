CREATE TABLE user_messages (
    message_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    message_text TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_admin_message BOOLEAN
);

CREATE TABLE admin_replies (
    reply_id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT,
    reply_text TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
