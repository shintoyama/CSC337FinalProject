<?php
//CSC337 Final Project
//Ben Lazarines
//Shin Toyama
//12/05/2018

include "model.php";
$theDBA = new DataBaseAdaptor ();
$currentUser = "";

if (isset($_GET['WOList'])) {

}
if (isset($_GET['WOHistory'])) {

}

if (isset($_GET['quickWO'])) {
	if ($currentUser == ""){
		echo($currentUser . "You must be logged in to perform this action");
	}
	else{
		$workout = $_GET['quickWO'];
		$sets = $_GET['sets'];
	// FIGURE OUT HOW TO PULL USER_ID
		if ($workout == 1){
			$theDBA->logCardio($currentUser, $workout, $sets);
			echo("success");
		}
	// ADD WEIGHTS FOR LIFT
		else {
			$weight = $_GET['weight'];
			$theDBA->logLift($currentUser, $workout, $weight, $sets);
		}
	}

}

if (isset($_GET['signInUN']) && isset($_GET['signInPW'])) {
	$user = $_GET['signInUN'];
	$pass = $_GET['signInPW'];
  $arr = $theDBA->signIn ( $user, $pass );
	$currentUser = $user;
	echo($arr);

}
if (isset($_GET['signUpUN']) && isset($_GET['signUpPW'])) {
	$user = $_GET['signUpUN'];
	$pass = $_GET['signUpPW'];
  $arr = $theDBA->checkUser ( $user );

		if ($arr != null){
			echo ("fail");
		}

	else{
		$arr = $theDBA->submitUser ( $user, $pass );
		echo("success");
	}

//  echo json_encode( $arr );


}
if (isset($_GET[''])) {

}

?>
