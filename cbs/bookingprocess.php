<?php
  
  include('cbssession.php');
  if(!session_id())
  {
    session_start();
  }

  include('dbconnection.php');

  //RETRIEVE INFO FROM SESSION AND POST
  $cic = $_SESSION['cic'];
  $fcar = $_POST['fcar'];
  $fpdate = $_POST['fpdate'];
  $frdate = $_POST['frdate'];
  //CALCULATE RENT SUM AMOUNT
  //1.CONVERT DATE TO ISO FORMAT
  $start = date('Y-m-d H:i:s', strtotime($fpdate));
  $return = date('Y-m-d H:i:s', strtotime($frdate));
  
  $daydiff = abs(strtotime($frdate)-strtotime($fpdate));
  $daynum = $daydiff/(60*60*24);	//86400 sec per day

  //GET VEHICLE PRICE
  $sqlp = "SELECT v_price FROM tb_vehicle WHERE v_reg='$fcar'";
  $result = mysqli_query($con,$sqlp);
  $row = mysqli_fetch_array($result);

  //CALCULATE TOTAL PRICE
  $totalprice = $daynum*($row['v_price']);

  //SQL INSERT NEW BOOKING
  $sql = "INSERT INTO tb_booking(b_customer,b_vehicle,b_bdate,b_rdate,b_totalprice,b_status)
       VALUES('$cic','$fcar','$fpdate','$frdate','$totalprice','1')";
  //EXECUTE SQL
  mysqli_query($con,$sql)or die(mysqli_error($con));;

  //CLOSE CONNECTION
  mysqli_close($con);

  header('Location:manage.php?id='.$cic);

?>