<?php

	session_start();
	require_once "database_connection.php";
	
	if(!isset($_SESSION['logged_in']))
	{
		header('location: php/logout.php');
		exit();
	}
	
	$from_user_id=$_POST["from_user_id"];
	$to_user_id=$_POST["to_user_id"];
	$message=$_POST["mess_content"];
	$file_id=$_POST["file_id"];
	$date = date('Y-m-d H:i:s');
	
	if($_POST["file_index"]=="true")
	{
		$message = "FILE_ID:{$file_id}";
		echo $file_id;
	}

	$sql_insert_chat="INSERT INTO chat_message 
	(to_user_id, from_user_id, chat_message, timestamp) 
	VALUES ('{$to_user_id}', '{$from_user_id}', '{$message}', '{$date}')
	";

	mysqli_query($connection, $sql_insert_chat);
	
	$connection->close();
?>