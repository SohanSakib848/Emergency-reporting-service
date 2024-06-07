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


$filter = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filter'])) {
   
    $filter = $_POST['service_filter'];
}


$sql = "SELECT * FROM emergency_service_numbers";
if (!empty($filter)) {
    $sql .= " WHERE service_name = '$filter'";
}


$result = $conn->query($sql);


$emergencyNumbers = [];


if ($result && $result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        $emergencyNumbers[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Service Numbers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

       
        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

       
        .footer {
            background-color: #333;
            color: #f2f2f2;
            text-align: center;
            padding: 20px;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="#police">Police</a>
    <a href="#fire">Fire</a>
    <a href="#ambulance">Ambulance</a>
</div>

<div style="padding:20px">
    <h1>Emergency Service Numbers</h1>
    <form method="POST" action="">
        <label for="service_filter">Filter by Service:</label>
        <select name="service_filter" id="service_filter">
            <option value="">All Services</option>
            <option value="Police" <?php if ($filter === "Police") echo "selected"; ?>>Police</option>
            <option value="Fire" <?php if ($filter === "Fire") echo "selected"; ?>>Fire</option>
            <option value="Ambulance" <?php if ($filter === "Ambulance") echo "selected"; ?>>Ambulance</option>
        </select>
        <button type="submit" name="filter">Filter</button>
    </form>

    <table border="1">
        <tr>
            <th>Service Name</th>
            <th>Phone Number</th>
        </tr>
        <?php foreach ($emergencyNumbers as $number) : ?>
            <tr>
                <td><?php echo $number['service_name']; ?></td>
                <td><?php echo $number['phone_number']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="footer">
    <p>© 2024 Emergency Service Numbers. All rights reserved.</p>
</div>

</body>
</html>
