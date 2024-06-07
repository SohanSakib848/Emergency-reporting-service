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
$sql = "SELECT id, description, created_at FROM reports";
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
    </style>
</head>
<body>
    <h1>My Report History</h1>
    <table border="1">
        <tr>
            <th>Report ID</th>
            <th>Description</th>
            <th>Created At</th>
        </tr>
        <?php foreach ($reports as $report) : ?>
        <tr>
            <td><?php echo $report['id']; ?></td>
            <td><?php echo $report['description']; ?></td>
            <td><?php echo $report['created_at']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
