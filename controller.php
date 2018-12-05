<?php
//CSC337 Final Project
//Ben Lazarines
//Shin Toyama
//12/05/2018

include "model.php";
$theDBA = new DataBaseAdaptor ();

if (isset($_GET['WOList'])) {

}
if (isset($_GET['WOHistory'])) {

}
if (isset($_GET['signInUN'] && $_GET['signInPW'])) {

}
if (isset($_GET['signUpUN'] && $_GET['signUpPW'])) {
	$user = $_GET['signUpUN'];
	$pass = $_GET['signUpPW'];
  $arr = $theDBA->checkUser ( $user );
	$used = 1;

	foreach ($arr as $value){
		if ($user == $value){
			$used = 0;
			alert ($user . "is already being used, please use a different username");
		}
	}
	if ($used == 1){
		$arr = $theDBA->submitUser ( $user, $pass );
		echo($arr);
	}

//  echo json_encode( $arr );


}
if (isset($_GET[''])) {

}

?>
