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

// Retrieve data from the reports and feedback tables
$sql = "SELECT reports.id, reports.description, reports.created_at, report_feedback.admin_feedback 
        FROM reports 
        LEFT JOIN report_feedback ON reports.id = report_feedback.report_id";
$result = $conn->query($sql);
$reports = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reports[] = $row;
    }
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
        }
    </style>
</head>
<body>
    <h1>My Report History</h1>
    <table border="1">
        <tr>
            <th>Report ID</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Admin Feedback</th>
        </tr>
        <?php foreach ($reports as $report) : ?>
        <tr>
            <td><?php echo $report['id']; ?></td>
            <td><?php echo $report['description']; ?></td>
            <td><?php echo $report['created_at']; ?></td>
            <td>
                <div class="feedback-box" id="feedback-<?php echo $report['id']; ?>">
                    <?php echo htmlspecialchars($report['admin_feedback'] ?? 'No feedback provided yet.'); ?>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
