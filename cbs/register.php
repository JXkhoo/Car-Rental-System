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
                <li><a href="userManual.pdf" target="_blank">User Manual</a></li>
        </ul>
      </li>
    
    </ul>
  </header>
  <!-- Header section end -->
<div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <?php 
                         if(isset($_SESSION['regerror']))
                         {
                           echo "<div class='error'>";
                           echo $_SESSION['regerror'];
                           unset($_SESSION['regerror']);
                            echo "</div>";
                         }

                        ?>
                        <form method="POST" class="register-form" action="registerProcess.php">
                            <div class="form-group">
                                <label for="name"><i class="fa fa-users"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="fa fa-users"></i></label>
                                <select class="form-control" style="height: 30px; width: 280px;font-size: 13px;" name="gender" id="gender" placeholder="Your Gender" required="required">
                                <option value="">Choose Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="fa fa-id-card-o"></i></label>
                                <input type="text" name="icNo" id="icNo" placeholder="Your Identity Card Number" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="fa fa-phone"></i></label>
                                <input type="text" name="contactNo" id="contactNo" placeholder="Your Contact Number" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="fa fa-map-marker"></i></label>
                                <input type="text" name="address" id="address" placeholder="Your Address" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="fa fa-key"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="fa fa-key"></i></label>
                                <input type="password" name="password2" id="password2" placeholder="Repeat your password" required="required"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="register" id="register" class="form-submit"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="img/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
</div>
</body>
  <?php include 'footer.php' ?>
</html>
