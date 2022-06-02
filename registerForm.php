<?php
	
	session_start();
	
	if(isset($_SESSION['error_wrongDetails']))
	{
		unset($_SESSION['error_wrongDetails']);
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
				<p id="pcontent">Rejestracja</p>
			</header>
			
			<section>
				<div class="signup">			
					<form action="php/register.php" id="register" method="post">			
						
						<input type="text" name="login" placeholder="Login" onfocus="this.placeholder=''" onblur="this.placeholder='Login'" /><br/>
						<input type="password" name="haslo" placeholder="Hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Hasło'" /><br/>
						<input type="text" name="email" placeholder="Email" onfocus="this.placeholder=''" onblur="this.placeholder='Email'" /><br/>
						<input type="text" name="repeatemail" placeholder="Powtórz email" onfocus="this.placeholder=''" onblur="this.placeholder='Powtórz email'" /><br/>
						<input type="submit" class="button input" value="Stwórz konto" />
					</form>
				
					<?php
			
						if(isset($_SESSION['reg_error_wrongDetails']))
						{
							echo $_SESSION['reg_error_wrongDetails'];
						}
					?>
			
					<form action="index.php" id="moveLogin">
						<input type="submit" value="Logowanie"></button>
					</form>
							
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
	<script src="js/use_language.js"></script>	
</body>









</html>


