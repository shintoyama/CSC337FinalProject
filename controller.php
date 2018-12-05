<?php
//CSC337 Final Project
//Ben Lazarine
//Shin Toyama
//12/05/2018

include "model.php";
$theDBA = new DataBaseAdaptor ();
//$currentUser = "";

if (isset($_GET['WOList'])) {

}
if (isset($_GET['WOHistory'])) {

}

if (isset($_GET['quickWO'])) {
	if(!isset($_COOKIE["username"])) {
		echo("You must be logged in to perform this action");
	}
	else{
		$user = $_COOKIE["username"];
		$workout = $_GET['quickWO'];
		$sets = $_GET['sets'];
	// FIGURE OUT HOW TO PULL USER_ID
		if ($workout == 1 || $workout > 7){
			$theDBA->logCardio($user, $workout, $sets);
			echo("success");
		}
	// ADD WEIGHTS FOR LIFT
		else {
			$weight = $_GET['weight'];
			$theDBA->logLift($user, $workout, $weight, $sets);
			echo "success";
		}
	}

}

if (isset($_GET['LBmain'])) {

	$arr = $theDBA->getLB();
	echo(json_encode($arr));

}

if (isset($_GET['signInUN']) && isset($_GET['signInPW'])) {
	$user = $_GET['signInUN'];
	$pass = $_GET['signInPW'];
  $arr = $theDBA->signIn ( htmlspecialchars($user), htmlspecialchars($pass) );
	setcookie("username", $user);
//	$currentUser = $user;
	echo($arr);

}
if (isset($_GET['signUpUN']) && isset($_GET['signUpPW'])) {
	alert();
	$user = $_GET['signUpUN'];
	$pass = $_GET['signUpPW'];
  $arr = $theDBA->checkUser ( htmlspecialchars($user) );

		if ($arr != null){
			echo ("fail");
		}

	else{
		$arr = $theDBA->submitUser ( htmlspecialchars($user), htmlspecialchars($pass) );
		setcookie("username", $user);
		echo("success");
	}

//  echo json_encode( $arr );


}




?>
