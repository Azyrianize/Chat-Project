<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<?php
	session_start();
	require_once "database_connection.php";
	
	if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('location: ../index.php');
		exit();
	}

	if($connection->connect_errno!=0)
	{
		echo "Error: ".$connection->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];

		$sql = "SELECT * FROM login WHERE username='$login' AND password='$haslo'";	
		if($result = @$connection->query($sql))
		{
			$how_much = $result->num_rows;
			if($how_much>0)
			{
				$row = $result->fetch_assoc();
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['password'] = $row['password'];
				$_SESSION['description'] = $row['description'];
				$_SESSION['avatar'] = $row['avatar'];
				
				unset($_SESSION['error_wrongDetails']);		
				$result->close();
				
				$_SESSION['logged_in'] = true;
				$_SESSION['first_login'] = true;
				
				header('location: ../chat.php');
			} 
			else 
			{
				if(isset($_COOKIE['language']))
				{
					if($_COOKIE['language']=="pl")
					{
							$_SESSION['error_wrongDetails'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					}
					else if($_COOKIE['language']=="uk")
					{
							$_SESSION['error_wrongDetails'] = '<span style="color:red">Your details are incorrect. Please try again.</span>';
					}
						
				}	
				header('location: ../index.php');
			}
		}
		$connection->close();
	}
?>