<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
        }
        .sidebar {
            margin-top: 60px; 
            background-color: #f4f4f4;
            padding: 15px;
            width: 200px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #ddd;
        }
        .main-content {
            margin-left: 220px; 
            padding: 20px;
            margin-top: 60px; 
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>User Dashboard</h1>
    </div>

    <div class="sidebar">
        <a href="feedback_user.php">Feedback</a>
        <a href="my_report_history.php">Report History</a>
        <a href="#">Post Comment</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="main-content">
        <h2>Welcome to Your Dashboard</h2>
     
    </div>
</body>
</html>
