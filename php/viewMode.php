<?php

	session_start();
	require_once "database_connection.php";
	
	if(!isset($_SESSION['logged_in']))
	{
		header('location: php/logout.php');
		exit();
	}
	
	$mode=$_POST["mode"];
	
		if (isset($_COOKIE["modeType"])) 
		{
			unset($_COOKIE["modeType"]);
			setcookie("modeType", null, -1, '/'); 
			setcookie("modeType", $mode, time() + (86400 * 30), "/");	
		} 
		else
		{
			setcookie("modeType", $mode, time() + (86400 * 30), "/");	
		} 
?>