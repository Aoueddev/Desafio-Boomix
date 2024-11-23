<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio Boomix </title>
    <script src="https://unpkg.com/htmx.org@2.0.3"></script>
</head>
<?php
  include "./db/database.php";
  include "./models/task.php";

  if(isset($_GET['id'])){ //Verifica se o id da tarefa foi setado no paramentro da url
    $db = new DataBase();
    $task = new Task($db->connect());
    $task->id = $_GET['id'];
    $task = $task->getByID();
  }else{
    header('Location: ./index.php');
    exit();
  }
  
?>
<body>
  <h1> Editar Tarefa</h1>
    
  <form hx-post="./service/update.php" hx-target="this">
    <input required type="hidden" name="id" value="<?= (isset($_GET['id']) ? $_GET['id'] : '') ?>">
    <input required type="text" name="title" placehoder="Titulo da tarefa" value="<?= $task['title'] ?>">
    <select name="status">
      <option <?= ($task['status'] === 'concluída' ?: 'selected') ?> value="pendente">Pendente</option>
      <option <?= ($task['status'] === 'pendente' ?: 'selected') ?> value="concluída">Concluída</option>
    </select>
    <button type="submit">Salvar</button>
  </form>
<br>
  <a href="./index.php">Voltar a Pagina Inicial</a>

</body>
</html>