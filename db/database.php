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

      // Criação da tabela caso ela não exista
      $createTableSQL = "
        CREATE TABLE IF NOT EXISTS tasks (
          id INT AUTO_INCREMENT PRIMARY KEY,
          title VARCHAR(255) NOT NULL,
          status ENUM('pendente', 'concluída') DEFAULT 'pendente',
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
      ";

      $conn->exec($createTableSQL);

      return $conn;
    } catch (PDOException  $e) {
      echo $e;
    }
  }
}