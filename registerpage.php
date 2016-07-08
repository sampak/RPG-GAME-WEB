<html>
	<head>
	</head>
	<body>
		<div id="registerpage">
		<div id="errorCode" style="display:none" class="alert alert-danger" role="alert">...</div>
		<h1><center>Załóż nowe konto</center></h1>
			<?php
				createInputWithName("text","Login:","Minimalnie 3 znaki maksymalnie 33","login","login", true);
				createInputWithName("email","E-Mail:","Będzie potrzebny do aktywacji konta","email","email", true);
				createInputWithName("password","Hasło:","Minimalnie 6 znaków maksymalnie 33","password","password", true);
				createInputWithName("password","Ponownie hasło:","Wpisz ponownie hasło","repeatpassword","repeatpassword", true);
			?>
				<input type="checkbox" id="rulesAccept" aria-label="csa"> Akceptje <a href="index.php?page=rules">regulamin</a>
				<center>
					<div id="buttonIR"><input type="submit" id="registerButton" class="btn btn-primary" value="Załóż konto" /></div>
				</center>
				<br />
				Posiadasz już konto? <a href="index.php?page=login">zaloguj się!</a>
		
		</div>
	</body>
</html>