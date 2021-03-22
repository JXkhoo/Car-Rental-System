<?php
  
  include('cbssession.php');
  if(!session_id())
  {
    session_start();
  }

  include('dbconnection.php');

  //RETRIEVE INFO FROM SESSION AND POST
  $cic = $_SESSION['cic'];
  $fbid = $_POST['fbid'];
  $fcar = $_POST['fcar'];
  $fpdate = $_POST['fpdate'];
  $frdate = $_POST['frdate'];

  //CALCULATE RENT SUM AMOUNT
  //1.CONVERT DATE TO ISO FORMAT
  $start = date('Y-m-d H:i:s', strtotime($fpdate));
  $return = date('Y-m-d H:i:s', strtotime($frdate));

  $daydiff = abs(strtotime($frdate)-strtotime($fpdate));
  $daynum = $daydiff/(60*60*24);  //86400 sec per day

  //GET VEHICLE PRICE
  $sqlp = "SELECT v_price FROM tb_vehicle WHERE v_reg='$fcar'";
  $result = mysqli_query($con,$sqlp);
  $row = mysqli_fetch_array($result);

  //CALCULATE TOTAL PRICE
  $totalprice = $daynum*($row['v_price']);

  //SQL INSERT NEW BOOKING
  $sql = "UPDATE tb_booking
          SET b_vehicle='$fcar' , b_bdate='$fpdate', b_rdate='$frdate',
              b_totalprice='$totalprice',b_status='1'
          WHERE b_id='$fbid'";

  //EXECUTE SQL
  mysqli_query($con,$sql);

  //CLOSE CONNECTION
  mysqli_close($con);

  header('Location:manage.php');

?>