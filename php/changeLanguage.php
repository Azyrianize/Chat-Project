<?php

	session_start();
	require_once "database_connection.php";
	
	$lang=$_POST["language"];
	if (isset($_SESSION['error_wrongDetails'])) 
	{
		unset($_SESSION['error_wrongDetails']);		
	}
	
	if (isset($_SESSION['reg_error_wrongDetails'])) 
	{
		unset($_SESSION['reg_error_wrongDetails']);		
	}

	if (isset($_COOKIE["language"])) 
	{
		unset($_COOKIE["language"]);
		setcookie("language", null, -1, '/'); 
		setcookie("language", $lang, time() + (86400 * 30), "/");	
	} 
	else
	{
		setcookie("language", $lang, time() + (86400 * 30), "/");	
	} 
	
	
?>