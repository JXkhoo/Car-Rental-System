<?php
  include('cbsadminsession.php');
  include('dbconnection.php');
 
  if(isset($_GET['id']))
  {
    $bid=$_GET['id'];
  }
  //JOIN
  $sqlb = "SELECT * FROM tb_booking 
        LEFT JOIN tb_customer ON tb_booking.b_customer = tb_customer.c_ic
        LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
        LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
        WHERE b_id=$bid";
  $resultb = mysqli_query($con,$sqlb);
  $rowb = mysqli_fetch_array($resultb);

  //Retrieve all status
  $sqls = "SELECT * FROM tb_status";
  $results = mysqli_query($con,$sqls);

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
  <style>
* {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
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
          <li>
            <a href="graph.php">
              <i class="fa fa-line-chart"></i>
              <p>Analytics</p>
            </a>
          </li>
          <li class="active ">
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
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <br> <br>
<div class="container">

  <br> <br> <br>
<center>
<h2>Admin Approval</h2>
</center>
           <div class="row" style="margin-left:100px;">
    <center>
  <div class="column" style="background-color:#eddbbb; ">
    <h2>Booking Details</h2>
    <p>Booking ID: <?php echo $rowb['b_id']?> </p> 
       <p>Pickup date: <?php echo $rowb['b_bdate']?>  </p>
       <p>Return date: <?php echo $rowb['b_rdate']?>   </p>
       <p>Total price: <?php echo $rowb['b_totalprice']?>   </p> 
      </div>
  <div class="column">
    <h2 >Customer Details</h2>
    <p>IC: <?php echo $rowb['c_ic']?>   </p>
    <p>Name: <?php echo $rowb['c_name']?> </p>
    <p>Contact Number: <?php echo $rowb['c_contact']?> </p>
    <p>Address: <?php echo $rowb['c_address']?> </p>
  </div>
  <div class="column" style="background-color:#eddbbb;">
    <h2>Vehicle Details</h2>
    <p>Reg Number: <?php echo $rowb['v_reg']?>   </p>
    <p>Type: <?php echo $rowb['v_model']?>   </p>
    <p>Year: <?php echo $rowb['v_year']?>   </p>
  </div>
</div>
</center>
<br><br>
<center>
  <form method="POST" action="newBookingApprovalProcess.php">
        <div class="form-group">
      <label for="admin">Select Decision</label>

      <?php

        $sqls="SELECT * FROM tb_status";
        $results=mysqli_query($con,$sqls);

        echo '<select class="form-control" style=" height:50px;width: 300px;" id="fstatus" name="fstatus">';
        while($rows=mysqli_fetch_array($results))
         { 
           if($rows['s_id']=='1')
           {
              echo"";
           }
           else
           {
              echo"<option value='".$rows['s_id']."'>".$rows['s_desc']."</option>";
           }
         }
        echo'</select>';

      ?>
    </div>
    <input type="hidden" id="fbid" name="fbid" value="<?php echo $rowb['b_id']?>"> 
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="color:white; width: 300px; ">Execute</button></center>
        

        <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
                                                        
            <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Confirmation on execute</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <p>Are you sure you want to change the status of this booking?</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-labeled" data-dismiss="modal">No <i class="fa fa-times"></i></button>
        <button type="submit" name="submit" class="btn btn-warning btn-labeled">Yes <span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
        </div>
        </div>                                                
        </div>
        </div>

  </form>

 

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
  <br> <br>
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
