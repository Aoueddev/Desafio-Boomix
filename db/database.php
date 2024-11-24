<?php
class DataBase{
  public $host; 
  public $dbname; 
  public $user; 
  public $port;
  public $password;

  function __construct(){
    // Dados para conexão com banco de dados
    $this->dbname = "todolist";
    $this->host = "localhost";
    $this->port = "3360";
    $this->user = "root";
    $this->password = "";    
  }
  
  function connect(){
    // Estabelecer conexão com banco de dados
    try {
      $conn = new PDO("mysql:host=localhost;dbname=$this->dbname;port=$this->port",$this->user ,$this->password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    } catch (PDOException  $e) {
      echo $e;
    }
  }
}