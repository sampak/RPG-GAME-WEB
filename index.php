<?php
session_start();
?>
<html>
	<head>
		<!-- ALL CSS FILES -->
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/style.css" rel="stylesheet">
		<!-- ALL JAVASCRIPT FILES -->
			
			<script src="js/jquery-3.0.0.min.js"></script>
			<script src="js/jquery.session.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/main.js"></script>
			<script src="js/login_register.js"></script>
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
	<?php menuBar(); ?>
		<?php
		if(isset($_GET["page"])){
			switch($_GET['page']){
				case "registerpage":
					loadLib("registerpage.php");
				break;   
				default:
					loadLib("default.php");
				break;
			}
		} else {
			loadLib("default.php");
		}
		?>
	</body>
</html>

<?php
ob_end_flush();
?>