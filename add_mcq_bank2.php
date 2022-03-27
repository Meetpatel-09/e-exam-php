<?php

$title = "Add MCQ Bank";
require_once "web_config/config.php";
include('master_page/header.php');

function function_alert($message)
{
     // Display the alert box 
     echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

error_reporting(E_ALL ^ E_WARNING);
error_reporting(E_ERROR);

$branch = $_SESSION['branch'];
$semester = $_SESSION['semester'];
$subject = $_SESSION['sName'];

if (isset($_POST['submit'])) {

     // echo '<pre>';
     // print_r($_FILES);
     // echo '</pre>';

     $file = $_FILES['doc']['tmp_name'];

     $ext = pathinfo($_FILES['doc']['name'], PATHINFO_EXTENSION);
     if ($ext == 'xlsx') {


          $isInserted = mysqli_query($conn, "insert into mcq_bank(branch, semester, subject) values('$branch', '$semester','$subject')");


          $sql1 = mysqli_query($conn, "SELECT * FROM mcq_bank WHERE branch='$branch' AND semester='$semester' AND subject='$subject'");
          while ($row = mysqli_fetch_array($sql1)) {
               $mcqBankID = $row['mcq_bank_id'];
          }

          require('PHPExcel/PHPExcel.php');
          require('PHPExcel/PHPExcel/IOFactory.php');


          $obj = PHPExcel_IOFactory::load($file);
          foreach ($obj->getWorksheetIterator() as $sheet) {
               $getHighestRow = $sheet->getHighestRow();
               for ($i = 2; $i <= $getHighestRow; $i++) {
                    // echo $i;
                    $question = $sheet->getCellByColumnAndRow(0, $i)->getValue();
                    $option_a = $sheet->getCellByColumnAndRow(1, $i)->getValue();
                    $option_b = $sheet->getCellByColumnAndRow(2, $i)->getValue();
                    $option_c = $sheet->getCellByColumnAndRow(3, $i)->getValue();
                    $option_d = $sheet->getCellByColumnAndRow(4, $i)->getValue();
                    $correct_answer = $sheet->getCellByColumnAndRow(5, $i)->getValue();
                    if ($question != '') {
                         $done = mysqli_query($conn, "insert into mcq_bank_questions(branch, semester, subject, question, option_a, option_b, option_c, option_d, correct_answer, mcq_bank_id) values('$branch', '$semester','$subject', '$question', '$option_a', '$option_b', '$option_c', '$option_d', '$correct_answer', '$mcqBankID')");
                         if ($done) {
                              $_SESSION['added'] = "yes";
                              header("location: view_mcq_bank2.php?mcq_bank_id=$mcqBankID");
                         } else {
                              function_alert("Something went wrong");
                         }
                    }
               }
          }
     } else {
          function_alert("Invalid file format");
     }
}

?>
<div class="form-design">
     <div class="container" style="margin-top: 25px;">
          <div class="row">
               <div class="col-md-4">
               </div>
               <div class="col-md-4">
                    <div class="card" style="padding:25px;">
                         <h3 style="text-align: center">Add MCQ Bank</h3>
                         <form method="post" enctype="multipart/form-data">
                              <div style="margin-top:15px;"></div>
                              <div class="form-group">
                                   <label for="staffExcelFile">Select Excel Sheet</label>
                                   <div style="margin-top:15px;"></div>
                                   <input type="file" name="doc" class="form-control">
                              </div>
                              <div style="margin-top:15px;"></div>
                              <div style="text-align:center">
                                   <div style="margin-top:15px;"></div>
                                   <input type="submit" name="submit" class="btn btn-primary col-6"></input>
                              </div>
                         </form>
                    </div>
               </div>
               <div class="col-md-4">
               </div>
          </div>
          <div style="text-align:center; visibility: hidden;" id="loadingSpinner">
               <div class="spinner-border" style="text-align: center;" role="status"><span class="visually-hidden">Loading...</span></div>
          </div>
     </div>
</div>



<script type="text/javascript">
     function spinner() {
          document.getElementById("loadingSpinner").style.visibility = "visible"
     }
</script>

<?php
include('master_page/footer.php');
// onclick="spinner()"
?>