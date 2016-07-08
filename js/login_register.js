//CONFIG
var gifR = "<img style='width:150px; height:150px;' src='img/hex-loader2.gif' />";
 var buttonR = '<input type="submit" id="registerButton" class="btn btn-primary" value="Załóż konto" />'; 

$("body").ready(function(){
	$("#buttonIR").click(function(){
		var status = checkAttr("#registerButton", "id", "registerButton");
		if(status == false){ return }
		var login = document.getElementById("login").value;
		var password = document.getElementById("password").value;
		var repassword = document.getElementById("password2").value;
		var email = document.getElementById("email").value;
		checkIcon(gifR, true, "#buttonIR");
	if(login.length == 0){ showInformation("danger", "Aby założyć konto musisz podać swoją unikalną nazwe użytkownika"); checkIcon(buttonR, false, "#buttonIR"); return }
		if(login.length < 2){ showInformation("danger", "Login musi się składać przynajmniej z dwóch znaków"); checkIcon(buttonR, false, "#buttonIR"); return }
		if(password.length < 6){ showInformation("danger", "Hasło musi się składać z minimum 6 znaków"); checkIcon(buttonR, false, "#buttonIR"); return }
		if(password.length == 0){ showInformation("danger", "Aby założyć konto musisz podać swoje hasło którym będziesz się logował się"); checkIcon(buttonR, false, "#buttonIR"); return }
		if(repassword.length == 0){ showInformation("danger", "Wpisz ponownie hasło w celu weryfikacji podania właściwego hasła za pierwszym razem"); checkIcon(buttonR, false, "#buttonIR"); return }
		if(email.length == 0){ showInformation("danger", "Podaj swój obecny adres E-Mail będzie potrzebny do aktywacji konta"); checkIcon(buttonR, false, "#buttonIR"); return }
		if($("#rulesAccept").is(":checked") == false){ showInformation("danger", "Aby założyć konto na naszej stronie musisz zaakceptować regulamin"); checkIcon(buttonR, false, "#buttonIR"); return }
		if(password != repassword){ showInformation("danger", "Podane hasła nie są identyczne"); checkIcon(buttonR, false, "#buttonIR"); return }	 
		$.ajax({
            url: "php/register.php",
            dataType: 'text',
            type: 'POST',
            data: {
            login: login,
			password: password,
			repassword: repassword,
			email: email
            },
			success: function(msg) {
				// alert(msg);
				if(msg == "01"){ //Missed Argumets login, password, repassword, email
					showInformation("danger", "Wystąpił błąd! nie znaleziono argumetów spróbuj ponownie za minute.");
					checkIcon(buttonR, false, "#buttonIR");
					return
				}
				
				else if(msg == "02"){ 
					showInformation("danger", "Podane hasła nie są identyczne");
					checkIcon(buttonR, false, "#buttonIR");
					return
				}

				else if(msg == "03"){
					showInformation("danger", "Konto o podanym loginie już istnieje!");
					checkIcon(buttonR, false, "#buttonIR");
					return
				}
				
				else if(msg == "04"){
					showInformation("danger", "Adres E-Mail jest już używany przez inne konto");
					checkIcon(buttonR, false, "#buttonIR");
					return
				}
				
				else if(msg == "done"){
					showInformation("success", "Konto zostało pomyślnie założone w celu aktywacji konta wejdź na swojego maila");
					checkIcon(buttonR, false, "#buttonIR");
					return
				} else {
					showInformation("danger", "Upss... nie mogłem skontaktować się z plikiem skontaktuj się z administracją");
				}
			}
		});
	});
//Settings restart password
	// $("#ChangePasswordSettings").click(function(){
		// var oldpassword = document.getElementById("oldpassword").value;
		// var newpassword = document.getElementById("newpassword").value;
		// var renewpassword = document.getElementById("renewpassword").value;
		// if(oldpassword.length == 0){ showInformation("danger", "Wpisz swoje obecne hasło"); return }
		// if(newpassword.length == 0){ showInformation("danger", "Wpisz nowe hasło"); return }
		// if(renewpassword.length == 0){ showInformation("danger", "Wpisz ponownie hasło w celu weryfikacji podania właściwego hasła za pierwszym razem"); return }
		// if(newpassword.length < 6){ showInformation("danger", "Hasło musi się składać z minimum 6 znaków"); return }
		// if(newpassword != renewpassword){ showInformation("danger", "Podane hasła nie są identyczne"); return }
		// if(newpassword == oldpassword){ showInformation("danger", "Nowe hasło nie może być takie same jak stare"); return }
		// $.ajax({
			// url: "repassword.php",
			// dataType: 'text',
			// type: 'POST',
			// data: {
			// type: "password",
			// id: $.session.get('user_id'),
			// oldpassword: oldpassword,
			// newpassword: newpassword,
			// },
			// success: function(msg) {
				// alert(msg);
				// if(msg == "01"){
					// showInformation("danger", "Nie znalazłem twojego identyfikatora zaloguj się ponownie");
					// return
				// }		

				// if(msg == "02"){
					// showInformation("danger", "Podane obecne hasło nie zgadza się z obecnym hasłem");
					// return
				// }			
				// if(msg == 3){
					// showInformation("success", "Twoje hasło zostało zmienione");
					// return
				// }
				
			// }
		// });
	// });

//End script	
});