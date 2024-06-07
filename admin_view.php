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

if (isset($_POST['update_admin'])) {
    $admin_id = $_POST['admin_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];

    $sql = "UPDATE admin_users SET email='$email', password='$password', contact='$contact' WHERE id='$admin_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Admin updated successfully";
    } else {
        echo "Error updating admin: " . $conn->error;
    }
}

if (isset($_POST['delete_admin'])) {
    $admin_id = $_POST['admin_id'];

    $sql = "DELETE FROM admin_users WHERE id='$admin_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Admin deleted successfully";
    } else {
        echo "Error deleting admin: " . $conn->error;
    }
}

$sql = "SELECT * FROM admin_users";
$result = $conn->query($sql);
$admins = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $admins[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Admins</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: blue;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        button {
            padding: 5px 10px;
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 3px;
        }
        button:hover {
            background-color: darkblue;
        }
    </style>
</head>
<body>
    <h1>View Admins</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Action</th>
        </tr>
        <?php foreach ($admins as $admin) : ?>
        <tr>
            <td><?php echo $admin['id']; ?></td>
            <td><?php echo $admin['email']; ?></td>
            <td><?php echo $admin['contact']; ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="admin_id" value="<?php echo $admin['id']; ?>">
                    <input type="email" name="email" value="<?php echo $admin['email']; ?>" required>
                    <input type="text" name="contact" value="<?php echo $admin['contact']; ?>" required>
                    <input type="password" name="password" placeholder="New Password" required>
                    <button type="submit" name="update_admin">Update</button>
                    <button type="submit" name="delete_admin">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
