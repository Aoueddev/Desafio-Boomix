<?php
include "../db/database.php";
include "../models/task.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(isset($_POST['id']) || isset($_POST['title']) || isset($_POST['status'])){
    try {
      $db = new DataBase();
      $tasks = new Task($db->connect());
      $tasks->id = $_POST['id'];
      $tasks->title = $_POST['title'];
      $tasks->status = $_POST['status'];
      $tasks->update();
      echo "Tarefa atualizada com sucesso!";
    } catch (Exception $e) {
      echo $e;
    }
  }
}