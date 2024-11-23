
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio Boomix</title>
    <script src="https://unpkg.com/htmx.org@2.0.3"></script>
</head>
<?php
include "./db/database.php";
include "./models/task.php";

$db = new DataBase();
$tasks = new Task($db->connect());
$tasks->offset = isset($_GET['page']) ? $_GET['page']*5 : 0 || 0;
$tasks->limit = 5;
$tasks = $tasks->list();
?>

<body>
    <h1> Lista de tarefas</h1>
    <a href="./create.php">Adicionar tarefa</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Status</th>
                <th>Data Criação</th>
                <th>Data Atualização</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($tasks as $id => $task) {
                    echo "
                    <tr>
                        <td>".($id+1)."</td>
                        <td>$task[title]</td>
                        <td>$task[status]</td>
                        <td>$task[created_at]</td>
                        <td>$task[updated_at]</td>
                        <td>
                            <a href='./edit.php?id=$task[id]'>Editar</a>
                            <button hx-confirm='Você deseja remover a tarefa' hx-target='closest tr' hx-delete='./service/delete.php?id=$task[id]'>Remover</button>
                        </td>
                    </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
    <?php if (isset($_GET['page']) && $_GET['page'] > 0): ?>
        <a href="./index.php?page=<?=($_GET['page']-1)?>">Anterior</a>
        <a href="./index.php?page=<?=($_GET['page']+1)?>">Proximo</a>
    <?php else: ?>
        <a href="./index.php?page=1">Proximo</a>
    <?php endif ?>
    
</body>
</html>