<!DOCTYPE HTML>
<html>
    <head>
        <title>Todo</title>
    </head>

    <body>
        <?php 
        $pdo = require 'Connection.php';
        session_start();

        $userId = 2;
        $_SESSION['insertuserId'] = $userId;
        ?>

        <form action="insert.php" method="post">
            <h1>Add Todo</h1>

            <label>Todo: </label>
            <input type="text" name="insertTodo">

            <input type="submit" value="Add"><br><br>
        </form>

        <table>
            <tr>
                <th>Show TodoLists</th>
            </tr>

            <?php 
                $showTodo = "SELECT * FROM todolist WHERE userId=".$userId;

                $statement = $pdo->query($showTodo);

                $lists = $statement->fetchAll(PDO::FETCH_ASSOC);

                if($lists){
                    foreach($lists as $list){

                        echo "<tr>";
                        echo "<td>".$list['todo']."</td>";
                        echo "</tr>";
                    }
                }
                else{
                    echo "<td>No todo yet</td>";
                }
            ?>
        </table><br><br>

        <form action="delete.php" method="post">
            <h1>Delete List</h1>
            <select name="deleteList">
                <?php 
                    if($lists){
                        foreach($lists as $list){
                            echo "<option value=".$list['listId'].">".$list['todo']."</option>";
                        }
                    }
                    else{
                        echo "<option value=''>No todo yet</option>";
                    }
                ?>
            </select><br><br>
            
            <input type="submit" value="Delete"><br><br>
        </form><br><br>

        <form action="update.php" method="post">
            <h1>Update List</h1>
                <select name="updateListChoice">
                    <?php 
                        if($lists){
                            foreach($lists as $list){
                                echo "<option value=".$list['listId'].">".$list['todo']."</option>";
                            }
                        }
                        else{
                            echo "<option value=''>No todo yet</option>";
                        }
                    ?>
                </select><br><br>

                <input type="text" name="updateList"><br><br>

            <input type="submit" value="Update">
        </form>

    </body>
</html>