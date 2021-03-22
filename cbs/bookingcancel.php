<?php
  
  include('cbssession.php');
  if(!session_id())
  {
    session_start();
  }

  include('dbconnection.php');

  //Check ID in URL
  if(isset($_GET['id']))
  {
  	$bid=$_GET['id'];
  }

  //SQL Delete operation
  $sql="DELETE FROM tb_booking WHERE b_id ='$bid'";

  //Execute SQL
  $result = mysqli_query($con,$sql);

  //Close connection
  mysqli_close($con);

  //Redirect
  header('Location:manage.php');
  ?>

