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
		<th width="20%">Equipment</th>
		<th width="15%">Sets</th>
		<th width="10%">Delete</th>
	</tr>
	<tr>
		<td>e.g. run</td>
		<td>30</td>
		<td></td>
		<td>2</td>
		<td><i class="fas fa-trash-alt" onclick="deletewo()"></i></td>
	</tr>
</tbody></table>
<br>
<form onsubmit="addWorkout();return false">
	<table cellspacing="0" width="100%"><tbody>
		<tr>
			<td width="35%"><input type="text" id="WOCname" placeholder="workout name" required /></td>
			<td width="20%"><input type="number" id="WOCtime" placeholder="time in min" step="15" min="5" max="360" required /></td>
			<td width="20%"><input type="text" id="WOCequip" placeholder="equipment"/></td>
			<td width="15%"><input type="number" id="WOCsets" placeholder="sets" size="10%" min="1" max="100" required /></td>
			<td width="10%"><input type="submit" class="nbutton" value="Log"/></td>
		</tr>
	</tbody></table>
</form>
</div>
</center>
<br><br>

</body>
</html>