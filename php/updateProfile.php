<?php
	session_start();
	require_once "database_connection.php";
	
	if(!isset($_SESSION['logged_in']))
	{
		header('location: php/logout.php');
		exit();
	}


	$description = $_POST['myDescription'];	
	$length = strlen($description);
		
	if($length<42)
	{
		$sql_update="UPDATE login SET description = '".$description."' WHERE user_id='".$_SESSION['user_id']."'";
		mysqli_query($connection, $sql_update);
			
		$_SESSION['description'] = $description;
		unset($_SESSION['error_longDescription']);		
		$connection->close();
	}
	else
	{
		$_SESSION['error_longDescription'] = '<span style="color:red; padding-left: 20px;">Twój opis musi być poniżej 42 znaków!</span>';
	}
		
	header('location: ../profil.php');

?>