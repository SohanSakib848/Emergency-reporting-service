<!-- admin_dashboard.php -->
<?php
session_start();


if (!isset($_SESSION['email'])) {
   
    header('Location: admin_login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column; 
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
            z-index: 2; 
        }
        .navbar {
    background: linear-gradient(to bottom right, #4caf50, #2196f3); 
    color: white; 
    padding: 15px;
    width: 200px;
    position: fixed; 
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    z-index: 1; 
    overflow-y: auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
    display: flex; 
    flex-direction: column;
    align-items: center; /* Center horizontally */
}

        .navbar a {
            display: block;
            padding: 10px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease; 
            text-align: center; 
        }
        .navbar a:hover {
            background-color: rgba(255, 255, 255, 0.1); 
        }
        .main-content {
            margin-left: 220px; 
            padding: 20px;
            margin-top: 60px; 
            width: calc(100% - 220px);
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard</h1>
    </div>

    <div class="navbar">
        <a href="admin_view.php">View/Update Admin Info</a>
        <a href="view_reports.php">View Reports</a>
        <a href="view_user.php">View User Info</a>
        <a href="admin_chat.php">Live Chat</a>
        <a href="sos_info.php">Sos Info</a>
        <a href="logout1.php"> Logout</a>
    </div>

    <div class="main-content">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?></h2>
        <p>Select an option from the navbar to manage the admin panel.</p>
    </div>
</body>
</html>
