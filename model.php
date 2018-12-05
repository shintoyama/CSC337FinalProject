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
      $stmt = $this->DB->prepare ( "SELECT username, password FROM users where username regexp :userName;" );
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

  public function logCardio($user, $workout, $sets){
    $stmt = $this->DB->prepare ( "INSERT into cardio_log (user_id, cardio_id, workout_count) VALUES (:user, :cardio, :count);" );
    $stmt->bindParam ('user', $user);
    $stmt->bindParam ('cardio', $workout);
    $stmt->bindParam ('count', $sets);
    $stmt->execute ();
  }

  public function logLift($user, $workout, $weight, $sets){
    $stmt = $this->DB->prepare ( "INSERT into lifting_log (user_id, lifting_id, weight, sets) VALUES (:user, :lift, :weight, :count);" );
    $stmt->bindParam ('user', $user);
    $stmt->bindParam ('lift', $workout);
    $stmt->bindParam ('weight', $weight);
    $stmt->bindParam ('count', $sets);
    $stmt->execute ();
  }

}

?>
