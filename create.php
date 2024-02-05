<?php 
        $server_name="localhost";
        $user_name = "root";
        $password = "";
        $database_name="todolist";
        $conn = mysqli_connect($server_name,$user_name,$password,$database_name);
        if(isset($_POST["submit_btn"])){
            $title =  $_POST["title"];
            $desc = $_POST["description"];
            $sql = "insert into todo(title,description) value('$title','$desc')";
            $result=mysqli_query($conn,$sql);
        }
        mysqli_close($conn);
        header("location: http://localhost/phptodolist/index.php");
