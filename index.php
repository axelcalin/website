<?php
	session_start();

	if(isset($_SESSION['id']))
	{
		echo "string";
		header ('Location: home.php');
	}
	else
	{
		echo "string111";
		header('Location: login.php');
	}
	
	//if()
	{

	}
	//else
	{
		
	}

?>