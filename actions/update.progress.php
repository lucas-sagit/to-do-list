<?php

    require_once('../connexao.php');

    $id =filter_input(INPUT_POST, 'id');
    $completed = filter_input(INPUT_POST, 'completed');

    if ($id && $completed){
        $sql = $pdo->prepare("UPDATE task SET completed = :completed WHERE id = :id");
        $sql ->bindValue(':id', $id);
        $sql->execute();
        echo json_encode(['success'=>false]);
        exit;
        echo json_encode(['error'=>true]);
        exit;
    }
?>

