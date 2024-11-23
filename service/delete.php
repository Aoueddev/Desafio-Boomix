<?php
include "../db/database.php";
include "../models/task.php";

if($_SERVER['REQUEST_METHOD'] == "DELETE"){
  if(isset($_GET['id'])){
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
