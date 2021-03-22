<?php
	include('dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sewa Bersama</title>
	<meta charset="UTF-8">
	<meta name="description" content="SolMusic HTML Template">
	<meta name="keywords" content="music, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Favicon -->
	<link href="img/logo.png" rel="shortcut icon"/>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
 
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

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
			<li><a href="#info">About</a></li>
			<li><a href="#">Car</a>
				<ul class="sub-menu">
					<li><a href="#car">Car List</a></li>
					<li><a href="#car">Rental Fee</a></li>
				</ul>
			</li>
		      <li><a href="userManual.pdf"target="_blank">User Manual</a></li>
		</ul>
	</header>
	<!-- Header section end -->

	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="hs-text">
								<h2><span>Car</span> for everyone.</h2>
								<p>Rent our car for your memorable holidays now with a lower price!</p>
								<a href="login.php" class="site-btn">Login to book now</a>
								<a href="#info" class="site-btn sb-c2">Look for details</a>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="hr-img">
								<img src="img/car.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Intro section -->
	<section class="intro-section spad" id="car">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-title">
						      <?php

						        $sql="SELECT * FROM tb_vehicle WHERE v_model='BMW X5'";
						        $result=mysqli_query($con,$sql);
								$row=mysqli_fetch_array($result);
						        echo "<h2>".$row['v_model']."</h2>";
						        echo "<h3>RM".$row['v_price']."/day</h3>";
						      ?>
					
						<img src="img/bg-showcase-1.png" alt="">
					</div>
				</div>
				<div class="col-lg-6">
					<p>If looking for an SUV for a vacation with friends or family, opt for a BMW X5. This beautifully styled model is large enough to accommodate everyone and everything you want or need to take along for the ride. It approaches the performance level of a typical BMW sports car and features a full range of amenities that make life easier while on the road for business or pleasure. If spaciousness and premium comforts are a priority then you will not be disappointed with the X5 as your next luxury car rental!</p>
					<a href="login.php" class="site-btn">Try it now</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->
	<section class="intro-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<p>Whether you're hoping to reduce your carbon footprint, or simply just love the feel of a quiet, smooth drive, the Tesla creates the perfect rental car for those looking for something different. The SIXT Tesla car rental shows off unique style and comfort while being 100% emission free. These luxury electric vehicles are both exclusive and extravagant, so test one out today with SIXT rent a car.</p>
					<a href="login.php" class="site-btn">Try it now</a>
				</div>
				<div class="col-lg-6">
					<div class="section-title">
							<?php

						        $sql="SELECT * FROM tb_vehicle WHERE v_model='Tesla'";
						        $result=mysqli_query($con,$sql);
								$row=mysqli_fetch_array($result);
						        echo "<center><h2>".$row['v_model']."</h2>";
						        echo "<h3>RM".$row['v_price']."/day</h3></center>";
						      ?>
						<img src="img/bg-showcase-2.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->
		<section class="intro-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-title">
						<?php

						        $sql="SELECT * FROM tb_vehicle WHERE v_model='Proton Saga'";
						        $result=mysqli_query($con,$sql);
								$row=mysqli_fetch_array($result);
						        echo "<h2>".$row['v_model']."</h2>";
						        echo "<h3>RM".$row['v_price']."/day</h3>";
						      ?>
						<img src="img/bg-showcase-3.jpg" alt="">
					</div>
				</div>
				<div class="col-lg-6">
					<p>When it comes to Proton, no car comes close to encapsulating its better days quite like the Saga. Great choice!</p>
					<a href="login.php" class="site-btn">Try it now</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->


	<!-- Subscription section -->
	<section class="subscription-section spad" id="info">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="sub-text">
						<h2>Why choose us?</h2>
						<p>Whether you need daily, monthly or yearly choose a length to suit your needs. With no hidden extras and a term to suit you.</p>
						<a href="login.php" class="site-btn">Try it now</a>
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="sub-list">
						<li><img src="img/icons/check-icon.png" alt="">Flexible rental period</li>
						<li><img src="img/icons/check-icon.png" alt="">New vehicles</li>
						<li><img src="img/icons/check-icon.png" alt="">Loyalty</li>
						<li><img src="img/icons/check-icon.png" alt="">Best price guaranteed</li>
			
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- Subscription section end -->

	<!-- Footer section -->
    <?php include 'footer.php' ?>
	<!-- Footer section end -->
	
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
