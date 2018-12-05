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
<b style="font-size: 1.2em;">Quick Workout</b>
<hr>
<br>
</center>

<center>
<div class="quickWO">
	<table cellspacing="0" width="100%"><tbody>
	<tr>
		<th>Workout</th>
		<th>Duration/Reps</th>
		<th>Scores</th>
		<th>Sets</th>
		<th>Weight</th>
		<th></th>
	</tr>
	<tr>
	<form onsubmit="quicklog(1);return false">
		<td>Run</td>
		<td>20 min</td>
		<td>10</td>
		<td><input type="number" id="qWOset1" placeholder="sets" min="1" max="99" required /></td>
		<td>NA</td>
		<td><input type="submit" class="nbutton" value="Log"/></td>
	</form>
	</tr>
	<tr>
	<form onsubmit="quicklog(2);return false">
		<td>Benchpress</td>
		<td>10 reps</td>
		<td>3</td>
		<td><input type="number" id="qWOset2" placeholder="sets" min="1" max="99" required /></td>
		<td><input type="number" id="qWOweight2" placeholder="weight" min="1" max="9999" required /></td>
		<td><input type="submit" class="nbutton" value="Log"/></td>
	</form>
	</tr>
	<tr>
	<form onsubmit="quicklog(3);return false">
		<td>Push Up</td>
		<td>10 reps</td>
		<td>3</td>
		<td><input type="number" id="qWOset3" placeholder="sets" min="1" max="" required /></td>
		<td><input type="number" id="qWOweight3" placeholder="weight" min="1" max="9999" required /></td>
		<td><input type="submit" class="nbutton" value="Log"/></td>
	</form>
	</tr>
	<tr>
	<form onsubmit="quicklog(4);return false">
		<td>shoulders</td>
		<td>10 reps</td>
		<td>2</td>
		<td><input type="number" id="qWOset4" placeholder="sets" min="1" max="" required /></td>
		<td><input type="number" id="qWOweight4" placeholder="weight" min="1" max="9999" required /></td>
		<td><input type="submit" class="nbutton" value="Log"/></td>
	</form>
	</tr>
	<tr>
	<form onsubmit="quicklog(5);return false">
		<td>Abs</td>
		<td>10 reps</td>
		<td>1</td>
		<td><input type="number" id="qWOset5" placeholder="sets" min="1" max="" required /></td>
		<td><input type="number" id="qWOweight5" placeholder="weight" min="1" max="9999" required /></td>
		<td><input type="submit" class="nbutton" value="Log"/></td>
	</form>
	</tr>
	</tbody></table>
</div>
<br>
</center>

<script type="text/javascript">
	function quicklog(n, type) {
		var idnew = 'qWOset' + n;
		var nofsets = document.getElementById(idnew);
		var ajax = new XMLHttpRequest();
		ajax.open("GET", "controller.php?quickWO=" + n + "&sets=" + nofsets.value, true);
		ajax.send();
		alert('Workout Logged Successfully!');
		nofsets.value = '';
	}
</script>

</body>
</html>
