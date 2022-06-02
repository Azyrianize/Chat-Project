<?php

	session_start();
	require_once "database_connection.php";
	
	if(!isset($_SESSION['logged_in']))
	{
		header('location: php/logout.php');
		exit();
	}
	
	$my_user_id = $_SESSION['user_id'];	
	$from_user_id=$_POST["from_user_id"];
		
	$sql_query="DELETE FROM friends
	WHERE user_id = '$from_user_id'
	";	
	mysqli_query($connection, $sql_query);
	
	
	$connection->close();
	
?>


