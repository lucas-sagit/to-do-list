<?php

    require_once('../database/connexao.php');

    $id = $_GET['id'];
    if($id)
    {
        $sql = $pdo->prepare('DELETE FROM task WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();
    
        header('Location: ../index.php');
        exit;
    }
    else{
        header('Location: ../index.php');
        exit;
    }
?>
