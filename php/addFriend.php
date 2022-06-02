<?php
	session_start();
	require_once "database_connection.php";
	
	if(!isset($_SESSION['logged_in']))
	{
		header('location: php/logout.php');
		exit();
	}
	
	$from_user_id=$_POST["from_user_id"];
	$from_username=$_POST["from_username"];
	$add_username=$_POST["add_username"];

	$sql = "SELECT * FROM login WHERE username='$add_username' AND '$from_username' != '$add_username'";		
	if($result = @$connection->query($sql))
	{
		$how_much = $result->num_rows;
		if($from_username == $add_username)
		{
			echo "Nie możesz dodać swojego własnego konta!";
		}
		else
		{
			if($how_much>0)
			{
				$row = $result->fetch_assoc();
				$add_user_id = $row['user_id'];

				$sql2 = "SELECT * FROM friends WHERE user_id='$from_user_id' AND friend_id='$add_user_id'";
				if($result2 = @$connection->query($sql2))
				{
					$how_much2 = $result2->num_rows;
					if($how_much2>0)
					{
						if(isset($_COOKIE['language']))
						{
							if($_COOKIE['language']=="pl")
							{
									echo "Użytkownik otrzymał już zaproszenie";
							}
							else if($_COOKIE['language']=="uk")
							{
									echo "You have already invited this user";
							}		
						}
					}
					else
					{
						$sql_insert="INSERT INTO friends 
						(user_id, friend_id) 
						VALUES ('{$from_user_id}', '{$add_user_id}')
						";
						
						mysqli_query($connection, $sql_insert);
						if(isset($_COOKIE['language']))
						{
							if($_COOKIE['language']=="pl")
							{
									echo "Zaproszono użytkownika";
							}
							else if($_COOKIE['language']=="uk")
							{
									echo "The user has been invited";
							}		
						}
					}
					$result2->close();
				}			
			} 
			else 
			{
				if(isset($_COOKIE['language']))
				{
					if($_COOKIE['language']=="pl")
					{
						echo "Nie istnieje użytkownik o podanej nazwie";
					}
					else if($_COOKIE['language']=="uk")
					{
						echo "User with the username given doesn't exist";
					}		
				}
			}
		}
		$result->close();		
	}	
	$connection->close();
?>