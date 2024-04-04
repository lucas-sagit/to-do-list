<?php
require_once('database/connexao.php');

$tasks = [];

// $sql = $pdo->query("SELECT * FROM task");
$sql = $pdo->query('SELECT * FROM task ORDER BY id ASC');

if ($sql->rowCount() > 0){
    $tasks = $sql->fetchALL(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/src/imagem/javascript/styles/style.css">
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <title>To do list</title>
</head>
<body>
    <div id="to_do">
        <h1>Lista de tarefas</h1>

        <form action="actions/create.php" method="POST" class="to-do-form">
            <input type="text" name="description" placeholder="Escreva sua tarefa aqui." required>
            <button type="submit" class="form-button">
                <i class="fa-solid fa-plus"></i>
            </button>
        </form>

        <div id="tasks">
        <?php foreach($tasks as $task): ?>
            <div class="task">
                <input 
                    type="checkbox" 
                    name="progress" 
                    class="progress <?= $task['completed'] ? 'done' : ''?>"
                    data-task-id=";<?= $task['id']?>"
                    <?= $task['completed'] ? 'checked' : ''?>
                    >

                <p class="task-description">
                    <?= $task['description'] ?>
                </p>

                <div class="task-actions">
                    <a class="action-button edit-button">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form action="actions/delete.php?id=<?= $task['id']?>" method="POST" class="action-button delete-button">
                        <button type="submit">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>
                </div>

                <form action="actions/update.php" method="POST" class="to-do-form edit-task hidden">
                    <input type="text" class="hidden" name = "id" value="<?=$task['id']?>">
                    <input 
                        type="text" 
                        name="description" 
                        placeholder="Edite sua tarefa aqui." value="<?= $task['description']?>"    
                    >
                    <button type="submit" class="form-button confirm-button">
                        <i class="fa-solid fa-check"></i>
                    </button>
                </form>
            </div>
            <?php endforeach ?>
        </div>
    </div>

    <script src="/src/imagem/javascript/script.js"></script>
</body>
</html>