<?php
session_start();
?>
<html>
	<head>
		<!-- ALL CSS FILES -->
			<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- ALL JAVASCRIPT FILES -->
			
			<script src="js/jquery-3.0.0.min.js"></script>
			<script src="js/jquery.session.js"></script>
			<script src="js/bootstrap.min.js"></script>
		<!-- ALL PHP FUNCTIONS -->
		<?php
			require_once("php/function.php");
			if (isset($_SESSION["user_id"])){
				echo '
					<script>
						$.session.set("user_id", "'.$_SESSION["user_id"].'")
					</script>
				';
				
			}
		?>
	</head>
	
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">Pokemon Game</a>
				<ul class="nav navbar-nav">
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Plecak<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?page=upokemons">Pokemony</a></li>
						<li><a href="index.php?page=uinventory">Ekwipunek</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="index.php?page=upremiumshop">Sklep Premium</a></li>
					</ul>
				</li>
				
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php?page=loginpage">Zaloguj się</a></li>
					<li><a href="index.php?page=registerpage">Załóż nowe konto</a></li>
				</ul>
			</div>
		</nav>
	</body>
</html>

<?php
ob_end_flush();
?>