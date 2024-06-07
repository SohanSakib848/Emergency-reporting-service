<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Form</title>
    <style>
        /* General reset for consistent styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Body styling */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f2f2f2;
        }

        /* Container for the form */
        .container {
            max-width: 600px;
            width: 100%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Title styling */
        .container h2 {
            margin-bottom: 20px;
            font-size: 2em;
            color: #333;
            text-align: center;
        }

        /* Input box styling */
        .input-box {
            margin-bottom: 20px;
        }

        /* Label styling */
        .details {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        /* Input and textarea styling */
        .input-box input[type="text"],
        .input-box input[type="number"],
        .input-box textarea,
        .input-box input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Button styling */
        .input-box button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .input-box button:hover {
            background-color: #0056b3;
        }

        /* Map styling */
        #map {
            height: 300px;
            width: 100%;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Submit button styling */
        .button1 input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button1 input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Report Form</h2>
        <form action="submit_report.php" method="POST" enctype="multipart/form-data">
            <div class="input-box">
                <span class="details">Name</span>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="input-box">
                <span class="details">Age</span>
                <input type="number" id="age" name="age" required>
            </div>
            <div class="input-box">
                <span class="details">Full Address (where the incident happened)</span>
                <textarea id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="input-box">
                <span class="details">Description</span>
                <textarea id="description" name="description" rows="5" required></textarea>
            </div>
            <div class="input-box">
                <span class="details">Upload Photo</span>
                <input type="file" id="photo" name="photo">
            </div>
            <div class="input-box">
                <span class="details">Location</span>
                <button type="button" onclick="getLocation()">Send Location</button>
            </div>
            <div id="map"></div>
            <input type="hidden" id="latitude" name="latitude">
            <input type="hidden" id="longitude" name="longitude">
            <div class="button1">
                <input type="submit" value="Submit Report">
            </div>
        </form>
    </div>

    <script>
        let map, infoWindow, marker;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 6,
            });
            infoWindow = new google.maps.InfoWindow();
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };
                        document.getElementById("latitude").value = pos.lat;
                        document.getElementById("longitude").value = pos.lng;

                        if (marker) {
                            marker.setMap(null);
                        }
                        
                        marker = new google.maps.Marker({
                            position: pos,
                            map: map,
                        });

                        map.setCenter(pos);
                        map.setZoom(15);
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation
                    ? "Error: The Geolocation service failed."
                    : "Error: Your browser doesn't support geolocation."
            );
            infoWindow.open(map);
        }

        window.initMap = initMap;
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVW6cWT7KA4gPt2x2iFe2yD_0Hj2gbQlc&callback=initMap" async defer></script>
</body>
</html>
