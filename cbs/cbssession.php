<?php

	if(!session_id())
	{
		session_start();
	}


	if(isset($_SESSION['c_ic']) != session_id())
	{
		header('Location:index.php');
	}
	
	if($_SESSION['cic']=='admin')
	{
		header('Location:logout.php');
	}

?>