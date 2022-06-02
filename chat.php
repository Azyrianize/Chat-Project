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
					
					<button type="button" id="button_profile">Profil</button>
					<button type="button" id="button_invitation">Zaproszenia</button>
					<button type="button" id="button_addFriend">Dodaj Znajomego</button>
					<button type="button" id="button_logout">Wyloguj</button>
					
				</div>
			</nav>
			
			<header>
				<p id="pcontent">Twoi znajomi:</p>
			</header>
			
			<section>
				<?php
				
					$sql = "SELECT * FROM friends_added WHERE user_id = '".$_SESSION['user_id']."'";
					$result = mysqli_query($connection, $sql);
					$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
								
					$sql2 = "SELECT * FROM login_details WHERE user_id != '".$_SESSION['user_id']."'";
					$result2 = mysqli_query($connection, $sql2);
					$rows2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
					
					$sql3 = "SELECT * FROM login WHERE user_id != '".$_SESSION['user_id']."'";
					$result3 = mysqli_query($connection, $sql3);
					$rows3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);
					
					
					$output = '
					<table id="friendsTable">
					 <thead>
						 <tr id="friendsColumns">
						  <td>Nazwa użytkownika</td>
						  <td>Status</td>
						  <td>Akcje</td>
						 </tr>
					</thead>
					<tbody>
					';

		
					foreach($rows as $row)
					{
						foreach($rows2 as $row2)
						{
							if($row2['user_id'] == $row['friend_id'])
							{
								$status = '';
								$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 20 second');
								$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
								
								$last_activity = $row2['last_activity'];
								
								if($last_activity > $current_timestamp)
								{
									$status = '<span class="status status-online">Online</span>';
								}
								else
								{
									$status = '<span class="status status-offline">Offline</span>';
								}	
							}
						}
			
						foreach($rows3 as $row3)
						{
							if($row3['user_id'] == $row['friend_id'])
							{
								$output .= '
								 <tr>
								  <td>'.$row3['username'].'</td>
								  <td>'.$status.'</td>
								  <td>
										<button type="submit" class="start_chat" name="'.$row3['user_id'].'" data-touserid="'.$row3['user_id'].'" data-tousername="'.$row3['username'].'">Rozpocznij rozmowę</button>	
										<button type="submit" class="delete_friend" name="'.$row3['user_id'].'" data-touserid="'.$row3['user_id'].'">Usuń</button>												
								  </td>
								 </tr>
								';		
							}
						}
					
					
						
					}
		
					$output .= '</tbody></table>';
					echo $output;				
				?>
			</section>

			<div id="addFriend"></div>
			<div id="showInvitations"></div>		
				
		</div>
		
		<div style="clear:both;"></div>
	
		<footer>
			<div id="footer">
			
				<p>ChatSite.com &copy; 2021. Dziękujemy za wizytę! Wróć jak tylko będziesz mógł aby porozmawiać ze znajomymi!</p>
			
			</div>
		</footer>
		
	</div>



<script src="js/make_addFriend.js"></script>
<script src="js/make_invitation.js"></script>
<script src="js/button_addFriend.js"></script>
<script src="js/button_invitation.js"></script>
<script src="js/button_profile.js"></script>
<script src="js/button_logout.js"></script>
<script src="js/use_language.js"></script>
<script src="js/use_dark_light_mode.js"></script>
<script src="js/update_last_activity.js"></script>
	
<script>
	'use strict';
	
	var from_username = "<?php echo $_SESSION['username']; ?>";
	var from_user_id = "<?php echo $_SESSION['user_id']; ?>";
	
	$(document).ready(function() {  	
		document.getElementById("myName").innerText = from_username;
		document.getElementById("myAvatar").style.backgroundImage = "url('img/user_avatar.png')";
		
	});

	$('.start_chat').click(function(){
		var to_user_id = $(this).data('touserid');
		var to_username = $(this).data('tousername');
		
		sessionStorage.setItem("to_username", to_username);
		sessionStorage.setItem("to_user_id", to_user_id);
		sessionStorage.setItem("from_username", from_username);
		sessionStorage.setItem("from_user_id", from_user_id);
		
		window.location.href = "chat_friend.php";		
	});
	
	
</script>



			
</body>
</html>


