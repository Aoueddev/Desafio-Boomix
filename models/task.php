<?php
class Task{
  public $id;
  public $title;
  public $status;
  public $create_at;
  public $updated_at;

  public $offset = 0; 
  public $limit = 5; 

  private $conn; //Recebe a instancia da conexão com banco de dados;
  
  function __construct($conn){
    //Instancia do banco de dados
    $this->conn = $conn;
  }

  function add(){
    //Adicionar nova tarefa
    $query = "INSERT INTO tasks (title) VALUES (:title)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":title", $this->title);
    $stmt->execute();
  }

  function getByID(){
    //Pegar uma tarefa pelo id
    $query = "SELECT * FROM tasks WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $this->id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  function update(){
    //Atualizar uma tarefa
    $query = "UPDATE tasks SET title = :title, status = :status WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":status", $this->status);
    $stmt->execute();
  }

  function delete(){
    //Remover uma tarefa
    $query = "DELETE FROM tasks WHERE id = :id";
    $stmt= $this->conn->prepare($query);
    $stmt->bindParam(":id", $this->id);
    $stmt->execute();
  }

  function list(){
    //Listar as tarefa
    $query = "SELECT * FROM tasks ORDER BY id ASC LIMIT :limit OFFSET :offset";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":limit", $this->limit, PDO::PARAM_INT);
    $stmt->bindParam(":offset", $this->offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
    
}