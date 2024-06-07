<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Emergency Reporting Platform</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    
    .photo-gallery {
      text-align: center;
      margin-bottom: 40px;
    }
    .gallery-img {
      width: 200px;
      height: 150px;
      object-fit: cover;
      margin: 5px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    
    .serviceBox {
      text-align: center;
      padding: 20px;
      margin-bottom: 20px;
      background-color: #f4f4f4;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .service-icon {
      font-size: 40px;
      margin-bottom: 20px;
    }
    .serviceBox h3 {
      margin-bottom: 10px;
    }
    .serviceBox p {
      margin-bottom: 0;
    }

    
    .user-posts {
      margin-bottom: 40px;
    }
    .user-posts form {
      display: flex;
      flex-direction: column;
    }
    .user-posts textarea {
      margin-bottom: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .user-posts input[type="file"] {
      margin-bottom: 10px;
    }
    .user-posts button {
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .logo h2 a {
    text-decoration: none;
    color: white; 
  }

  .logo h2 a:hover {
    color: yellow; 
  }

  .nav-links li a {
    text-decoration: none;
    color: white; 
  }

  .nav-links li a:hover {
    color: yellow; 
  }
  </style>
</head>

<body>
<header>
    <nav>
      <div class="logo">
        <h2><a href="index.php">Emergency Reporting</a></h2>
      </div>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="emergency.php">Directory</a></li>
       
        <li><a href="dashboard.php">Dashboard</a></li>
      </ul>
    </nav>
  </header>
  <div class="user-icons">
  <a href="signup.php" class="user-icon"><i class="fa fa-user"></i></a>
  <a href="admin_signup.php" class="admin-icon"><i class="fa fa-cog"></i></a>
</div>
  
  <div class="container">
    <div class="photo-gallery">
      <h2>Emergency Photo Gallery</h2>
      <div class="gallery">
        <img src="emergency_photo1.jpg" alt="Emergency Photo 1" class="gallery-img">
        <img src="emergency_photo2.jpg" alt="Emergency Photo 2" class="gallery-img">
        <img src="emergency_photo3.jpg" alt="Emergency Photo 3" class="gallery-img">
        <img src="emergency_photo1.jpg" alt="Emergency Photo 1" class="gallery-img">
        <img src="emergency_photo2.jpg" alt="Emergency Photo 2" class="gallery-img">
      </div>
    </div>
  </div>

  
  
  <div class="container">
    <div class="row">
     
    <div class="col-md-4">
    <a href="report_form.php" class="report-link">
        <div class="serviceBox blue">
            <div class="service-icon">
                <i class="fa fa-flag"></i>
            </div>
            <h3 class="title">Report Now</h3>
            <p class="description">Quickly report emergencies and get help from emergency responders.</p>
        </div>
    </a>
</div>

<div class="col-md-4">
    <a href="livechat.php" class="service-link"> 
        <div class="serviceBox green">
            <div class="service-icon">
                <i class="fa fa-comments"></i>
            </div>
            <h3 class="title">Live Chat</h3>
            <p class="description">Get real-time assistance and guidance from emergency responders via live chat.</p>
        </div>
    </a>
</div>
<div class="col-md-4">
    <a href="emergency_sos.php" class="service-link"> 
        <div class="serviceBox green">
            <div class="service-icon">
                <i class="fa fa-comments"></i>
            </div>
            <h3 class="title">Emergency SOS</h3>
            <p class="description"> use your phone to trigger emergency actions .</p>
        </div>
    </a>
</div>
<div class="container">
    <div class="user-posts">
      <h2>User Posts</h2>
      <form action="#" method="post">
        <textarea name="post_content" id="post_content" cols="30" rows="5" placeholder="Write your post here..."></textarea>
        <input type="file" name="post_photo" id="post_photo" accept="image/*">
        <button type="submit">Submit Post</button>
      </form>
    </div>
  </div>
  

  <div class="container">
    <div class="admin-comments">
      <h2>Admin Comments</h2>
      <ul>
        <li>Admin: This is an admin comment providing instructions.</li>
        <li>Admin: This is another admin comment.</li>
        
      </ul>
    </div>
  </div>

       

  <footer>
    <div class="container">
      <p>&copy; 2024 Emergency Reporting Platform. All Rights Reserved.</p>
    </div>
  </footer>

  <script src="scripts.js"></script>
</body>
</html>
