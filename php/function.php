<?php
//Graphical Functions

function menuBar(){
	if(!isset($_SESSION["user_id"])){ 
	
	echo '<nav class="navbar navbar-default">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">RPG Game</a>
				<ul class="nav navbar-nav">
				
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php?page=loginpage">Zaloguj się</a></li>
					<li><a href="index.php?page=registerpage">Załóż nowe konto</a></li>
				</ul>
			</div>
		</nav>';
	} else {
		
		list($query, $rek) = DBQuery("SELECT coins FROM users WHERE id='$_SESSION[user_id]'");
		echo '<nav class="navbar navbar-default">
				<div class="container-fluid">
					<a class="navbar-brand" href="index.php">RPG Game</a>
					<ul class="nav navbar-nav">
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Plecak<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="index.php?page=uinventory">Ekwipunek</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="index.php?page=upremiumshop">Sklep Premium</a></li>
						</ul>
					</li>
					
					</ul>
					<ul class="nav navbar-nav navbar-right">
					
						<li id="coinsUsers"><a href="#">Gotówka</a></li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="index.php?page=settings">Ustawienia</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="logout.php">Wyloguj się</a></li>
						  </ul>
						</li>
						
					</ul>
				</div>
			</nav>';
	}	
}

function createInputWithName($type, $firstname, $placeholder, $name, $id, $br){
	echo '<div class="input-group">
				<span class="input-group-addon" id="sizing-addon2">'.$firstname.'</span>
				<input type="'.$type.'" name='.$name.' id='.$id.' class="form-control" placeholder="'.$placeholder.'" aria-describedby="sizing-addon2">
		  </div>';
	if ($br == true){ echo "<br />"; }
	
}

//Other Functions

//Query functions
function DBConnect(){ //Create Handler To Database
	$db = mysqli_connect("localhost", "root", "");
	mysqli_select_db($db, "jackpot");
	return $db;
}

function dbSet($query){ //UPDATE OR INSERT INTO OR DELETE
	$db = DBConnect();
	$query = mysqli_query($db, $query);
}

function DBQuery($query){ // ONLY SELECT
	$db = DBConnect();
	$query = mysqli_query($db, $query);
	if($query == ""){ return array(false, false); }
	$rek = mysqli_fetch_array($query);
return array($query, $rek);
}

function vtxt($string){ //Secure for MYSQL INJECTION
$db = DBConnect();
return trim(mysqli_real_escape_string($db, strip_tags($string)));
}

//ANOTHER FUNCTION

function buildHash($password, $token){ //Genereate Hash from password na salt
$password = vtxt($password);
$password = md5(sha1($password));
$token = md5(sha1($token));
$password = md5(sha1($password.$token));
return $password;
}

function genereateToken($nbLetters){ //Genereate SALT
    $randString="";
    $charUniverse="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    for($i=0; $i<$nbLetters; $i++){
       $randInt=rand(0,61);
        $randChar=$charUniverse[$randInt];
        $randString=$randString.$randChar;
    }
return $randString;
}

function loadLIB($file){ //Include if exists file
if(!file_exists($file)){ exit("<center><h1>ERROR 404</h1></center>"); }
	include($file);
}

?>