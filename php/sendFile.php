<?php
	session_start();
	require_once "database_connection.php";
	
	if(!isset($_SESSION['logged_in']))
	{
		header('location: php/logout.php');
		exit();
	}
	
	$to_user_id = $_POST["to_user_id"];
	$from_user_id = $_POST["from_user_id"];
	$filename = $_POST["filename"];
	$extention = $_POST["extention"];
	
	$sql_insert_file="INSERT INTO files 
	(user_from, user_to, filename) 
	VALUES ('{$from_user_id}', '{$to_user_id}', '{$filename}')
	";
	
	if(mysqli_query($connection, $sql_insert_file)) 
	{
		$last_id = mysqli_insert_id($connection);
		echo $last_id;		
	}

    if ( 0 < $_FILES['file']['error'] ) {
        //echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/'.$last_id. '' .$extention);
    }


	$connection->close();
?>