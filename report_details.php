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

if (isset($_GET['id'])) {
    $report_id = $_GET['id'];

    $sql = "SELECT * FROM reports WHERE id = $report_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $age = $row['age'];
        $address = $row['address'];
        $description = $row['description'];
        $photo = $row['photo'];
        $latitude = $row['latitude'];
        $longitude = $row['longitude'];
    } else {
        echo "Report not found.";
        exit();
    }
} else {
    echo "Report ID not provided.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Details</title>
    <style>
      
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

      
        body {
            background-color: #e0f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

       
        .container {
            max-width: 800px;
            width: 100%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-top: 5px solid #007bff;
        }

        
        .container h2 {
            margin-bottom: 20px;
            font-size: 2em;
            color: #007bff;
            text-align: center;
        }

      
        .container p {
            margin-bottom: 10px;
            font-size: 1.1em;
            color: #555;
        }

      
        #map {
            height: 300px;
            width: 100%;
            margin-top: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        #photo {
            max-width: 100%;
            margin-top: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Report Details</h2>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
        <p><strong>Age:</strong> <?php echo htmlspecialchars($age); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($address); ?></p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($description); ?></p>
        <img src="<?php echo htmlspecialchars($photo); ?>" id="photo" alt="Uploaded Photo">
        <div id="map"></div>
    </div>

    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVW6cWT7KA4gPt2x2iFe2yD_0Hj2gbQlc&callback=initMap" async defer></script>

    <script>
        function initMap() {
            var mapOptions = {
                center: { lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?> },
                zoom: 15
            };
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            var marker = new google.maps.Marker({
                position: mapOptions.center,
                map: map
            });
        }
    </script>
</body>
</html>
