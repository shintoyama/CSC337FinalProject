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
<b style="font-size: 1.2em;">Log Cardio</b>
<hr>
<br>
</center>
	
<center>
<div class="LogWOC">
<table cellspacing="0" width="100%"><tbody>
	<tr>
		<th width="35%">Name</th>
		<th width="20%">Duration (min)</th>
		<th width="12%">Sets</th>
		<th width="8%">Log</th>
	</tr>
	<tr>
	<form onsubmit="addWorkoutC(1);return false">
		<td>Run</td>
		<td>20 min</td>
		<td><input type="number" id="WOCsets1" placeholder="sets" min="1" max="100" required /></td>
		<td><input type="submit" class="nbutton" value="Log"/></td>
	</form>
	</tr>
	<tr>
	<form onsubmit="addWorkoutC(8);return false">
		<td>Swim</td>
		<td>20 min</td>
		<td><input type="number" id="WOCsets8" placeholder="sets" min="1" max="100" required /></td>
		<td><input type="submit" class="nbutton" value="Log"/></td>
	</form>
	</tr>
	<tr>
	<form onsubmit="addWorkoutC(9);return false">
		<td>Bike</td>
		<td>20 min</td>
		<td><input type="number" id="WOCsets9" placeholder="sets" min="1" max="100" required /></td>
		<td><input type="submit" class="nbutton" value="Log"/></td>
	</form>
	</tr>
	<tr>
	<form onsubmit="addWorkoutC(10);return false">
		<td>Row</td>
		<td>20 min</td>
		<td><input type="number" id="WOCsets10" placeholder="sets" min="1" max="100" required /></td>
		<td><input type="submit" class="nbutton" value="Log"/></td>
	</form>
	</tr>
</tbody></table>
<br>
</div>
</center>
<br><br>

<script type="text/javascript">
	function addWorkout() {
		var workoutName = document.getElementById('WOCname');
		var workoutTime = document.getElementById('WOCtime');
		var workoutEquip = document.getElementById('WOCequip');
		var workoutSets = document.getElementById('WOCsets');
		var ajax = new XMLHttpRequest();
		ajax.open("GET", "controller.php?WOCname=" + workoutName.value + "&WOCtime=" + workoutTime.value + "&WOCequip=" + workoutEquip.value + "&WOCsets=" + workoutSets.value, true);
		ajax.send();
		alert('Workout Logged Successfully!');
		workoutName.value = '';
		workoutTime.value = '';
		workoutEquip.value = '';
		workoutSets.value = '';
	}
	function addWorkoutC(n) {
		var idSets = 'WOCsets' + n;
		var nofsets = document.getElementById(idSets);
		ajax.open("GET", "controller.php?WOClog=" + n + "&sets=" + nofsets.value, true);
		ajax.send();
		ajax.onreadystatechange = function () {
	        if (ajax.readyState == 4 && ajax.status == 200) {
							alert(ajax.responseText);
	        }
	    }
		nofsets.value = '';
	}
</script>

</body>
</html>