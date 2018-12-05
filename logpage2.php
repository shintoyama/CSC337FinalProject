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
		<th width="15%">Reps</th>
		<th width="10%">Weights</th>
		<th width="10%">Sets</th>
		<th width="10%">Log</th>
	</tr>
	<tr>
	<form onsubmit="addWorkoutL(1)">
		<td>Benchpress</td>
		<td>10</td>
		<td><input type="number" id="WOLweight1" placeholder="weights" min="0" max="50" /></td>
		<td><input type="number" id="WOLsets1" placeholder="sets" size="10%" min="1" max="100" required /></td>
		<td width="10%"><input type="submit" class="nbutton" value="Log"/></td>
	</form>
	</tr>
	<tr>
	<form onsubmit="addWorkoutL(2)">
		<td>Push Up</td>
		<td>10</td>
		<td><input type="number" id="WOLweight2" placeholder="weights" min="0" max="50" /></td>
		<td><input type="number" id="WOLsets2" placeholder="sets" size="10%" min="1" max="100" required /></td>
		<td width="10%"><input type="submit" class="nbutton" value="Log"/></td>
	</tr>
	<tr>
	<form onsubmit="addWorkoutL(3)">
		<td>Shoulder Press</td>
		<td>10</td>
		<td><input type="number" id="WOLweight3" placeholder="weights" min="0" max="50" /></td>
		<td><input type="number" id="WOLsets3" placeholder="sets" size="10%" min="1" max="100" required /></td>
		<td width="10%"><input type="submit" class="nbutton" value="Log"/></td>
	</form>
	</tr>
	<tr>
	<form onsubmit="addWorkoutL(4)">
		<td>Curls</td>
		<td>10</td>
		<td><input type="number" id="WOLweight4" placeholder="weights" min="0" max="50" /></td>
		<td><input type="number" id="WOLsets4" placeholder="sets" size="10%" min="1" max="100" required /></td>
		<td width="10%"><input type="submit" class="nbutton" value="Log"/></td>
	</form>
	</tr>
	<tr>
	<form onsubmit="addWorkoutL(5)">
		<td>Pull Up</td>
		<td>10</td>
		<td><input type="number" id="WOLweight5" placeholder="weights" min="0" max="50" /></td>
		<td><input type="number" id="WOLsets5" placeholder="sets" size="10%" min="1" max="100" required /></td>
		<td width="10%"><input type="submit" class="nbutton" value="Log"/></td>
	</form>
	</tr>
	<tr>
	<form onsubmit="addWorkoutL(6)">
		<td>Crunch</td>
		<td>10</td>
		<td><input type="number" id="WOLweight6" placeholder="weights" min="0" max="50" /></td>
		<td><input type="number" id="WOLsets6" placeholder="sets" size="10%" min="1" max="100" required /></td>
		<td width="10%"><input type="submit" class="nbutton" value="Log"/></td>
	</form>
	</tr>
</tbody></table>
<br>
</div>
</center>

<script type="text/javascript">
	function addWorkout(n) {
		var idSets = 'WOLsets' + n;
		var idWeight = 'WOLweight' + n;
		var nofsets = document.getElementById(idSets);
		var weight = document.getElementById(idWeight);
		ajax.open("GET", "controller.php?quickWO=" + n + "&sets=" + nofsets.value + "&weight=" + weight.value, true);
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