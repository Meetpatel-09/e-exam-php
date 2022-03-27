<?php

$title = "MCQ Banks";
require_once "web_config/config.php";
include('master_page/header.php');

$mcqBankId = $_GET['mcq_bank_id'];

function function_alert($message)
{
     // Display the alert box 
     echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

if (isset($_SESSION['added'])) {
     function_alert("MCQ added successfuly.");
     unset($_SESSION['added']);
}

$sql1 = mysqli_query($conn, "SELECT * FROM mcq_bank WHERE mcq_bank_id = '$mcqBankId'");
while ($row = mysqli_fetch_array($sql1)) {
     $branch = $row['branch'];
     $semester = $row['semester'];
     $subject = $row['subject'];
}


if (isset($_POST['approve'])) {
     $sql = "UPDATE mcq_bank SET is_approved = '1' WHERE mcq_bank_id = '$mcqBankId'";

     $result = mysqli_query($conn, $sql);

     if ($result) {
          function_alert("MCQ Bank Approved.");
     } else {
          function_alert("Something went wrong!!!");
     }
}
if (isset($_POST['reject'])) {
}


?>

<div style="margin-top: 15px;">
     <h3 style="text-align: center">MCQ Banks</h3>
</div>
<div class="form-design">
     <div class="container">
          <div class="row">
               <div class="col-sm-1">
               </div>
               <div class="col-sm-10">
                    <?php
                    $i = 0;
                    $sql1 = mysqli_query($conn, "SELECT * FROM mcq_bank_questions WHERE branch='$branch' AND semester='$semester' AND subject='$subject' ORDER BY mcq_id");
                    while ($row = mysqli_fetch_array($sql1)) {
                         $i++;
                    ?>
                         <div class="scp-quizzes-main">
                              <div class="scp-quizzes-data">
                                   <h3><?php echo $i;
                                        echo ". ";
                                        echo $row['question'] ?></h3>
                                   <input type="radio" name="question<?php echo $i ?>">
                                   <label>A. <?php echo $row['option_a'] ?></label><br />
                                   <input type="radio" name="question<?php echo $i ?>">
                                   <label>B. <?php echo $row['option_b'] ?></label><br />
                                   <input type="radio" name="question<?php echo $i ?>">
                                   <label>C. <?php echo $row['option_c'] ?></label> <br />
                                   <input type="radio" name="question<?php echo $i ?>">
                                   <label>D. <?php echo $row['option_d'] ?></label>
                              </div>
                              <br />
                         </div>
                    <?php
                    }

                    if (isset($_SESSION['admin_email'])) {

                    ?>
                         <form action="" method="post">
                              <div class="row" style="text-align: center">
                                   <div class="col" style="text-align: center">
                                        <button type="submit" name="approve" class="btn btn-success col-md-3">Approve</button>
                                   </div>
                                   <div class="col" style="text-align: center">
                                        <button type="submit" name="reject" class="btn btn-danger col-md-3">Reject</button>
                                   </div>
                              </div>
                         </form>
                    <?php
                    }
                    ?>
               </div>
               <div class="col-sm-1">
               </div>
          </div>
     </div>
</div>


<script type="text/javascript">
     $(document).ready(function() {
          $('label').click(function() {
               $('label').removeClass('worngans');
               $(this).addClass('worngans');
          });
     });
</script>

<?php
include('master_page/footer.php');
?>