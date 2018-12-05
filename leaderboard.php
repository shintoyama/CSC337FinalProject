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
<body onload="getrankings()">

<center>
<b style="font-size: 1.2em;">Leaderboard</b>
<hr>
<br>
</center>

<center>
<div class="LBscore">
<table cellspacing="0" width="100%"><tbody>
	<tr>
		<th>User</th>
		<th>Score</th>
	</tr>
	<div id="rankingtable"></div>
</tbody></table>
</div>
</center>

<script type="text/javascript">
	var rankingTable = document.getElementById('rankingtable');
	function getrankings() {
		var ajax = new XMLHttpRequest();
		ajax.open("GET", "controller.php?LBmain=set", true);
		ajax.send();
		ajax.onreadystatechange = function () {
	    	if (ajax.readyState == 4 && ajax.status == 200) {
				//	alert(ajax.responseText);

				var arr = ajax.responseText;
				//	var arr = JSON.parse(ajax.responseText);
				//	alert(arr);
				var str = "";

			//	foreach (arr )

				/*	var str = "";
						for(i = 0; i < arr.length; i++) {
						    /* String firstname = arr[i].first_name;
						    String lastname = arr[i].last_name;
						    var obj = arr[i];
							str += obj."User Name" + " " + obj."Score" + "<br>";
						}*/
						rankingTable.innerHTML = arr;
		}
	}
}
</script>

</body>
</html>
