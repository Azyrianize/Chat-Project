<?php

	include('php/database_connection.php');
	session_start();
	
	
	if(!isset($_SESSION['logged_in']))
	{
		header('location: php/logout.php');
		exit();
	}
	else
	{
		$sql = "SELECT * FROM login_details WHERE user_id='".$_SESSION['user_id']."'";
		
		if($result = @$connection->query($sql))
		{
			$how_much = $result->num_rows;
			if($how_much>0)
			{
				$row = $result->fetch_assoc();
				$_SESSION['my_last_activity'] = $row['last_activity'];
				
				
				if(isset($_SESSION['first_login']))
				{
					if($_SESSION['first_login'] == true)
					{
						$_SESSION['first_login'] = false;

					}
					else
					{	
						$activity_timestamp = strtotime(date("Y-m-d H:i:s") . '- 15 minutes');
						$activity_timestamp = date('Y-m-d H:i:s', $activity_timestamp);
		
						if($_SESSION['my_last_activity'] < $activity_timestamp)
						{
							echo $_SESSION['my_last_activity'];
							$result->close();
							header('location: php/logout.php');
							exit();
						}
					}
				}				
			}
		}		
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>ChatSite</title>
	<meta name="description" content="A website allowing to view movies and book a ticket for them in our cinema" />

	
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
		
			<nav>
				<div id="menu">
					<div id="myAccount">
						<div id="myAvatar"></div>
						<div id="myName"></div>
						<div id="myDescription">
						
							<?php
								echo $_SESSION['description'];
							?>
							
						</div>
					</div>
					
					<button type="button" id="button_friends">Znajomi</button>
					<button type="button" id="button_invitation">Zaproszenia</button>
					<button type="button" id="button_addFriend">Dodaj Znajomego</button>
					<button type="button" id="button_logout">Wyloguj</button>
					
				</div>
			</nav>
			
			<header>
				<p id="pcontent">Twój profil:</p>
			</header>
			
			<div id="showInvitations"></div>

			<form action="php/updateProfile.php" id="updateProfile" method="post">			
				<input type="text" id="myDescription" name="myDescription" placeholder="Opis użytkownika" onfocus="this.placeholder=''" onblur="this.placeholder='Opis użytkownika'" /><br/>
				<input type="submit" id="button_apply" value="Zapisz">

			</form>			
		
			<?php
				if(isset($_SESSION['error_longDescription']))
				{
					echo $_SESSION['error_longDescription'];
				}
			?>
		
		
		
		</div>

		<div style="clear:both;"></div>

		<footer>
			<div id="footer">
			
				<p>ChatSite.com &copy; 2021. Dziękujemy za wizytę! Wróć jak tylko będziesz mógł aby porozmawiać ze znajomymi!</p>
			
			</div>
		</footer>
		
	</div>


<script src="js/update_last_activity.js"></script>
<script src="js/make_addFriend.js"></script>
<script src="js/make_invitation.js"></script>
<script src="js/button_addFriend.js"></script>
<script src="js/button_friends.js"></script>
<script src="js/button_logout.js"></script>
<script src="js/use_language.js"></script>
<script src="js/use_dark_light_mode.js"></script>

<script>
	'use strict';
	
	var from_username = "<?php echo $_SESSION['username']; ?>";
	var from_user_id = "<?php echo $_SESSION['user_id']; ?>";
	
	$(document).ready(function() {  	
		document.getElementById("myName").innerText = from_username;
		document.getElementById("myAvatar").style.backgroundImage = "url('img/user_avatar.png')";
		
		
	});

</script>



			
</body>
</html>


