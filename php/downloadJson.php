<?php
	session_start();
	require_once "database_connection.php";
	
	if(!isset($_SESSION['logged_in']))
	{
		header('location: php/logout.php');
		exit();
	}
	
	$from_user_id = $_POST["from_user_id"];
	$to_user_id = $_POST["to_user_id"];
	$to_username = $_POST["to_username"];
		
	$sql_query="SELECT * FROM chat_message WHERE (to_user_id = '$to_user_id' AND from_user_id = '$from_user_id') OR (to_user_id = '$from_user_id' AND from_user_id = '$to_user_id')";
	$result = mysqli_query($connection, $sql_query);
	$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	$response = array();
	$posts = array();
	$myfile = fopen("../downloads/chat-".$to_username.".json", "w");	
	
	foreach($rows as $row)
	{ 
		$message = $row["chat_message"];
		$timestamp = $row["timestamp"];
		
		if(str_contains($row["chat_message"], "FILE_ID"))
		{			
			if($row["from_user_id"]==$from_user_id)
			{
				$message = "FILE UPLOAD [UNREACHABLE]";
			}
			else
			{
				$message = "FILE UPLOAD [UNREACHABLE]";
			}		
		}
		else
		{
			if($row["from_user_id"]==$from_user_id)
			{
						$user = "Me";
			}
			else
			{
						$user = $to_username;
			}
		}
		$posts[] = array('user'=> $user, 'message'=> $message, 'timestamp'=> $timestamp);
	}

	$response['posts'] = $posts;	
	fwrite($myfile, json_encode($response));
	fclose($myfile);
?>