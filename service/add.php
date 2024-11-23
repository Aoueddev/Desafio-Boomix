<?php
include "../db/database.php";
include "../models/task.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(isset($_POST['title'])){
    try {
      $db = new DataBase();
      $tasks = new Task($db->connect());
      $tasks->title = $_POST['title'];
      $tasks->add();
      echo "Tarefa adicionada com sucesso!";
    } catch (Exception $e) {
      echo $e;
    }
  }
}