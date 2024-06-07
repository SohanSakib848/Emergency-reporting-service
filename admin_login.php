<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
            height: 100vh;
            background: #f0f0f0;
        }

        /* Container for the form */
        .container {
            background: #fff;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        /* Title styling */
        .container h2 {
            margin-bottom: 1em;
            font-size: 2em;
            color: #333;
        }

        /* Form label styling */
        .container label {
            display: block;
            margin-bottom: 0.5em;
            color: #555;
        }

        /* Form input styling */
        .container input[type="email"],
        .container input[type="password"] {
            width: 100%;
            padding: 0.75em;
            margin-bottom: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        
        .container input[type="submit"] {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 0.75em;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .container input[type="submit"]:hover {
            background: #0056b3;
        }

        
        .container p {
            margin-top: 1em;
            color: #888;
        }

        .container p a {
            color: #007bff;
            text-decoration: none;
        }

        .container p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>
        <form action="admin_login_submit.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>
        <p>If not registered, <a href="admin_signup.php">register here</a>.</p>
    </div>
</body>
</html>
