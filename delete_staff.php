<?php 
     require_once "web_config/config.php";
    
     $id = $_GET['staff_id'];

     $sql = "DELETE FROM faculty WHERE faculty_id = '$id'";

     $result = mysqli_query($conn, $sql);

     header("location: view_staff.php");

?>