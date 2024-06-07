<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Signup</title>
  <style>
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }


    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: #f0f0f0;
    }

   
    .container {
      background: #fff;
      padding: 2em;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
      text-align: center;
    }

    .container h1 {
      margin-bottom: 1em;
      font-size: 2em;
      color: #333;
    }

   
    .container label {
      display: block;
      margin-bottom: 0.5em;
      color: #555;
    }

   
    .container input[type="email"],
    .container input[type="tel"],
    .container input[type="password"] {
      width: 100%;
      padding: 0.75em;
      margin-bottom: 1em;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

   
    .container input[type="submit"] {
      background: #28a745;
      color: #fff;
      border: none;
      padding: 0.75em;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .container input[type="submit"]:hover {
      background: #218838;
    }

    .container p {
      margin-top: 1em;
    }

    .container a {
      color: #007bff;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .container a:hover {
      color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Admin Signup</h1>
    <form action="admin_signup_submit.php" method="post">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br><br>

      <label for="contact">Contact Number (max. 14 characters):</label>
      <input type="tel" id="contact" name="contact" maxlength="14" required><br><br>

      <label for="password">Password (min. 8 characters):</label>
      <input type="password" id="password" name="password" minlength="8" required><br><br>

      <input type="submit" value="Sign Up">
    </form>
    <p>If you already have an account, <a href="admin_login.php">login here</a>.</p>
  </div>
</body>
</html>
