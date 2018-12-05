<?php
//CSC337 Final Project
//Ben Lazarines
//Shin Toyama
//12/05/2018

class DataBaseAdaptor {
    private $DB;

    public function __construct() {
        $dataBase = 'mysql:dbname=css337FinalProject; charset=utf8; host=127.0.0.1';
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
      $stmt->bindParam ('userName', $user)
      $stmt->execute ();
      return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }

  public function submitUser($user, $pass)
{
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $stmt = $this->DB->prepare ( "INSERT into users (username, password, score) VALUES (:userName, :password, :score);" );
    $stmt->bindParam ('userName', $user);
    $stmt->bindParam ('password', $hash);
    $stmt->bindParam ('score', 0);
    $stmt->execute ();
    return "Account successfully added";
}

}

?>
