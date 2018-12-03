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
	
<center>
<div class="woGen">
	<center style="font-size: 1.2em;">\ Quick Workouts /</center>
	<hr>
	<form onsubmit="menuGen();return false">
		Duration? <input type="number" id="WOGtime" placeholder="time in min" step="5" min="5" max="180" required /> in min<br>
		Place? <input type="type" id="WOGplace" placeholder="not required" /><br>
		Hardness? <select id="WOGhard" required>
					<option value="">(Select)</option>
					<option value="VL">Very Light</option>
					<option value="LL">Light</option>
					<option value="MM">Moderate</option>
					<option value="HH">Hard</option>
					<option value="VH">Very Hard</option>
				</select><br>
		Rest between workouts? <input type="number" id="WOGrest" placeholder="rest in sec" step="5" min="5" max="180" required /> in sec<br><br>
				<center><input style="font-size: 1.1em;" type="submit" value="Generate a menu" class="nbutton" /></center>
	</form>
<br>
</div>
</center>


</body>
</html>