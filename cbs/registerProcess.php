<?php
	session_start();	

	$errorPass = "Password entered is not the same!";
	$errorIC = "This identity number is already registered !";


	//Add DB connection
	include ("dbconnection.php");

	//Retrieve Data
	if(isset($_POST['register']))
	{
		$username = $_POST['name'];
		$identityNo = $_POST['icNo'];
		$phoneNo = $_POST['contactNo'];
		$address = $_POST['address'];
		$userPassword = $_POST['password'];
		$userPassword2 = $_POST['password2'];
		$userGender = $_POST['gender'];

		if($userPassword != $userPassword2)
		{
			$_SESSION['regerror'] = $errorPass;
			header('Location: register.php');
		}

		else
		{
					$userCheck = "SELECT * FROM tb_customer WHERE c_ic = ?";
					$query = $con->prepare($userCheck);
					$query->bind_param("s",$identityNo);
					$query->execute();
					$results = $query->get_result();
					if($results->num_rows === 0)
					{
							$hashpassword = password_hash($userPassword, PASSWORD_DEFAULT);
							$sql = "INSERT INTO tb_customer(c_ic,c_name,c_contact,c_address,c_password,c_gender) VALUES (?,?,?,?,?,?)";
							$stmt = $con->prepare($sql);
							$stmt->bind_param("ssssss",$identityNo,$username,$phoneNo,$address,$hashpassword,$userGender);
							$stmt->execute();
						
							header('Location:registerConfirm.php');				
					}
					else
					{
						$_SESSION['regerror'] = $errorIC;
						header('Location: register.php');
					}

		}

	}
		

	

	

	

	
	


?>