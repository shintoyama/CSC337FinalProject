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
<div class="woTr">
	<table cellspacing="0" width="100%">
	<tbody>
		<tr>
			<th colspan="5" bgcolor="#ccc">Your Workout History</th>
		</tr>
		<tr>
			<td>Date</td>
			<td>Duration</td>
			<td>Hardness</td>
			<td>Place</td>
			<td></td>
		</tr>
		<tr>
			<td>e.g. 11-20-2018</td>
			<td>30 min</td>
			<td>Very Hard</td>
			<td>Home</td>
			<td><input type="button" onclick="detailShow()" value="Detail" class="nbutton" /></td>
		</tr>
	</tbody>
</table>
</div>
</center>

</body>
</html>