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

$sql = "SELECT full_name, email, phone_number, gender FROM users";
$result = $conn->query($sql);
$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
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
    <h1>View Users</h1>
    <table border="1">
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Gender</th>
        </tr>
        <?php foreach ($users as $user) : ?>
        <tr>
            <td><?php echo $user['full_name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['phone_number']; ?></td>
            <td><?php echo $user['gender']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
