<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: admin_login.php');
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sender_name']) && isset($_POST['contact_number']) && isset($_POST['message'])) {
    $sender_name = $_POST['sender_name'];
    $contact_number = $_POST['contact_number'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages1 (sender_name, contact_number, message_content, sent_by) VALUES ('$sender_name', '$contact_number', '$message', 'admin')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    exit;
}

$sqlAdmin = "SELECT * FROM messages1 ORDER BY sent_at ASC";
$resultAdmin = $conn->query($sqlAdmin);
$messagesAdmin = [];
if ($resultAdmin->num_rows > 0) {
    while ($row = $resultAdmin->fetch_assoc()) {
        $messagesAdmin[] = $row;
    }
}


$sqlUser = "SELECT * FROM messages ORDER BY sent_at ASC";
$resultUser = $conn->query($sqlUser);
$messagesUser = [];
if ($resultUser->num_rows > 0) {
    while ($row = $resultUser->fetch_assoc()) {
        $messagesUser[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Live Chat</title>
    <style>
        .chat-box {
            width: 300px;
            height: 400px;
            border: 1px solid #ccc;
            overflow-y: scroll;
            padding: 10px;
        }
        .input-box {
            margin-top: 10px;
        }
        .message {
            margin-bottom: 10px;
        }
        .admin-message {
            background-color: #e1ffc7;
            padding: 5px;
            border-radius: 5px;
        }
        .user-message {
            background-color: #c7e1ff;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Admin Chat</h1>
    <div class="chat-box" id="chatBox">
        <?php 
           
            foreach ($messagesAdmin as $message) : ?>
                <div class="message admin-message">
                    <p><strong><?php echo htmlspecialchars($message['sender_name']) . " (" . htmlspecialchars($message['contact_number']) . "):"; ?></strong> <?php echo htmlspecialchars($message['message_content']); ?></p>
                </div>
        <?php endforeach; 
        
            foreach ($messagesUser as $message) : ?>
                <div class="message user-message">
                    <p><strong><?php echo htmlspecialchars($message['sender_name']) . " (" . htmlspecialchars($message['contact_number']) . "):"; ?></strong> <?php echo htmlspecialchars($message['message_content']); ?></p>
                </div>
        <?php endforeach; ?>
    </div>
    <div class="input-box">
        <input type="text" id="senderName" placeholder="Your Name">
        <input type="text" id="contactNumber" placeholder="Contact Number">
        <textarea id="messageInput" placeholder="Type your message"></textarea>
        <button id="sendMessageBtn">Send</button>
    </div>

    <script>
        $(document).ready(function() {
            $("#sendMessageBtn").click(function() {
                var sender_name = $("#senderName").val();
                var contact_number = $("#contactNumber").val();
                var message = $("#messageInput").val();
                $.post("admin_chat.php", { sender_name: sender_name, contact_number: contact_number, message: message }, function(response) {
                    $("#messageInput").val("");
                    fetchMessages();
                });
            });

            function fetchMessages() {
                $.get("admin_chat.php", function(data) {
                    var chatBox = $("#chatBox");
                    chatBox.html($(data).find("#chatBox").html());
                    chatBox.scrollTop(chatBox.prop("scrollHeight"));
                });
            }

            setInterval(fetchMessages, 5000);
        });
    </script>
</body>
</html>
