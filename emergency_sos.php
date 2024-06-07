<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "signup";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $conn->real_escape_string($_POST['name']); 
    $contact_number = $conn->real_escape_string($_POST['contact_number']); 
    
    $sql = "INSERT INTO sos (name, contact_number, location, user_id)
            VALUES ('$name', '$contact_number', 'Location data', 1)"; 

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency SOS</title>
    <!-- Add your CSS link here -->
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <div class="col-md-4">
        <a href="#" class="service-link"> <!-- Change the href to "#" -->
            <div class="serviceBox green">
                <div class="service-icon">
                    <i class="fa fa-comments"></i>
                </div>
                <h3 class="title">Emergency SOS</h3>
                <p class="description">Use your phone to trigger emergency actions.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <!-- Your form fields go here -->
                    <input type="hidden" name="name" value="User's Name"> <!-- Change this to dynamically get user's name -->
                    <input type="hidden" name="contact_number" value="User's Contact Number"> <!-- Change this to dynamically get user's contact number -->
                    <!-- Other fields as needed -->
                    <input type="submit" value="Send SOS">
                </form>
            </div>
        </a>
    </div>
</body>
</html>
