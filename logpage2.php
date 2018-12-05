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
<b style="font-size: 1.2em;">Log Lifting</b>
<hr>
<br>
</center>

<center>
<div class="LogWOL">
<table cellspacing="0" width="100%"><tbody>
	<tr>
		<th width="20%">Name</th>
		<th width="20%">Muscle Group</th>
		<th width="15%">Reps</th>
		<th width="25%">Equipment</th>
		<th width="20%">Sets</th>
	</tr>
	<tr>
		<td>e.g. Benchpress</td>
		<td>chest</td>
		<td>10</td>
		<td>barbels</td>
		<td>5</td>
	</tr>
</tbody></table>
<br>
<form onsubmit="addWorkout();return false">
	<table cellspacing="0" width="100%"><tbody>
		<tr>
			<td width="20%"><input type="text" id="WOLname" placeholder="workout name" required /></td>
			<td width="20%"><input type="text" id="WOLmus" placeholder="muscle" /></td>
			<td width="15%"><input type="number" id="WOLrep" placeholder="reps" step="15" min="1" max="100" required /></td>
			<td width="25%"><input type="text" id="WOLequip" placeholder="equipment"/></td>
			<td width="10%"><input type="number" id="WOLsets" placeholder="sets" size="10%" min="1" max="100" required /></td>
			<td width="10%"><input type="submit" class="nbutton" value="Log"/></td>
		</tr>
	</tbody></table>
</form>
</div>
</center>

<script type="text/javascript">
	function addWorkout() {
		var workoutName = document.getElementById('WOLname');
		var workoutMus = document.getElementById('WOLmus');
		var workoutRep = document.getElementById('WOLrep');
		var workoutEquip = document.getElementById('WOLequip');
		var workoutSets = document.getElementById('WOLsets');
		var ajax = new XMLHttpRequest();
		ajax.open("GET", "controller.php?WOLname=" + workoutName.value + "&WOLmus=" + workoutMus.value + "&WOLrep=" + workoutRep.value + "&WOLequip=" + workoutEquip.value + "&WOLsets=" + workoutSets.value, true);
		ajax.send();
		alert('Workout Logged Successfully!');
		workoutName.value = '';
		workoutMus.value = '';
		workoutRep.value = '';
		workoutEquip.value = '';
		workoutSets.value = '';
	}
</script>

</body>
</html>