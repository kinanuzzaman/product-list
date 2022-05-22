<?php

class Dbcon {
  
  public $servername = "localhost";
  public $username = "root";
  public $password = "";
  public $db = "product";

  
  public function connect(){
    try {
      $conn = new PDO("mysql:host=$this->servername;dbname=$this->db", $this->username, $this->password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      // echo "Connected successfully";
      return $conn;
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    
   }
}
$dbc = new Dbcon();
$dbc->connect();

?>