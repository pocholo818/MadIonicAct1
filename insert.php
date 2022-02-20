<?php
    session_start();

    $pdo = require 'Connection.php';
    $insertuserId = $_SESSION['insertuserId'];

    $sql = 'INSERT INTO todolist(todo, userId) VALUES (:todo, :userId)';

    $statement = $pdo->prepare($sql);

    $todo = [
        'todo' => 'test',
        'userId' => '1',
    ];

    $statement->bindParam(':todo', $todo['todo']);
    $statement->bindParam('userId', $todo['userId']);

    //change the value
    $todo['todo'] = $_POST['insertTodo']; //try?
    $todo['userId'] = $insertuserId; //try?

    // old
    // $todo['todo'] = 'I am the new todo';
    // $todo['userId'] = '2';

    //execute query
    $statement->execute();
    header("Location: index.php");
?>