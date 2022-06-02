<?php


	session_start();

	if((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==true))
	{
		header('Location: chat.php');
		exit();
	}
?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<<title>ChatSite</title>
	<meta name="description" content="Srona do chatowania ze znajomymi" />
	<meta name="keywords" content="Chat, Chatting, Online, Friends, Communication, Communicate />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<?php
		if(isset($_COOKIE['modeType']))
		{
			if($_COOKIE['modeType']=="light")
			{
					echo '<link rel="stylesheet" href="css/style.css" type="text/css" />';
			}
			else if($_COOKIE['modeType']=="dark")
			{
					echo '<link rel="stylesheet" href="css/style-dark.css" type="text/css" />';
			}
			
		}
	else
			{
				echo '<link rel="stylesheet" href="css/style.css" type="text/css" />';
			}
	?>
	
	<link rel="stylesheet" href="css/fontello.css" type="text/css">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>
	
</head>


<body>
	
	<div id="optionsMenu">
		<div id="languages">
			<div id="pl"></div>
			<div id="uk"></div>

		</div>
		
		<div id="typeMode">
			<div id="light"><p>LIGHT</p></div>
			<div id="dark"><p>DARK</p></div>
		</div>
	</div>
	
	<div id="container">
	
		<div id="logo">
			 Chatty Chat
		</div>
			
		
	
	
		<div id="content">
		
			<p id="pcontent">Register</p>
			
			
					
		
		</div>
	
		
		<div style="clear:both;"></div>

	</div>
		
	<script src="js/use_language.js"></script>				
	<script src="js/use_dark_light_mode.js"></script>
	
	
</body>
</html>


