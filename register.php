<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$database = "signup"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}


$full_name = $_POST['full_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$password = $_POST['password']; 
$hashed_password = hashPassword($password); 
$gender = $_POST['gender'];


$sql = "INSERT INTO users (full_name, username, email, phone_number, password, gender) VALUES ('$full_name', '$username', '$email', '$phone_number', '$hashed_password', '$gender')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
