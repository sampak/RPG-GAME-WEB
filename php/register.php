<?php
//ERROR CODE
//01 - Brak argumantów login, password, repassword, email
//02 - password oraz repassword nie są takie same


require_once("function.php");
$login = vtxt($_POST["login"]);
$password = vtxt($_POST["password"]);
$repassword = vtxt($_POST["repassword"]);
$email = vtxt($_POST["email"]);

if(!isset($login) or !isset($password) or !isset($repassword) or !isset($email)){ echo "01"; die(); }
if($login == "" or $password == "" or $repassword == "" or $email == ""){ echo "01"; die(); }
if($password != $repassword){ echo "02"; die(); }
$token = genereateToken(8);
$active_token = genereateToken(10);
$password = buildHash($password, $token);
list($query, $rek) = dbQuery("SELECT * FROM users WHERE login='$login'");
if(isset($rek)){ echo "03"; die(); }
list($query, $rek) = dbQuery("SELECT * FROM users WHERE email='$email'");
if(isset($rek)){ echo "04"; die(); }
$msg = "Aktywacja konta na serwisie game.pl http://localhost/active.php?login=".$login."&token=".$active_token." Kliknij tutaj aby aktywować konto";
$sended = sendEmail("Aktywacja konta w serwisie game.pl", $msg, $email, $login);
echo "done";
?>
