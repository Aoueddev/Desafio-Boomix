<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio Boomix </title>
    <script src="https://unpkg.com/htmx.org@2.0.3"></script>
</head>
<body>
  <h1> Criar Tarefa</h1>
    
  <form hx-post="./service/add.php" hx-target="this">
    <input required type="text" name="title" placehoder="Titulo da tarefa">
    <button type="submit">Salvar</button>
  </form>
  <br>
  <a href="./index.php">Voltar a Pagina Inicial</a>

</body>
</html>