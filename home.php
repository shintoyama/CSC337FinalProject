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
				<input type="text" id="signupPWinput" required /><br>
			</div>
			<input type="submit" value="Sign Up" />
		</form>
	</div>
	<div id="usernamedisplay" style="display: none">Hello, <span id="showusername" style="color: #FF4460;"></span></div>
</a>
</div>


<div class="sidemenu">
	<center><h2>MENU</h2></center>
	<ul>
		<li><a onclick="Changeiframe('sgst.php')">Home</a></li>
		<li><a onclick="Changeiframe('leaderboard.php')">Leaderboard</a></li>
		<li><a onclick="Changeiframe('logpage.php')">Log workout</a></li>
		<li><a onclick="Changeiframe('myaccount.php')">My Account</a></li>
	</ul>
</div>

<div class="mainContent">
	<iframe id="mainWrap"src="sgst.php">
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
</script>

</body>
</html>