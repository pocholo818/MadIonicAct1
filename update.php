<?php 
    $pdo = require 'Connection.php';

    $data = [
        'listId' => 2,
        'todo' => 'PPPooPoo'
    ];

    $sql = 'UPDATE todolist SET todo=:todo WHERE listId=:listId';

    $statement = $pdo->prepare($sql);
    
    $statement->bindParam(':listId', $data['listId']);
    $statement->bindParam(':todo', $data['todo']);

    //change the value
    $data['todo'] = $_POST['updateList']; //try?
    $data['listId'] = $_POST['updateListChoice']; //try?

    if($statement->execute()){
        echo "Update Success!";
        header("Location: index.php");
    }
    else{
        echo "Update Failed!";
    }
?>