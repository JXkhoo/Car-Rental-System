<?php
  
  include('cbssession.php');
  if(!session_id())
  {
    session_start();
  }

  include('dbconnection.php');

  //RETRIEVE BOOKING DETAIL
  if(isset($_GET['id']))
  {
    $bid=$_GET['id'];
  }
  
  //RETRIEVE BOOKIG
  $sql = "SELECT * FROM tb_booking 
      LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
      WHERE b_id='$bid'";

  $result = mysqli_query($con,$sql);
  $rowbooking = mysqli_fetch_array($result);


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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $(function(){
              var dateToday = new Date();
              var dates = $("#fpdate,#frdate").datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                minDate: dateToday,
                onSelect: function(selectedDate) {
                    var option = this.id == "fpdate" ? "minDate" : "maxDate",
                        instance = $(this).data("datepicker"),
                        date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                    dates.not(this).datepicker("option", option, date);
                }
            });
          });
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
      <a href="#" class="hr-btn">Help</a>
      <span>|</span>
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
<section class="premium-section spad ">
    <div class="container text-black">
      <div class="section-title">
        <center><h2>Modify your booking!</h2></center>
      </div>


<div class="row">
  <center>
  <div class="column" style="background-color:#aaa; height: 30%; width: 30%; margin-left:100px;">
     <img class="img-thumbnail" src="img/bg-showcase-1.png" >
    <h2>BMW X5</h2>
    <p>RM150/day</p>
  </div>
  <div class="column" style="background-color:#bbb;height: 28%; width: 28%;">
     <img class="img-thumbnail" src="img/bg-showcase-3.jpg">
    <h2>Proton Saga</h2>
    <p>RM100/day</p>
  </div>
  <div class="column" style="background-color:#ccc;height: 30%; width: 30%;">
    <img class="img-thumbnail" src="img/bg-showcase-2.png">
    <h2>Tesla</h2>
    <p>RM450/day</p>
  </div>
</center>
</div>



</div>

  <div class="row">
  <div class="col-sm-8">
 
    <form method="POST" action="bookingmodifyprocess.php">
    <div class="form-group">
      <label for="text">Booking ID: </label>
     <?php
      echo $bid;
     ?>
    </div>

    <div class="form-group">
      <label for="email">Select your preferred car</label>

      <?php

        $sqlcar="SELECT * FROM tb_vehicle";
        $resultcar=mysqli_query($con,$sqlcar);

        echo '<select class="form-control" id="fcar" name="fcar" >';
        while($rowcar=mysqli_fetch_array($resultcar))
          {
            if($rowcar['v_reg']==$rowbooking['b_vehicle'])
            {
              echo"<option selected='selected' value='".$rowcar['v_reg']."'>".$rowcar['v_model']."</option>";
            }
            else
            {
              echo"<option value='".$rowcar['v_reg']."'>".$rowcar['v_model']."</option>";
            }
          }

        echo'</select>';

      ?>
</div>


    <div class="form-group">
      <label for="fpdate">Pickup Date</label>
      <?php
        echo  '<input type="text" class="form-control" id="fpdate" name="fpdate" value= "'.$rowbooking['b_bdate'].'">';
      ?>
    </div>

    <div class="form-group">
       <label for="frdate">Return Date</label>
      <input type="text" class="form-control" id="frdate" name="frdate" value= "<?php echo $rowbooking['b_rdate']?>">
    </div>
  
     <input type="hidden" id="fbid" name="fbid" value="<?php echo $rowbooking['b_id']?>">
   <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="color:white;">Modify</button></center>
</div>

        <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
                                                        
            <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Confirmation on modify</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <p>Are you sure you want to change the details of booking?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-labeled" data-dismiss="modal">No <i class="fa fa-times"></i></button>
        <button type="submit" name="submit" class="btn btn-warning btn-labeled">Yes<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
  
    </section>      </div>
        </div>                                                
        </div>
        </div>

  </form>
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

</div>
  </section>
  <?php include 'footer.php' ?>  
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.slicknav.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/mixitup.min.js"></script>
  <script src="js/main.js"></script>
 
  </body>
</html>
