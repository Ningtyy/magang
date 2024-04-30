<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Admin to Customer</title>
    <style>
        .chat-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .message-box {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <h2>Chat Admin to Customer</h2>
        <div id="chat-box">
            <!-- Chat messages will be displayed here -->
        </div>
        <form id="message-form">
            <input type="text" id="message" placeholder="Type your message...">
            <button type="submit">Send</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            // Load chat messages on page load
            loadChat();

            // Send message when form is submitted
            $('#message-form').submit(function(e){
                e.preventDefault();
                var message = $('#message').val();
                sendMessage(message);
            });

            // Function to load chat messages
            function loadChat(){
                $.ajax({
                    url: 'fetch_chat_admin.php',
                    method: 'GET',
                    success: function(data){
                        $('#chat-box').html(data);
                    }
                });
            }

            // Function to send message
            function sendMessage(message){
                $.ajax({
                    url: 'send_message_admin.php',
                    method: 'POST',
                    data: { message: message },
                    success: function(response){
                        loadChat(); // Reload chat after sending message
                        $('#message').val(''); // Clear input field
                    }
                });
            }

            // Auto-refresh chat every 3 seconds (optional)
            setInterval(function(){
                loadChat();
            }, 3000);
        });
    </script>
</body>
</html>
