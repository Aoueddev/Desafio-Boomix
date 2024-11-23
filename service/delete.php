<?php
include "../db/database.php";
include "../models/task.php";

if($_SERVER['REQUEST_METHOD'] == "DELETE"){ //Verifica o tipo da requisicao
  if(isset($_GET['id'])){ //Verifica se o parametro titulo foi setado
    try {
      $db = new DataBase();
      $tasks = new Task($db->connect());
      $tasks->id = $_GET['id'];
      $tasks->delete();
    } catch (Exception $e) {
      echo $e;
    }
  }
}
