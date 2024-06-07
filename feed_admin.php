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

// Retrieve data from the reports table
$sql = "SELECT id, name, description, address, photo, created_at FROM reports";
$result = $conn->query($sql);
$reports = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reports[] = $row;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['feedback'])) {
    $report_id = $_POST['report_id'];
    $admin_feedback = $_POST['admin_feedback'];

    $stmt = $conn->prepare("INSERT INTO report_feedback (report_id, admin_feedback) VALUES (?, ?)
                            ON DUPLICATE KEY UPDATE admin_feedback = VALUES(admin_feedback)");
    $stmt->bind_param("is", $report_id, $admin_feedback);

    if ($stmt->execute()) {
        echo "Feedback submitted successfully.";
    } else {
        echo "Error submitting feedback: " . $conn->error;
    }

    $stmt->close();
}

// Function to retrieve feedback for a given report ID
function getFeedback($conn, $report_id) {
    $stmt = $conn->prepare("SELECT admin_feedback FROM report_feedback WHERE report_id = ?");
    $stmt->bind_param("i", $report_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $feedback = $result->fetch_assoc();
    $stmt->close();
    return $feedback ? $feedback['admin_feedback'] : '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Report History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: blue;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .feedback-box {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 3px;
            margin-top: 10px;
        }
        button {
            padding: 5px 10px;
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 3px;
        }
        button:hover {
            background-color: darkblue;
        }
        textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 3px;
            margin-top: 10px;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>My Report History</h1>
    <table border="1">
        <tr>
            <th>Report ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Address</th>
            <th>Photo</th>
            <th>Created At</th>
            <th>Admin Feedback</th>
        </tr>
        <?php foreach ($reports as $report) : ?>
        <tr>
            <td><?php echo $report['id']; ?></td>
            <td><?php echo $report['name']; ?></td>
            <td><?php echo $report['description']; ?></td>
            <td><?php echo $report['address']; ?></td>
            <td><img src="<?php echo $report['photo']; ?>" alt="Report Photo"></td>
            <td><?php echo $report['created_at']; ?></td>
            <td>
                <div class="feedback-box" id="feedback-<?php echo $report['id']; ?>">
                    <?php echo htmlspecialchars(getFeedback($conn, $report['id'])); ?>
                </div>
                <form method="POST" action="">
                    <input type="hidden" name="report_id" value="<?php echo $report['id']; ?>">
                    <textarea name="admin_feedback" rows="4" placeholder="Enter feedback..."></textarea>
                    <button type="submit" name="feedback">Submit Feedback</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
