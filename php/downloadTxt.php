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
	
	$myfile = fopen("../downloads/chat-".$to_username.".txt", "w");
	foreach($rows as $row)
	{			
		if(str_contains($row["chat_message"], "FILE_ID"))
		{	
				if($row["from_user_id"]==$from_user_id)
				{
					$txt = "Me: FILE UPLOAD [UNREACHABLE]";
					fwrite($myfile, $txt);
					$txt = "\n";
					fwrite($myfile, $txt);
				}
				else
				{
					$txt = $to_username.": FILE UPLOAD [UNREACHABLE]";
					fwrite($myfile, $txt);
					$txt = "\n";
					fwrite($myfile, $txt);
				}	
		}
		else
		{
				if($row["from_user_id"]==$from_user_id)
				{
					$txt = "Me: ".$row["chat_message"];
					fwrite($myfile, $txt);
					$txt = "\n";
					fwrite($myfile, $txt);
				}
				else
				{
					$txt = $to_username.": ".$row["chat_message"];
					fwrite($myfile, $txt);
					$txt = "\n";
					fwrite($myfile, $txt);
				}			
		}
	}
	
	fclose($myfile)
?>