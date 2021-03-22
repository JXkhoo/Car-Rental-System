<?php
	session_start();	

	$errorpass = "Wrong password! Please login again." ;
	$errorname = "Wrong username! Please login again." ;
	$identityNo = "";
	$password = "";
	

	//Get DB Info
	include('dbconnection.php');

	if(isset($_POST['signin']))
	{
		$identityNo = $_POST['icNo'];
		$password = $_POST['password'];
		
		//Retrieve login from DB
		$sql = "SELECT * FROM tb_customer WHERE c_ic= ?";
		$query = $con->prepare($sql);
		$query->bind_param("s",$identityNo);
		$query->execute();
		$results=$query->get_result();
		$row = $results->fetch_assoc();

		if($results->num_rows > 0)
		{
			$password_hash = $row['c_password'];

			if(password_verify($password, $password_hash))
			{
				$_SESSION['c_ic'] = session_id();
				$_SESSION['cic'] = $identityNo;   //Save customer ID after login

				if($row['c_name']=='admin')
				{
					header('Location: dashboard.php');
				}
				else
				{

					header('Location: booking.php?id='.$row['c_ic']);
				}
			}
			else
			{
				$_SESSION['error'] = $errorpass;
				header('Location: login.php');
			}

		}

	    else
		{
			$_SESSION['error'] = $errorname;
			header('Location: login.php');
		}

	}
	
?>
