<?php 
     require_once "web_config/config.php";
    
     $id = $_GET['exam_id'];

     $sql = "DELETE FROM exam WHERE exam_id = '$id'";

     $result = mysqli_query($conn, $sql);

     header("location: view_exam.php");
?>