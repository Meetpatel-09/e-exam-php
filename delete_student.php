<?php 
     require_once "web_config/config.php";
    
     $id = $_GET['student_id'];

     $sql = "DELETE FROM student WHERE student_id = '$id'";

     $result = mysqli_query($conn, $sql);

     header("location: view_student2.php");
?>