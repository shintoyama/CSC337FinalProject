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
<body onload="showHistory()">

<center>
<b style="font-size: 1.2em;">My Workout History</b>
<hr>
<br>
</center>

<center>
<div class="woTr">
	<table cellspacing="0" width="100%">
	<tbody>
		<tr>
			<th colspan="5" bgcolor="#ccc">Cardio History</th>
		</tr>
		<tr>
			<td>Name</td>
			<td>Duration</td>
			<td>Equipment</td>
			<td>Score</td>
			<td>Delete</td>
		</tr>
		<div id="historytableC"></div>
	</tbody>
</table>
</div>
</center>

<br><br>

<center>
<div class="woTr">
	<table cellspacing="0" width="100%">
	<tbody>
		<tr>
			<th colspan="6" bgcolor="#ccc">Lifting History</th>
		</tr>
		<tr>
			<td>Name</td>
			<td>Muscle</td>
			<td>Reps</td>
			<td>Equipment</td>
			<td>Score</td>
			<td>Delete</td>
		</tr>
		<div id="historytableL"></div>
	</tbody>
</table>
</div>
</center>

<script type="text/javascript">
	var historyTableC = document.getElementbyId('historytableC');
	var historyTableL = document.getElementbyId('historytableL');
	function showHistory() {
		showHistoryC();
		showHistoryL();
	}
	function showHistoryC() {
		var ajax = new XMLHttpRequest();
		ajax.open("GET", "controller.php?MYAmainC=", true);
		ajax.send();
		ajax.onreadystatechange = function () {
	    	if (ajax.readyState == 4 && ajax.status == 200) {
	    		var historyC = JSON.parse(ajax.responseText); 
	    		for (var i = 0; i < historyC.length; i++) {
	    			historyTableC.innerHTML += '<tr><td>' + historyC[i][0] + '</td><td>' + historyC[i][1] + '</td><td>' + historyC[i][2] + '</td><td>' + historyC[i][3] + '</td><td><i class="fas fa-trash-alt" onclick="deletewoC(i)"></i></td></tr>';
	    		}
	    	}
		};
	}
	function showHistoryL() {
		var ajax = new XMLHttpRequest();
		ajax.open("GET", "controller.php?MYAmainL=", true);
		ajax.send();
		ajax.onreadystatechange = function () {
	    	if (ajax.readyState == 4 && ajax.status == 200) {
	    		var historyL = JSON.parse(ajax.responseText); 
	    		for (var i = 0; i < historyL.length; i++) {
	    			historyTableL.innerHTML += '<tr><td>' + historyL[i][0] + '</td><td>' + historyL[i][1] + '</td><td>' + historyL[i][2] + '</td><td>' + historyL[i][3] + '</td><td>' + historyL[i][4] + '</td><td><i class="fas fa-trash-alt" onclick="deletewoL(i)"></i></td></tr>';
	    		}
	    	}
		};
	}
	function deletewoC(n) { //if the user press 'OK', delete the workout from database
		if (confirm("Are you sure to delete this workout?")) {
			ajax.open("GET", "controller.php?DLTC=" + n, true);
			ajax.send();
			historyTableC.innerHTML = '';
			showHistoryC();
		}
	}
	function deletewoL(n) { //if the user press 'OK', delete the workout from database
		if (confirm("Are you sure to delete this workout?")) {
			ajax.open("GET", "controller.php?DLTL=" + n, true);
			ajax.send();
			historyTableL.innerHTML = '';
			showHistoryC();
		}
	}
</script>

</body>
</html>