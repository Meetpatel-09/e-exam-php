<?php

$title = "View Result of Class";
require_once "web_config/config.php";
include('master_page/header.php');

function function_alert($message)
{
     // Display the alert box 
     echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

$branch = $semester = "";
$branch_err = $semester_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

     echo "dfsadf";
     // Check if full name is empty
     if ($_POST["inputBranch"] == "Choose") {
          $branch_err = "Please Select Branch";
          function_alert($branch_err);
     } else {
          $branch = trim($_POST['inputBranch']);
     }

     // Check if full name is empty
     if ($_POST["inputSemester"] == "Choose") {
          $semester_err = "Please Select Semester";
          function_alert($semester_err);
     } else {
          $semester = trim($_POST['inputSemester']);
     }

     $exam_date = $_POST['exampleInputDate'];
     $rollNumber = $_POST['exampleInputRollNumber'];

     if (empty($branch_err) && empty($semester_err)) {
          
          $_SESSION['branch'] = $branch;
          $_SESSION['semester'] = $semester;
          $_SESSION['rollNumber'] = $rollNumber;

          header("location: view_result_s2.php");
     }
}

?>

<div style="margin-top: 15px;">
     <h3 style="text-align: center"></h3>
</div>
<div class="form-design">
     <div class="container">
          <div class="row">
               <div class="col-md-4">
               </div>
               <div class="col-md-4">
                    <div class="card" style="padding: 25px;">
                         <h3 style="text-align: center">Set Exam</h3>
                         <form action="" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                   <div style="margin-top:15px;"></div>
                                   <label for="inputBranch">Select Branch</label>
                                   <div style="margin-top:10px;"></div>
                                   <select id="inputBranch" name="inputBranch" class="form-select">
                                        <option selected>Choose</option>
                                        <option>BCA</option>
                                        <option>BBA</option>
                                        <option>B.Com.</option>
                                   </select>
                              </div>
                              <div style="margin-top:15px;"></div>
                              <div class="form-group">
                                   <label for="inputSemester">Select Semester</label>
                                   <div style="margin-top:10px;"></div>
                                   <select id="inputSemester" name="inputSemester" class="form-select">
                                        <option selected>Choose</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                   </select>
                              </div>
                              <div style="margin-top:15px;"></div>
                              <div class="form-group">
                                   <label for="exampleInputDate">Select Date</label>
                                   <div style="margin-top:15px;"></div>
                                   <input type="date" class="form-control" id="exampleInputDate" name="exampleInputDate" placeholder="Exam Date" value="<?php echo date("Y-m-d"); ?>">
                              </div>
                              <div style="margin-top:15px;"></div>
                              <div class="form-group">
                                   <label for="exampleInputRollNumber">Roll Numner</label>
                                   <div style="margin-top:15px;"></div>
                                   <input type="number" class="form-control" id="exampleInputRollNumber" name="exampleInputRollNumber" placeholder="Roll Number">
                              </div>
                              <div style="margin-top:15px;"></div>

                              <div class="row g-3">
                                   <div class="col">
                                        <button type="submit" class="btn btn-primary" style="text-align:left">Next</button>
                                   </div>
                                   <!-- <div class="col">
                                        <a href="" class="btn btn-primary" style="margin-left: 185px;">Back</a>
                                   </div> -->
                              </div>
                         </form>
                    </div>
               </div>
               <div class="col-md-4">
               </div>
          </div>
     </div>
</div>

<?php
include('master_page/footer.php');
// onclick="spinner()"
?>