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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

   
    echo "Email received from form: " . $email . "<br>";

    $sql = "SELECT email FROM admin_users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        header("Location: admin_dashboard.php"); 
        exit();
    } else {
        $error = "Admin user not found";
    }
}
?>
