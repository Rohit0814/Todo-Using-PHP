<?php
    $id=$_POST["hiddenId"];
    $title=$_POST["title"];
    $desc=$_POST["description"];

    $server_name="localhost";
    $user_name="root";
    $password= "";
    $database_name="todolist";

    $conn = mysqli_connect($server_name,$user_name,$password,$database_name);

    $sql="update todo set title='$title', description='$desc' where id=$id";

    $result = mysqli_query($conn,$sql);

    mysqli_close($conn);
    header("location: http://localhost/phptodolist/index.php");
    
?>