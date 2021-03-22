<?php
  include('cbsadminsession.php');
  include('dbconnection.php');
 
  $cic = $_SESSION['cic'];

  //JOIN
  $sql = "SELECT * FROM tb_booking 
        LEFT JOIN tb_customer ON tb_booking.b_customer = tb_customer.c_ic
        LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
        LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
        WHERE b_status='1'";
  $result = mysqli_query($con,$sql);
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

  <script>
    $(document).ready( function () {
    $('#booking').DataTable();
} );
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
              
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <br> <br> <br> <br> <br>
    <div class="container">
      <h3>New Booking</h3>
      <table id="booking" class="display">
        <thead>
          <tr>
            <th>Booking ID</th>
            <th>Customer Name</th>
            <th>Contact No</th>
            <th>Vehicle</th>
            <th>Pickup Date</th>
            <th>Return Date</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Operation</th>
          </tr>
        </thead>
        <tbody>
          <?php
            while($row=mysqli_fetch_array($result))
            {
              echo "<tr>";
              echo"<td>".$row['b_id'] ."</td>";
              echo"<td>".$row['c_name'] ."</td>";
                echo"<td>".$row['c_contact'] ."</td>";
              echo"<td>".$row['v_model'] ."</td>";
              echo"<td>".$row['b_bdate'] ."</td>";
              echo"<td>".$row['b_rdate'] ."</td>";
              echo"<td>".$row['b_totalprice'] ."</td>";
              echo"<td>".$row['s_desc'] ."</td>";
              echo"<td>";
                echo "<a href='newBookingApproval.php?id=".$row['b_id']."' class='btn btn-primary'>Approval</a> &nbsp";
              echo"</td>";
              echo"</tr>";

            }
          ?>
        </tbody>
      </table>
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

  <script src="js/core/popper.min.js"></script>
  <script src="js/core/bootstrap.min.js"></script>
  <script src="js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>

</body>

</html>
