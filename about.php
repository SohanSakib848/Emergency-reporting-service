<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f9f9f9;
        }

        .about-section {
            padding: 50px;
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .about-section h2 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }

        .team-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 30px;
        }

        .team-member {
            flex-basis: 250px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-5px);
        }

        .team-member img {
            width: 100%;
            border-radius: 50%;
        }

        .team-member h3 {
            margin-top: 15px;
            color: #333;
        }
    </style>
</head>
<body>

<div class="about-section">
 
    <h2>About Us</h2>
    <div class="team-container">
        <div class="team-member">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRri-KG9zvIJZ8PpCy6kye4-cIms_ruw0t7A&s" alt="Md. Ehsanul Haque">
            <h3>Md. Ehsanul Haque</h3>
        </div>
        <div class="team-member">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6l4zSrMPtURfZ0GVV-uD_GoL8eS0Qx6LxJOQe7yvYtB2xiKfRpCEM7KU0-TU5gAzj-0A&usqp=CAU" alt="Tanvir Hasan Mishu">
            <h3>Tanvir Hasan Mishu</h3>
        </div>
        <div class="team-member">
            <img src="https://img.freepik.com/premium-vector/junior-high-school-student-portrait-wearing-uniform-with-hand-gesture-vector-illustration_429315-527.jpg" alt="Tanvir Hasan Akash">
            <h3>Tanvir Hasan Akash</h3>
        </div>
        <div class="team-member">
            <img src="https://static.vecteezy.com/system/resources/previews/012/742/443/non_2x/businessman-in-suit-man-gestures-hand-office-worker-happy-employee-of-company-stands-in-pose-funny-guy-in-tie-cartoon-flat-illustration-vector.jpg" alt="Mahamudul Hasan Sakib">
            <h3>Mahamudul Hasan Sakib</h3>
        </div>
    </div>
</div>

</body>
</html>
