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
if (isset($_GET['signInUN']) && isset($_GET['signInPW'])) {
	$user = $_GET['signInUN'];
	$pass = $_GET['signInPW'];
  $arr = $theDBA->signIn ( $user, $pass );
	echo($arr);

}
if (isset($_GET['signUpUN']) && isset($_GET['signUpPW'])) {
	$user = $_GET['signUpUN'];
	$pass = $_GET['signUpPW'];
  $arr = $theDBA->checkUser ( $user );

		if ($arr != null){
			echo ("'" . $user . "' is already being used, please use a different username");
		}

	else{
		$arr = $theDBA->submitUser ( $user, $pass );
		echo($arr);
	}

//  echo json_encode( $arr );


}
if (isset($_GET[''])) {

}

?>
