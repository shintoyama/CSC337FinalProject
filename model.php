<?php
//CSC337 Final Project
//Ben Lazarines
//Shin Toyama
//12/05/2018

class DataBaseAdaptor {
    private $DB;

    public function __construct() {
        $dataBase = 'mysql:dbname=css337Project; charset=utf8; host=127.0.0.1';
        $user = 'root';
        $password = 'texes101';
    try {
      $this->DB = new PDO ( $dataBase, $user, $password );
      $this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch ( PDOException $e ) {
      echo ('Error establishing Connection');
      exit ();
    }
    }

    public function checkUser($user)
  {
      $stmt = $this->DB->prepare ( "SELECT username, password FROM users where username like :userName;" );
      $stmt->bindParam ('userName', $user);
      $stmt->execute();
      return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }

  public function submitUser($user, $pass)
{
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $score = 0;
    $stmt = $this->DB->prepare ( "INSERT into users (username, password, score) VALUES (:userName, :password, :score);" );
    $stmt->bindParam ('userName', $user);
    $stmt->bindParam ('password', $hash);
    $stmt->bindParam ('score', $score);
    $stmt->execute ();
    return "Account successfully added";
}

  public function signIn($user, $pass){

      $stmt = $this->DB->prepare ("SELECT username, password FROM users where username regexp :userName;");
      $stmt->bindParam ('userName', $user);
      $stmt->execute();
      $arr = $stmt->fetchAll ( );

      if ($arr == null){
        return "This account does not exist";
      }
      else {
    //    print_r($arr[0][1]);
        $hash = $arr[0][1];
        if (password_verify($pass, $hash)){
          return "Success";
        }
        else {
          return "Invalid password";
        }

      }

  }

  public function getLB(){

    $stmt = $this->DB->prepare ( "select u.username as 'User Name', sum(cl.score) + sum(ll.score)
      as 'Score' from users u join cardio_log cl on (u.username = cl.username) join lifting_log ll
      on (u.username = ll.username) group by u.username;" );
    $stmt->execute ();
    return $stmt->fetchAll ( PDO::FETCH_ASSOC );

  }

  public function logCardio($user, $workout, $sets){
    if ($workout == 1) $workout = "Run";
    else if ($workout == 8) $workout = "Swim";
    else if ($workout == 9) $workout = "Bike";
    else $workout = "Row";

    $duration = 20;
    $score = 10 * $sets;

    $stmt = $this->DB->prepare ( "INSERT into cardio_log (username, cardio_name, workout_count, duration, score) VALUES (:user, :cardio, :count, :duration, :score);" );
    $stmt->bindParam ('user', $user);
    $stmt->bindParam ('cardio', $workout);
    $stmt->bindParam ('count', $sets);
    $stmt->bindParam ('duration', $duration);
    $stmt->bindParam ('score', $score);
    $stmt->execute ();
  }

  public function logLift($user, $workout, $weight, $sets){
    $muscle = "";
    if ($workout == 2) $workout = "Bench Press";
    else if ($workout == 3) $workout = "Push Ups";
    else if ($workout == 4) $workout = "Shoulder Press";
    else if ($workout == 5) $workout = "Crunches";
    else if ($workout == 6) $workout = "Curls";
    else if ($workout == 7) $workout = "Pull Ups";



    if ($workout == "Bench Press" || $workout == "Push Ups") $muscle = "Chest";
    else if ($workout == "Shoulder Press") $muscle = "Shoulders";
    else if ($workout == "Curls" || $workout == "Pull Ups") $muscle = "Arms";
    else $muscle = "Core";

    $reps = 10;
    $score = 5 * $sets;

    $stmt = $this->DB->prepare ( "INSERT into lifting_log (username, lifting_name, muscle_group, reps, weight, sets, score) VALUES (:user, :lift, :muscle, :reps, :weight, :count, :score);" );
    $stmt->bindParam ('user', $user);
    $stmt->bindParam ('lift', $workout);
    $stmt->bindParam ('muscle', $muscle);
    $stmt->bindParam ('reps', $reps);
    $stmt->bindParam ('weight', $weight);
    $stmt->bindParam ('count', $sets);
    $stmt->bindParam ('score', $score);
    $stmt->execute ();
  }

}

?>
