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

$branch = $semester =  "";
$branch_err = $semester_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

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

     if (empty($branch_err) && empty($semester_err)) {
  
          $_SESSION["branch"] = $branch;
          $_SESSION["semester"] = $semester;
  
          header("location: add_mcq_bank2.php");
     }

}
?>

<div class="form-design">
     <div class="container">
          <div class="row">
               <div class="col-sm-4">
               </div>
               <div class="col-sm-4">
                    <div class="card" style="padding:25px;">
                    <h3 style="text-align: center">Add MCQ Bank</h3>
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
                         <div class="row g-3">
                              <div class="col">
                                   <button type="submit" class="btn btn-primary" style="text-align:left">Next</button>
                              </div>
                              <div class="col">
                                   <a href="staff_home.php" class="btn btn-primary" style="margin-left: 185px;">Back</a>
                              </div>
                         </div>
                    </form>
                    </div>
               </div>
               <div class="col-sm-4">
               </div>
          </div>
     </div>
</div>

<?php
include('master_page/footer.php');
// onclick="spinner()"
?>