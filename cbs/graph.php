<?php
 include('cbsadminsession.php');
 include('dbconnection.php');

  $sql = "SELECT b_id FROM tb_booking WHERE b_status='1'";
  $receivedBooking = mysqli_query($con,$sql);
  $receivedQuantity = mysqli_num_rows($receivedBooking);

  $sql = "SELECT b_id FROM tb_booking WHERE b_status='2'";
  $approvedBooking = mysqli_query($con,$sql);
  $approvedQuantity = mysqli_num_rows($approvedBooking);

  $sql = "SELECT b_id FROM tb_booking WHERE b_status='3'";
  $rejectedBooking = mysqli_query($con,$sql);
  $rejectedQuantity = mysqli_num_rows($rejectedBooking);

  $dataPoints = array(
    array("y"=> $receivedQuantity, "label"=> "Received Booking", "color"=> "#eba134"),
    array("y"=> $approvedQuantity, "label"=> "Approved Booking", "color"=> "#34eb9f"),
    array("y"=> $rejectedQuantity, "label"=> "Rejected Booking", "color"=> "#eb3468")
  );
 
  $female = "SELECT c_ic FROM tb_customer WHERE c_gender='Female'";
  $femaleQty = mysqli_query($con,$female);
  $femaleQuantity = mysqli_num_rows($femaleQty);
  $male = "SELECT c_ic FROM tb_customer WHERE c_gender='Male'";
  $maleQty = mysqli_query($con,$male);
  $maleQuantity = mysqli_num_rows($maleQty);


  $dataPoints2 = array(
	  array("y"=> $femaleQuantity, "label"=> "Female", "color"=> "#11cf2a"),
	  array("y"=> $maleQuantity, "label"=> "Male", "color"=> "#eb4034")
	);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
  <link rel="icon" type="image/png" href="img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Sewa Bersama</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="demo/demo.css" rel="stylesheet" />
  <style type="text/css">
	* {
	  box-sizing: border-box;
	}

	/* Create two equal columns that floats next to each other */
	.column {
	  float: left;
	  width: 50%;
	  padding: 10px;
	  height: 300px; /* Should be removed. Only for demonstration */
	}

	/* Clear floats after the columns */
	.row:after {
	  content: "";
	  display: table;
	  clear: both;
	}

	/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
	@media screen and (max-width: 600px) {
	  .column {
	    width: 100%;
	  }
	}
  </style>
  <script>
  window.onload = function () {

  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
   
    title:{
      fontFamily: "tahoma",
      text: "Amount of booking"
    },
    axisY: {
      title: "Quantity"
    },
    data: [{        
      type: "column",  
      dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
  });
  chart.render();

	 
	var chart = new CanvasJS.Chart("chartContainer1", {
	  animationEnabled: true,
	  title:{
	  	 fontFamily: "tahoma",
	    text: "Gender of user registered"
	  },
	  subtitles: [{
	    text: ""
	  }],
	  data: [{
	    type: "doughnut",
	    showInLegend: "true",
	    legendText: "{label}",
	    indexLabelFontSize: 16,
	    indexLabel: "{label} - #percent%",
	    yValueFormatString: "#,##0",
	    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	  }]
	});
	chart.render();
	 

  }
  </script>

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue" data-active-color="danger">
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="img/logo.png">
          </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">Sewa Bersama</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a href="dashboard.php">
              <i class="fa fa-bars"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li  class="active ">
            <a href="graph.php">
              <i class="fa fa-line-chart"></i>
              <p>Analytics</p>
            </a>
          </li>
          <li >
            <a href="newBooking.php">
              <i class="fa fa-plus-square "></i>
              <p>New Booking</p>
            </a>
          </li>
          <li>
            <a href="status.php">
              <i class="fa fa-check "></i>
              <p>Approval/Rejected</p>
            </a>
          </li>
          <li>
            <a href="adminManual.pdf"target="_blank">
              <i class="fa fa-book"></i>
              <p>Admin Manual</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand">Sewa Bersama Admin Page</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#logout" style="color:white;"> Log out &nbsp <i class="fa fa-sign-out "></i></button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <br> <br> <br> <br> <br>
      <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <div class="row">
	  <div class="column">
	  	 <div id="chartContainer" style="height: 370px; width: 90%; margin-left: 40px;"></div>
	  </div>
	  <div class="column">
	  	 <div id="chartContainer1" style="height: 370px; width: 90%;margin-right: 10px;"></div>
	  </div>
	</div>
      
   
  



     <div class="modal fade" id="logout" role="dialog">
        <div class="modal-dialog">
                                                        
            <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Confirmation on Logout</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <p>Are you sure you want to log out from the system?</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-labeled" data-dismiss="modal">No <i class="fa fa-times"></i></button>
        <a href="logout.php"><button type="submit" name="submit" class="btn btn-warning btn-labeled">Yes <span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button></a>
        </div>
        </div>                                                
        </div>
        </div>

  <br> <br> <br> <br> 
     <?php include 'adminfooter.php' ?>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="js/core/jquery.min.js"></script>
  <script src="js/core/popper.min.js"></script>
  <script src="js/core/bootstrap.min.js"></script>
  <script src="js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>