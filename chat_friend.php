<?php
	include('php/database_connection.php');
	session_start();

	if(!isset($_SESSION['logged_in']))
	{
		header('location: php/logout.php');
		exit();
	}
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>ChatSite</title>
	<meta name="description" content="Srona do chatowania ze znajomymi" />

	
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
	
		<header>
			<div id="logo">
				 Chatty Chat
			</div>
		</header>
			
		

		<div id="content">
		
			<header>
				<p id="pcontent">chat friendes</p>
			</header>
			
			<section>
				<div id="chat">

				</div>
	
				<div>
					<textarea id="send_message" placeholder="Napisz wiadomość"></textarea>
					<div id="uploaded_file"></div>
				</div>
				
			</section>
			
			<section>
				<button type="button" id="button_send">Wyślij wiadomość</button>


				<label id="addButton" for="upload">Wybierz plik</label> 
				<input type="file" id="upload" accept="image/*, audio/*, video/*, .jpg, .pdf, .doc">
				<div id="download">
					<button type="button" id="button_downloadTxt">Pobierz [plik TXT]</button>
					<button type="button" id="button_downloadHtml">Pobierz [plik HTML]</button>
					<button type="button" id="button_downloadJson">Pobierz [plik JSON]</button>
				</div>
				<button type="button" id="button_back">Cofnij</button>
			</section>
			
		</div>
	
		
		<div style="clear:both;"></div>

		<footer>
			<div id="footer">
			
				<p>ChatSite.com &copy; 2021. Dziękujemy za wizytę! Wróć jak tylko będziesz mógł aby porozmawiać ze znajomymi!</p>
			
			</div>
		</footer>
	</div>
	
<script src="js/use_language.js"></script>	
<script src="js/use_dark_light_mode.js"></script>
<script src="js/update_last_activity.js"></script>
<script src="js/use_language.js"></script>
<script src="js/getFile.js"></script>
<script src="js/button_send.js"></script>
<script src="js/downloadConv.js"></script>

<script>
	'use strict';
	var get_to_username = sessionStorage.getItem("to_username");
	var get_to_user_id = sessionStorage.getItem("to_user_id");
	var get_from_username = sessionStorage.getItem("from_username");
	var get_from_user_id = sessionStorage.getItem("from_user_id");

	document.getElementById("pcontent").innerText = "Użytkownik: " + get_to_username;

	$(document).ready(function() {      	
		document.getElementById("chat").innerText = "";
		
		if(document.getElementById("upload").value == "")
		{
			document.getElementById("uploaded_file").innerText = "Nie wybrano żadnego pliku";
		}
		
		$.get("php/getMessage.php", 
		{
			from_user_id: get_from_user_id,
			to_user_id: get_to_user_id,
			to_username: get_to_username,
			"file_index": false
		}, 
		function(data){
			$("#chat").html(data);	
			if(window.localStorage.getItem('mode')=== "black")
			{
				objDiv.style.backgroundColor  = "black";
			}
		});
	});
	

	document.getElementById("upload").onchange = function() 
	{
		document.getElementById("uploaded_file").innerText = document.getElementById("upload").value;
	};
	
	addEventListener("keyup", function(event) 
	{
		if (event.keyCode === 13) 
		{
			event.preventDefault();
			document.getElementById("button_send").click();
			document.getElementById("upload").value = "";
			document.getElementById("uploaded_file").innerText = "Nie wybrano żadnego pliku";
		}
	});
	
	
	$('#button_back').click(function(){	
		sessionStorage.clear();
		sessionStorage.removeItem("to_username", get_to_username);
		sessionStorage.removeItem("to_user_id", get_to_user_id);
		window.location.href = "chat.php";
	});	
	
</script>


		
</body>
</html>


