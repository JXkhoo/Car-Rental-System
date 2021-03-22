<?php 
   session_start();  
                        
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Car Booking System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="img/logo.png" rel="shortcut icon"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  
  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
 
  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/font-awesome.min.css"/>
  <link rel="stylesheet" href="css/owl.carousel.min.css"/>
  <link rel="stylesheet" href="css/slicknav.min.css"/>

  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="css/loginstyle.css">
  <style type="text/css">
  .error {
    width: 100%; 
    margin: 0px auto; 
    padding: 10px; 
    border: 1px solid #a94442; 
    color: #a94442; 
    background: #f2dede; 
    border-radius: 5px; 
    text-align: left;
  }
 </style>
</head>
<body>


  <!-- Header section -->
  <header class="header-section clearfix">
    <a href="index.php" >
      <img src="img/logo.png" width="180" height="100" alt="">
    </a>
    <div class="header-right">
      <div class="user-panel">
        <a href="login.php" class="login">Login</a>
        <a href="register.php" class="register">Create an account</a>
      </div> 
    </div>
    <ul class="main-menu">
      <li><a href="index.php">Home</a></li>
      <li><a href="index.php#info">About</a></li>
      <li><a href="#">Car</a>
        <ul class="sub-menu">
          <li><a href="index.php#car">Car List</a></li>
          <li><a href="index.php#car">Rental Fee</a></li>
        </ul>
              <li><a href="userManual.pdf"target="_blank">User Manual</a></li>
      </li>
    
    </ul>
  </header>
  <!-- Header section end -->

<div class="main">
 <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="img/signin-image.jpg" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <?php  if(isset($_SESSION['error']))
                         {
                           echo "<div class='error'>";
                           echo $_SESSION['error'];
                           unset($_SESSION['error']);
                           echo "</div>";
                         }?>
                        <form method="POST" class="register-form" action="loginProcess.php">
                            <div class="form-group">
                                <label for="your_name"><i class="fa fa-id-card-o"></i></label>
                                <input type="text" name="icNo" id="icNo" placeholder="Your Identity Card Number" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="fa fa-key"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required="required"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

  <?php include 'footer.php' ?>
</body>
</html>
