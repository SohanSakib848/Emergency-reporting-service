<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$database = "signup"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$email = $_POST['email'];
$contact = $_POST['contact'];
$password = $_POST['password'];

$sql = "INSERT INTO admin_users (email, contact, password) VALUES ('$email', '$contact', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
