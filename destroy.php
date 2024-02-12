<?php
    $server_name="localhost";
    $user_name="root";
    $password= "";
    $database_name="todolist";

    $conn = mysqli_connect($server_name,$user_name,$password,$database_name);

    $id=$_GET["id"];
    $sql="delete from todo where id=$id";
    $result = mysqli_query($conn,$sql);

    header("location: http://localhost/phptodolist/index.php");

?>