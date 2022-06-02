<?php

	session_start();
	require_once "database_connection.php";
	
	if(!isset($_SESSION['logged_in']))
	{
		header('location: php/logout.php');
		exit();
	}
	
	$user_id = $_SESSION["user_id"];
	$login_details_id = $_SESSION["login_details_id"];
	$last_activity = date('Y-m-d H:i:s');

	$sql_query="UPDATE login_details 
	SET last_activity = '".$last_activity."'
	WHERE user_id = '".$user_id."'
	";
	


	mysqli_query($connection, $sql_query);
	
	$connection->close();
?>