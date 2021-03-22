<?php
  
  include('cbssession.php');
  if(!session_id())
  {
    session_start();
  }

  include('dbconnection.php');

  $cic = $_SESSION['cic'];

  //JOIN
  $sql = "SELECT * FROM tb_booking 
  			LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
  			LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
  			WHERE b_customer='$cic'";
  $result = mysqli_query($con,$sql)

?>

<!DOCTYPE html>
<html lang="eng">
<head>
  <title>Sewa Bersama</title>
  <meta charset="UTF-8">
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

  <script>
    $(document).ready( function () {
    $('#car').DataTable();
} );
  </script>
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
form { 
margin: 0px 100px 0px 450px; 
width: 600px;
}
</style>
</head>   
<body>


 
  <!-- Header section -->
  <header class="header-section clearfix">
    <a href="booking.php">
      <img src="img/logo.png" width="180" height="100" alt="">
    </a>
    <div class="header-right">
     
      <div class="user-panel">
      <a data-toggle="modal" data-target="#logout" class="register">Log Out</a>
      </div> 
    </div>
    <ul class="main-menu">
      
      <li><a href="booking.php">Make your booking</a></li>
      <li><a href="manage.php">Manage your booking</a></li>
            <li><a href="userManual.pdf"target="_blank">User Manual</a></li>
    </ul>
  </header>
  <!-- Header section end -->
  
  <br>
  <br>

  <!-- How section -->
<font color="black">
    <div class="container text-white">
      <div class="section-title">
        <h2><font color="black"><center>Manage Your Booking!</center></font></h2>
      </div>
  <table id="car" class="display">
    <thead>
      <tr>
        <th>Booking ID</th>
        <th>Vehicle</th>
        <th>Pickup Date</th>
        <th>Return Date</th>
        <th>Total Price</th>
        <th>Status</th>
        <th>Manage</th>
      </tr>
    </thead>
    <tbody>
    	<?php

    		while($row=mysqli_fetch_array($result))
    		{
          echo "<tr>";
    			echo"<td>".$row['b_id'] ."</td>";
    			echo"<td>".$row['v_model'] ."</td>";
    			echo"<td>".$row['b_bdate'] ."</td>";
    			echo"<td>".$row['b_rdate'] ."</td>";
    			echo"<td>".$row['b_totalprice'] ."</td>";
    			echo"<td>".$row['s_desc'] ."</td>";
    			echo"<td>";
    				echo "<a href='bookingmodify.php?id=".$row['b_id']."' class='btn btn-warning'>Modify</a> &nbsp";
            echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" style="color:white;">Cancel</button> &nbsp';
    			echo"</td>";
    			echo"</tr>";

          echo "<div class='modal fade' id='myModal' role='dialog'>
          <div class='modal-dialog'>
          <div class='modal-content'>
          <div class='modal-header'>
          <h4 class='modal-title' style='color:black'>Confirmation on cancel booking</h4>";
        
          echo '<button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          <p style="color:black">Are you sure you want to cancel this booking?</p>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-labeled" data-dismiss="modal">No<i class="fa fa-times"></i></button>';

          echo "<a href='bookingcancel.php?id=".$row['b_id']."' class='btn btn-danger'>Yes<span class='btn-label btn-label-right'><i class='fa fa-check'></i></span></a> &nbsp";
          echo "</div>
          </div>                                                
          </div>
          </div>";
    		}
       

    	 ?>
    </tbody>
  </table>
</font>
  
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


</section>
 <!-- Footer -->
</body>
<br><br>

    <?php include 'footer.php' ?>
  <!-- Footer section end -->

  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.slicknav.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/mixitup.min.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>