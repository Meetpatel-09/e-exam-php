<?php

$title = "Exam";

ob_start();
require_once "web_config/config.php";

$mcqBankId = $_GET['mcq_bank_id'];
$totalMarks = $_GET['totalMarks'];
$endTime = $_GET['end_time'];

include('master_page/header.php');

function function_alert($message) {
     // Display the alert box 
     echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

if (isset($_SESSION['added'])) {
     function_alert("MCQ added successfuly.");
     unset($_SESSION['added']);
}

$date = $_SESSION['date'];
$name = $_SESSION['name'];
$roll_no = $_SESSION['roll_no'];

$sql1 = mysqli_query($conn, "SELECT * FROM mcq_bank WHERE mcq_bank_id = '$mcqBankId'");
while ($row4 = mysqli_fetch_array($sql1)) {
     $branch = $row4['branch'];
     $semester = $row4['semester'];
     $subject = $row4['subject'];
}


if (isset($_POST['submit'])) {

     date_default_timezone_set('Asia/Kolkata');
     $current_time = date('H:i');

     if ($endTime < $current_time) {
          function_alert("Exam Time Out!!!");
     } else {

          $indexOne = 0;
          $marks = 0;

          $sql2 = mysqli_query($conn, "SELECT * FROM mcq_bank_questions WHERE mcq_bank_id = '$mcqBankId' ORDER BY mcq_id");
          while ($row2 = mysqli_fetch_array($sql2)) {
               $indexOne++;
               if (isset($_POST['question' . $indexOne])) {

                    if ($_POST['question' . $indexOne] == $row2['correct_answer']) {
                         $marks++;
                    }
               }
          }

          $query = "INSERT INTO results(name, roll_no, branch, semester, subject, date, marks, totalMarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = mysqli_prepare($conn, $query);
          if ($stmt) {

               mysqli_stmt_bind_param($stmt, "ssssssss", $param_name, $param_roll_no, $param_branch, $param_semester, $param_subject, $param_date, $param_marks, $param_total_marks);

               $param_name = $name;
               $param_roll_no = $roll_no;
               $param_branch = $branch;
               $param_semester = $semester;
               $param_subject = $subject;
               $param_date = $date;
               $param_marks = $marks;
               $param_total_marks = $totalMarks;
          }
          // Try to execute the query
          if (mysqli_stmt_execute($stmt)) {
               // echo "success";
               $_SESSION['marks'] = $marks;
               $_SESSION['success'] = "Yes";
               $_SESSION['subject'] = $subject;
               $_SESSION['totalMarks'] = $totalMarks;
               header("location: student_home.php");
          } else {
               echo "error";
               // header("location: att4err.php");
          }
     }
}

?>

<div style="margin-top: 15px;">
     <h3 style="text-align: center">MCQ Banks</h3><h4 style="text-align: center">Time Remaining: <?php include('timer.php'); ?></h4>
</div>
<div class="form-design">
     <div class="container">
          <div class="row">
               <div class="col-sm-1">
               </div>
               <div class="col-sm-10">
                    <div class="col-12">

                         <form action="" method="post">
                              <?php
                              $i = 0;
                              $sql3 = mysqli_query($conn, "SELECT * FROM mcq_bank_questions WHERE branch='$branch' AND semester='$semester' AND subject='$subject' ORDER BY mcq_id");
                              while ($row = mysqli_fetch_array($sql3)) {
                                   $i++;
                                   if ($i <= $totalMarks) {

                              ?>
                                        <p class="fw-bold">
                                             <?php echo $i;
                                             echo ". ";
                                             echo $row['question'] ?>
                                        </p>

                                        <div>

                                             <input type="radio" name="question<?php echo $i; ?>" id="one<?php echo $i; ?>" value="<?php echo $row['option_a'] ?>">
                                             <input type="radio" name="question<?php echo $i; ?>" id="two<?php echo $i; ?>" value="<?php echo $row['option_b'] ?>">
                                             <input type="radio" name="question<?php echo $i; ?>" id="three<?php echo $i; ?>" value="<?php echo $row['option_c'] ?>">
                                             <input type="radio" name="question<?php echo $i; ?>" id="four<?php echo $i; ?>" value="<?php echo $row['option_d'] ?>">
                                             <label for="one<?php echo $i; ?>" class="box first">
                                                  <div class="course">
                                                       <span class="circle"></span>
                                                       <span class="subject"> A. <?php echo $row['option_a'] ?> </span>
                                                  </div>
                                             </label>
                                             <label for="two<?php echo $i; ?>" class="box second">
                                                  <div class="course">
                                                       <span class="circle"></span>
                                                       <span class="subject"> B. <?php echo $row['option_b'] ?> </span>
                                                  </div>
                                             </label>
                                             <label for="three<?php echo $i; ?>" class="box third">
                                                  <div class="course">
                                                       <span class="circle"></span>
                                                       <span class="subject"> C. <?php echo $row['option_c'] ?> </span>
                                                  </div>
                                             </label>
                                             <label for="four<?php echo $i; ?>" class="box forth">
                                                  <div class="course">
                                                       <span class="circle"></span>
                                                       <span class="subject"> D. <?php echo $row['option_d'] ?> </span>
                                                  </div>
                                             </label>

                                        </div>
                                        <br />

                              <?php

                                   }
                              }
                              ?>

                              <div class="row" style="text-align: center">
                                   <div class="col" style="text-align: center">
                                        <button type="submit" name="submit" id="submitExam" class="btn btn-success col-md-3">Submit</button>
                                   </div>
                                   <div class="col" style="text-align: center">
                                        <!-- <button type="submit" name="cancel" class="btn btn-danger col-md-3">Cancel</button> -->
                                   </div>
                              </div>

                         </form>
                    </div>
               </div>
               <div class="col-sm-1">
               </div>
          </div>
     </div>
</div>

<?php
include('master_page/footer.php');
?>