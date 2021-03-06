<!--
CSC337 Final Project,
Ben Lazarines
Shin Toyama
12/05/2018
-->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>WST</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" href="style.css" />
<?php
session_start();
?>
</head>
<body>

<div class="grid-container">

<div class="header">
	<a onclick="Changeiframe('leaderboard.php')">
	<h1> <span style="color: #FF4460;"><i class="fas fa-dumbbell"></i></span> Workout Scheduler and Tracker</h1>
	</a>
	<div id="sibut" onclick="siform()">
		Sign In
	</div>
	<div id="siform" style="display: none;">
		<form onsubmit="signIn();return false">
			<div class="siuLeft">
				Username: <br>
				Password: <br>
			</div>
			<div class="siuRight">
				<input type="text" id="signinUNinput" required /><br>
				<input type="text" id="signinPWinput" required /><br>
			</div>
			<input type="submit" value="Sign In" />
		</form>
	</div>
	<div id="subut" onclick="suform()">
		Sign Up
	</div>
	<div id="suform" style="display: none;">
		<form onsubmit="signUp();return false">
			<div class="siuLeft">
				Username: <br>
				Password: <br>
			</div>
			<div class="siuRight">
				<input type="text" id="signupUNinput" required /><br>
<<<<<<< HEAD
				<input type="text" id="signupPWinput" required /><br>
||||||| merged common ancestors
				<input type="text" id="signupPWinput" pattern="^(?=.{8,20}$)" required /><br>
=======
				<input type="text" id="signupPWinput" pattern="^.{8,20}$" required /><br>
>>>>>>> 459c74867e7b0aef7ea7cbda2938a90b19191633
			</div>
			<input type="submit" value="Sign Up" />
		</form>
	</div>
	<div id="usernamedisplay" style="display: none">Hello, <span id="showusername" style="color: #FF4460;"></span></div>

</div>


<div class="sidemenu">
	<center><h2>MENU</h2></center>
	<ul>
		<li><a onclick="Changeiframe('sgst.php')">Home</a></li>
		<li><a onclick="Changeiframe('leaderboard.php')">Leaderboard</a></li>
		<li><a onclick="Changeiframe('logpage.php')">Log Cardio</a></li>
		<li><a onclick="Changeiframe('logpage2.php')">Log Lifting</a></li>
		<li><a onclick="Changeiframe('myaccount.php')">My Account</a></li>
	</ul>
</div>

<div class="mainContent">
	<iframe id="mainWrap" src="sgst.php">
	</iframe>
</div>

<footer>
	©︎2018 Workout Scheduler and Tracker
</footer>
</div>

<script type="text/javascript">
	function Changeiframe(url) {
		var element = document.getElementById('mainWrap');
		element.src = url;
	}
	var signinbutton = document.getElementById('sibut');
	var signupbutton = document.getElementById('subut');
	var signinform = document.getElementById('siform');
	var signupform = document.getElementById('suform');
	var showMeAfterLogin = document.getElementById('usernamedisplay');
	var showUsername = document.getElementById('showusername');

		function showWOHistory() { //read database and show the history
			var ajax = new XMLHttpRequest();
			ajax.open("GET", "controller.php?WOHistory=", true);
			ajax.send();
			ajax.onreadystatechange = function () {
		        if (ajax.readyState == 4 && ajax.status == 200) {
		        	var WOHistoryArray = JSON.parse(ajax.responseText);
		            //code to show the history
		        }
		    }
		}

		function showData() { //when the page is loaded
			showWOList();
			showWOHistory();
		}

	function siform() { //show sign-in form
		signinform.style.display = "inline";
		signinbutton.style.display = "none";
		signupbutton.style.display = "none";
	}
	function suform() { //show sign-up form
		signupform.style.display = "inline";
		signinbutton.style.display = "none";
		signupbutton.style.display = "none";
	}
	function signIn() { //check if the user is in database. if yes, let him log in
		var signInUNInput = document.getElementById('signinUNinput');
		var signInPWInput = document.getElementById('signinPWinput');
		var ajax = new XMLHttpRequest();
		ajax.open("GET", "controller.php?signInUN=" + signInUNInput.value + "&signInPW=" + signInPWInput.value, true);
		ajax.send();
		ajax.onreadystatechange = function () {
	        if (ajax.readyState == 4 && ajax.status == 200) {
					//	showUsername.innerHTML = ajax.responseText;
					//	showMeAfterLogin.style.display = "inline";

				//		alert(ajax.responseText);
						if (ajax.responseText == "Success") { //if the user is in database
	        		signinform.style.display = "none";
					var uname = signInUNInput.value; //get the input username
					showUsername.innerHTML = uname;
					showMeAfterLogin.style.display = "inline";
			//		user = signInUNInput.value;
	        	}
	        	else {
	        		signInUNInput.value = '';
	        		signInPWInput.value = '';
	        		alert('Please enter a valid username or password.');
	        	}
	        }
	    }
	}
	function signUp() { //save the username and password into database, and let him log in
		var signUpUNInput = document.getElementById('signupUNinput');
		var signUpPWInput = document.getElementById('signupPWinput');
		var ajax = new XMLHttpRequest();
		ajax.open("GET", "controller.php?signUpUN=" + signUpUNInput.value + "&signUpPW=" + signUpPWInput.value, true);
		ajax.send();
		ajax.onreadystatechange = function () {
	        if (ajax.readyState == 4 && ajax.status == 200) {
					//		showUsername.innerHTML = ajax.responseText;
					//		showMeAfterLogin.style.display = "inline";

			//		alert(ajax.responseText);
						if (ajax.responseText == "success") { //if the input username is unused
	        		signupform.style.display = "none";
					var uname = signUpUNInput.value; //get the input username
					showUsername.innerHTML = uname;
					showMeAfterLogin.style.display = "inline";
	        	}
	        	if (ajax.responseText == "fail") { //if the input username is already used
	        		signUpUNInput.value = '';
	        		signUpPWInput.value = '';
	        		alert('Please use another username');
	        	}
	        }
	    };
	}

</script>

</body>
</html>
