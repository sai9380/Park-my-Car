<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Easy ParkSync</title>
  <link href="img/favicon.png" rel="shortcut icon" type="image/png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
 
  <style>
    body{
      /* background:url(./img/b5.jpeg); */
    }
    .home{
      background:url(./img/vid.mp4);
      background-size:cover;
      width:100vw;
      
    }
  </style>
</head>
<body>
  <header>
    <nav>
      <div class="logo">Easy ParkSync</div>
      <ul class="nav-links">
        <li><a href="login.php">LOGIN</a></li>
        <li><a href="signup.php">SINGUP</a></li>
        <!-- <li><a href="about.php">ABOUT</a></li> -->
      </ul>
    </nav>
  </header>
  <div class="home">
     <video width:100vw; height:80vh; autoplay muted loop>
     <source src="./img/vid.mp4" type="video/mp4">
     
     </video>
  <main class="home-section">
    <h1>Welcome to Easy ParkSync</h1>
    <p>Find and book parking spaces easily</p>
    <a href="login.php"><button >Get Started</button></a>
  </main>
  
</div>
  <footer class="social-footer">
    <p>&copy; 2025 Easy ParkSync. All rights reserved.</p>
    <div class="social-icons">
      <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
      <a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
    </div>
  </footer>
</body>
</html>
