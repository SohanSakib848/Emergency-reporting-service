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
$sql = "SELECT * FROM reports";
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
    <title>View Reports</title>
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
        img {
            max-width: 100px;
            height: auto;
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
    </style>
</head>
<body>
    <h1>View Reports</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
            <th>Description</th>
            <th>Photo</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Created At</th>
            <th>Feedback</th>
            <th>Send</th>
        </tr>
        <?php foreach ($reports as $report) : ?>
        <tr>
            <td><?php echo $report['id']; ?></td>
            <td><?php echo $report['name']; ?></td>
            <td><?php echo $report['age']; ?></td>
            <td><?php echo $report['address']; ?></td>
            <td><?php echo $report['description']; ?></td>
            <td><img src="<?php echo $report['photo']; ?>" alt="Report Photo" width="100"></td>
            <td><?php echo $report['latitude']; ?></td>
            <td><?php echo $report['longitude']; ?></td>
            <td><?php echo $report['created_at']; ?></td>
            <td><button onclick="provideFeedback(<?php echo $report['id']; ?>)">Provide Feedback</button></td>
            <td><button onclick="sendReport(<?php echo $report['id']; ?>)">Send</button></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <script>
        function provideFeedback(reportId) {
            
            window.location.href = "feed_admin.php?report_id=" + reportId;
        }

        function sendReport(reportId) {
           
            alert("Report with ID " + reportId + " has been sent.");
        }
    </script>
</body>
</html>
