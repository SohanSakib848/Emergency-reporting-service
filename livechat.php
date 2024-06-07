<?php
session_start();
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
    $message_content = $_POST['message'];


    $stmt = $conn->prepare("INSERT INTO messages (sender_name, contact_number, message_content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $sender_name, $contact_number, $message_content);
    if ($stmt->execute()) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    exit;
}


$sql = "SELECT sender_name, contact_number, message_content, 'user' AS sent_by, sent_at FROM messages UNION SELECT sender_name, contact_number, message_content, 'admin' AS sent_by, sent_at FROM messages1 ORDER BY sent_at ASC";
$result = $conn->query($sql);
$messages = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Live Chat</title>
    <style>
        .chat-box {
            width: 300px;
            height: 400px;
            border: 1px solid #ccc;
            overflow-y: scroll;
            padding: 10px;
        }

        .input-box {
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
<h1>Live Chat</h1>
<div class="chat-box" id="chatBox">
    <?php foreach ($messages as $message) : ?>
        <?php if ($message['sent_by'] == 'admin') : ?>
            <p class="admin-message"><strong><?php echo htmlspecialchars($message['sender_name']) . " (" . htmlspecialchars($message['contact_number']) . "):"; ?></strong> <?php echo htmlspecialchars($message['message_content']); ?></p>
        <?php else : ?>
            <p class="user-message"><strong><?php echo htmlspecialchars($message['sender_name']) . " (" . htmlspecialchars($message['contact_number']) . "):"; ?></strong> <?php echo htmlspecialchars($message['message_content']); ?></p>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<div class="input-box">
    <input type="text" id="senderName" placeholder="Your Name">
    <input type="text" id="contactNumber" placeholder="Contact Number">
    <textarea id="messageInput" placeholder="Type your message"></textarea>
    <button id="sendMessageBtn">Send</button>
</div>
<script>
    $(document).ready(function () {
        $("#sendMessageBtn").click(function () {
            var sender_name = $("#senderName").val();
            var contact_number = $("#contactNumber").val();
            var message = $("#messageInput").val();
            $.post("livechat.php", {
                sender_name: sender_name,
                contact_number: contact_number,
                message: message
            }, function (response) {
                $("#messageInput").val("");
                fetchMessages();
            });
        });

        function fetchMessages() {
            $.get("fetch_messages.php", function (data) {
                $("#chatBox").html(data);
                var chatBox = $("#chatBox");
                chatBox.scrollTop(chatBox.prop("scrollHeight"));
            });
        }

      
        fetchMessages();

        
        setInterval(fetchMessages, 5000);
    });
</script>
</body>
</html>
