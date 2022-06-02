<?php

	session_start();
	require_once "database_connection.php";
	
	if(!isset($_SESSION['logged_in']))
	{
		header('location: php/logout.php');
		exit();
	}
	
	$my_user_id = $_GET["from_user_id"];
	
	$sql_query="SELECT * FROM login WHERE user_id = '$my_user_id'";

	$result = mysqli_query($connection, $sql_query);
	$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	foreach($rows as $row)
	{			
		if($row["user_id"]==$my_user_id)
		{
				echo $row["avatar"];
		}
	}
	
	$connection->close();
	
?>