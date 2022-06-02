<?php
	
	session_start();

	if((!isset($_POST['login'])) || (!isset($_POST['haslo'])) || (!isset($_POST['email'])) || (!isset($_POST['repeatemail'])))
	{
		header('location: ../registerForm.php');
		exit();
	}
	
	require_once "database_connection.php";
	
	if($connection->connect_errno!=0)
	{
		echo "Error: ".$connection->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		$email = $_POST['email'];
		$repeatemail = $_POST['repeatemail'];
		
		$description = "Twój opis";
		$date = date('Y-m-d H:i:s');
		
		if($login != "" || $haslo != "" || $email != "" || $repeatemail != "")
		{
			$sql_query="INSERT INTO login 
			(username, password, email, description) 
			VALUES ('{$login}', '{$haslo}', '{$email}', '{$description}')
			";
	
			mysqli_query($connection, $sql_query);
			
			$sql = "SELECT * FROM login WHERE username='$login' AND password='$haslo'";
		
			if($result = @$connection->query($sql))
			{
				$how_much = $result->num_rows;
				if($how_much>0)
				{
					$row = $result->fetch_assoc();
					$user_id = $row['user_id'];

					$result->close();
				}	
			}
			
			$sql_query="INSERT INTO login_details 
			(user_id, last_activity) 
			VALUES ('{$user_id}', '{$date}')
			";
		
			mysqli_query($connection, $sql_query);
			
			
			
			$connection->close();
			header('location: ../index.php');
		}
		else
		{
			if(isset($_COOKIE['language']))
			{
				if($_COOKIE['language']=="pl")
				{
					$_SESSION['reg_error_wrongDetails'] = '<span style="color:red; float: left; margin-left: 30px">Nieprawidłowo wypełniony formularz. Spróbuj ponownie</span></br>';
				}
				else if($_COOKIE['language']=="uk")
				{
					$_SESSION['reg_error_wrongDetails'] = '<span style="color:red; float: left; margin-left: 30px">You completed the form incorrectly. Please try again</span></br>';
				}
						
			}	
			header('location: ../registerForm.php');
		}
		
	

		
	}


?>