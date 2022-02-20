<?php 
    $pdo = require 'Connection.php';

    $listId = $_POST['deleteList'];
    // echo "listId is ".$listId;

    $sql = "DELETE FROM todolist WHERE listId = :listId";

    $statement = $pdo->prepare($sql);
    $statement->bindParam('listId', $listId);

    if($statement->execute()){
        echo "Deleted!";
        header("Location: index.php");
    }
?>