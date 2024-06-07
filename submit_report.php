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
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $description = $_POST['description'];

    $target_dir = "uploads/";
    $file_name = basename($_FILES["photo"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;

    
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

   
    if (file_exists($target_file)) {
        $uploadOk = 0;
        echo "Sorry, file already exists.";
    }

  
    if ($_FILES["photo"]["size"] > 5000000) { // 5MB
        $uploadOk = 0;
        echo "Sorry, your file is too large.";
    }

  
    $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
    $file_ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (!in_array($file_ext, $allowed_types)) {
        $uploadOk = 0;
        echo "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
    }

 
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];

            $sql = "INSERT INTO reports (name, age, address, description, photo, latitude, longitude) 
                    VALUES ('$name', '$age', '$address', '$description', '$target_file', '$latitude', '$longitude')";

            if ($conn->query($sql) === TRUE) {
                header("Location: report_details.php?id=" . $conn->insert_id);
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>
