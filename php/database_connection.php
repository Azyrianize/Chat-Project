<?php
	$DB_HOST = "localhost:3307";
	$DB_USERNAME = "root";
	$DB_PASSWORD = '';
	$DB_DATABASE = "chat";
		
	$connection = @new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);	

	$sql = "CREATE TABLE IF NOT EXISTS login (
		user_id INT(11) AUTO_INCREMENT PRIMARY KEY,
		username text NOT NULL,
		password text NOT NULL,
		email text NOT NULL,
		avatar longblob NOT NULL,
		description text NOT NULL
		)";
	
	$connection->query($sql);
	
	$sql = "CREATE TABLE IF NOT EXISTS login_details (
		login_details_id INT(11) AUTO_INCREMENT PRIMARY KEY,
		user_id INT(11) NOT NULL,
		last_activity datetime NOT NULL
		)";
	
	$connection->query($sql);
	
	$sql = "CREATE TABLE IF NOT EXISTS friends (
		id INT(11) AUTO_INCREMENT PRIMARY KEY,
		user_id INT(11) NOT NULL,
		friend_id INT(11) NOT NULL
		)";
	
	$connection->query($sql);
	
	$sql = "CREATE TABLE IF NOT EXISTS friends_added (
		id INT(11) AUTO_INCREMENT PRIMARY KEY,
		user_id INT(11) NOT NULL,
		friend_id INT(11) NOT NULL
		)";
	
	$connection->query($sql);
	
	$sql = "CREATE TABLE IF NOT EXISTS chat_message (
		chat_message_id INT(11) AUTO_INCREMENT PRIMARY KEY,
		to_user_id INT(11) NOT NULL,
		from_user_id INT(11) NOT NULL,
		chat_message text NOT NULL,
		timestamp datetime NOT NULL
		)";
	
	$connection->query($sql);
?>