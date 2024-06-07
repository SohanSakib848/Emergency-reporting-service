

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <!-- Link to CSS file -->
  <link rel="stylesheet" href="app.css">
  
  <style>
  
    .additional-rule {
      color: blue;
    }
  </style>
</head>
<body>
  <div class="overlay">
   
    <form action="login.php" method="POST">
     
      <div class="con">
      
        <header class="head-form">
          <h2>Log In</h2>
        
          <p>Login here using your username and password</p>
        </header>
     
        <br>
        <div class="field-set">
        
          <span class="input-item">
            <i class="fa fa-user-circle"></i>
          </span>
       
          <input class="form-input" id="txt-input" type="text" placeholder="@UserName" name="username" required>
          <br>
        
          <span class="input-item">
            <i class="fa fa-key"></i>
          </span>
        
          <input class="form-input" type="password" placeholder="Password" id="pwd"  name="password" required>
          
          <span>
            <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
          </span>
          <br>
          
          <button class="log-in" type="submit"> Log In </button>
        </div>
        
        <div class="other">
        
          <button class="btn submits frgt-pass">Forgot Password</button>
          
       
          <a href="signup.php" class="btn submits sign-up" style="text-decoration: none; background-color: #2ecc71; color: #fff; padding: 10px 20px; border-radius: 5px; transition: background-color 0.3s ease;">Sign Up 
 
  <i class="fa fa-user-plus" aria-hidden="true"></i>
</a>
        </div>
      
      </div>
  
    </form>
  </div>
  
  
  <script src="app.js"></script>
</body>
</html>