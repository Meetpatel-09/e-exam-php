<?php

$title = "Home";
require_once "web_config/config.php";
include('master_page/header.php');

function function_alert($message)
{
     // Display the alert box 
     echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

if (isset($_SESSION['success'])) {

     function_alert("Exam submited Successfully");

     $marks = $_SESSION['marks'];
     $subject1 = $_SESSION['subject'];
     $date = $_SESSION['date'];
     $email = $_SESSION['student_email'];
     $total_marks = $_SESSION['totalMarks'];

     $to_email = $email;
     $subject = "Exam Result";
     $body = "Hello, You have scored $marks marks out of $total_marks in $subject1 on $date";
     $headers = "From: group7915@gmail.com";

     $isSent = "non";
     if (mail($to_email, $subject, $body, $headers)) {
          $isSent = "true";
     } else {
          $isSent = "false";
     }
     unset($_SESSION['success']);
}

$branch = $_SESSION['branch'];
$semester = $_SESSION['semester'];
$in;

if (isset($_POST['submit'])) {

     date_default_timezone_set('Asia/Kolkata');
     $current_time = date('H:i');
     $date = date('Y-m-d');

     $_SESSION['date'] = $date;

     $sql1 = mysqli_query($conn, "SELECT * FROM exam WHERE branch = '$branch'  AND semester='$semester' AND date='$date'");
     while ($row = mysqli_fetch_array($sql1)) {
          $totalMarks = $row['out_of_makes'];
          $startTime = $row['start_time'];
          $endTime = $row['end_time'];

          $sql2 = mysqli_query($conn, "SELECT * FROM mcq_bank WHERE branch = '$branch'  AND semester='$semester' AND is_approved='1'");
          while ($row1 = mysqli_fetch_array($sql2)) {
               $mcq_bank_id = $row1['mcq_bank_id'];
          }

          if ($current_time < $startTime) {
               function_alert("Please try again at $startTime");
          } else if ($current_time > $endTime) {
               function_alert("Exam ended at $endTime");
          } else {
               header("location: mcq_question_bank.php?totalMarks=$totalMarks&mcq_bank_id=$mcq_bank_id&end_time=$endTime");
          }
     }
}

?>

<div style="padding:15px;">
     <div style="margin-top: 15px;">
          <h3 style="text-align: center">Welcome</h3>
     </div>
     <form action="" method="post">
          <div class="row row-cols-1 row-cols-md-2 g-4" style="margin-top: 15px;">
               <div class="col-md-3 text-center" style="padding:15px;">
               </div>
               <div class="col-md-3 text-center" style="padding:15px;">
                    <div class="card">
                         <img src="images/mcq.jpg" class="card-img-top" alt="...">
                         <div class="card-body">
                              <button type="submit" name="submit" href="add_mcq_bank1.php" class="btn btn-primary">Go To Exam</a>
                         </div>
                    </div>
               </div>
               <div class="col-md-3 text-center" style="padding:15px;">
                    <div class="card">
                         <img src="images/student-attendance-icon-2.jpg" class="card-img-top" alt="...">
                         <div class="card-body">
                              <a href="view_result_s.php" class="btn btn-primary">View Results</a>
                         </div>
                    </div>
               </div>
          </div>
     </form>
</div>

<?php
include('master_page/footer.php');
?>