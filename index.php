<?php
	include('php/database_connection.php');
	session_start();

	
	if((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==true))
	{
		header('Location: chat.php');
		exit();
	}
	
	if(isset($_SESSION['reg_error_wrongDetails']))
	{
		unset($_SESSION['reg_error_wrongDetails']);
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
				<p id="pcontent">Logowanie</p>
			</header>
			
			<section>
				<div class="signup">	
					<article>
						<form action="php/login.php" id="login" method="post">			
							<input type="text" id="button_login" name="login" placeholder="Nazwa użytkownika" onfocus="this.placeholder=''" onblur="this.placeholder='Login'" /><br/>
							<input type="password" id="button_haslo" name="haslo" placeholder="Hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Hasło'" /><br/>
							<input type="submit" id="button_submit" value="Zaloguj">
							
							<?php
								
									if(isset($_SESSION['error_wrongDetails']))
									{
										echo $_SESSION['error_wrongDetails'];
									}
									
							?>
						</form>
					</article>
					
					<article>
						<div>
							<p class="pheader">Nadal nie posiadasz swojego konta?</p>
							<p>Kliknij poniższy przycisk aby przejść do rejestracji</p>
							
							<form action="registerForm.php">
								<input type="submit" id="button_register" value="Formularz rejestracji">
							</form>
							
							<p class="pheader">Zapomniałeś hasła lub loginu?</p>
							<p>Kliknij poniższy przycisk aby odzyskać dane logowania</p>
							
							<form action="retrievePassForm.php">
								<input type="submit" id="button_retrievePass" value="Odzyskaj hasło">
							</form>
							
						</div>
					</article>
					
				</div>	
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
	
</body>
</html>


