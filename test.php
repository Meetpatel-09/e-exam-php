<?php
// date_default_timezone_set('Asia/Kolkata');
// echo $current_time = date('H:i');
// echo $date = date('Y-m-d');

require_once "web_config/config.php";

function function_alert($message)
{
     echo "<script>alert('$message');</script>";
}
 
date_default_timezone_set('Asia/Kolkata');
$current_time = date('H:i');
$date = date('Y-m-d');

$sql1 = mysqli_query($conn, "SELECT * FROM exam WHERE branch = 'BCA'  AND semester='6' AND date='$date'");
while ($row = mysqli_fetch_array($sql1)) {
     $totalMarks = $row['out_of_makes'];
     $startTime = $row['start_time'];
     $endTime = $row['end_time'];

     if ($current_time < $startTime) {
          function_alert("Please try again at $startTime");
     } else if ($current_time > $endTime) {
          function_alert("Exam ended at $endTime");
     } else {
          echo "dj";
     }
}
?>