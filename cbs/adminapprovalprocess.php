<?php
  
  include('cbssession.php');
  if(!session_id())
  {
    session_start();
  }

  include('dbconnection.php');

    //RETRIEVE BOOKING DETAIL
  $fbid = $_POST['fbid'];
  $fstatus = $_POST['fstatus'];

  //SQL INSERT NEW BOOKING
  $sql = "UPDATE tb_booking
          SET b_status= '$fstatus'
          WHERE b_id=$fbid
          ";

 
  mysqli_query($con,$sql);

  //CLOSE CONNECTION
  mysqli_close($con);

  header('Location:status.php');

?>
