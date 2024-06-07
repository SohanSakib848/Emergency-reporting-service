<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Link to Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Link to your CSS file -->
    <link rel="stylesheet" href="signup.css">
    <style>
  .back-button {
            position: absolute;
            left: 20px;
            top: 20px;
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: #665353;
            text-decoration: underline;
        }
       
        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #fff;
        }
       
        .gender-slider {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            width: 100%;
            color: blue;
        }
        .gender-option {
            flex: 1;
            text-align: center;
            cursor: pointer;
            color: #fff;
            transition: all 0.3s ease;
        }
        .gender-option:hover {
            transform: scale(1.1);
        }
        .selected {
            font-weight: bold;
            font-size: 18px;
        }
     
        .button1 {
            text-align: center;
            margin-top: 20px;
        }
        .button1 input[type="submit"] {
            height: 45px;
            width: 200px;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: blue; 
        }
        .button1 input[type="submit"]:hover {
            background-color: darkblue; 
        }
    </style>
    <script>
        function selectGender(gender) {
            document.getElementById('selected_gender').value = gender;
           
            document.querySelectorAll('.gender-option').forEach(option => option.classList.remove('selected'));
            
            document.getElementById(gender.toLowerCase().replace(/\s+/g, "_")).classList.add('selected');
        }
    </script>
</head>
<body>
    
    <button class="back-button" onclick="history.go(-1)">Back</button>

    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
            <form action="register.php" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" id="full_name" name="full_name" placeholder="Enter your name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" id="phone_number" name="phone_number" placeholder="Enter your number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                    </div>
                </div>
                <div class="gender-details">
                    <span class="gender-title">Gender</span>
                    <div class="gender-slider">
                        <div class="gender-option" id="male" onclick="selectGender('Male')">Male</div>
                        <div class="gender-option" id="female" onclick="selectGender('Female')">Female</div>
                        <div class="gender-option" id="not_say" onclick="selectGender('Prefer not to say')">Prefer not to say</div>
                    </div>
                    <input type="hidden" id="selected_gender" name="gender" value="">

                </div>
                    
                <div class="button1">
                    <input type="submit" value="Register">
                </div>
            </form>
            <!-- Login link -->
            <div class="login-link1">Already have an account? <a href="main.php">Login here</a></div>
        </div>
    </div>

    <div class="button">
        <input type="submit" value="Register">
    </div>
</body>
</html>
