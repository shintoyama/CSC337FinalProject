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
<div class="listOfWorkout">
<table cellspacing="0" width="100%"><tbody>
	<tr>
		<th colspan="5" bgcolor="#000">Log Workouts</th>
	</tr>
	<tr>
		<td width="35%">name</td>
		<td width="20%">duration per set (s)</td>
		<td width="20%">hardness</td>
		<td width="15%">place</td>
		<td width="10%">delete</td>
	</tr>
	<tr>
		<td>e.g. Arm Stretch</td>
		<td>30</td>
		<td>Very Light</td>
		<td>Home</td>
		<td><i class="fas fa-trash-alt" onclick="deletewo()"></i></td>
	</tr>
</tbody></table>
<br>
<form onsubmit="addWorkout();return false">
	<table cellspacing="0" width="100%"><tbody>
		<tr>
			<td width="35%"><input type="text" id="WOname" placeholder="workout name" required /></td>
			<td width="20%"><input type="number" id="WOtime" placeholder="time in sec" step="10" min="10" max="360" required /> in sec</td>
			<td width="20%">
				<select id="WOhard" required>
					<option value="">(Select)</option>
					<option value="VL">Very Light</option>
					<option value="LL">Light</option>
					<option value="MM">Moderate</option>
					<option value="HH">Hard</option>
					<option value="VH">Very Hard</option>
				</select>
			</td>
			<td width="15%"><input type="text" id="WOplace" placeholder="place" size="10%" /></td>
			<td width="10%"><input type="submit" class="nbutton" value="Add"/></td>
		</tr>
	</tbody></table>
</form>
</div>
</center>

</body>
</html>