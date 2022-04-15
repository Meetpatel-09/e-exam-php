<?php 
     
     require_once "web_config/config.php";
    
     $id = $_GET['subject_id'];

     $sql = "DELETE FROM subject WHERE s_id = '$id'";

     $result = mysqli_query($conn, $sql);

     header("location: view_subject2.php");
?>