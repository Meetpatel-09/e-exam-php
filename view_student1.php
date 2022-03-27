<?php
$title = "View Students";

include('master_page/header.php');

function function_alert($message)
{
     // Display the alert box 
     echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

if (isset($_SESSION['added'])) {
     function_alert("Students added successfuly.");
     unset($_SESSION['added']);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {


     $branch = $semester = "";
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

          if (empty($sName_err) && empty($branch_err) && empty($semester_err)) {

               $_SESSION["branch"] = $branch;
               $_SESSION["semester"] = $semester;

               header("location: view_student2.php");
          }
     }
}
?>
<div style="margin-top: 15px;">
     <h3 style="text-align: center"></h3>
</div>
<div class="form-design">
     <div class="container">
          <div class="row">
               <div class="col-sm-4">
               </div>
               <div class="col-sm-4">
                    <div class="card" style="padding:25px;">
                         <h3 style="text-align: center">View Students</h3>
                         <form action="" method="post" enctype="multipart/form-data">
                         <div style="margin-top:15px;"></div>
                              <div class="form-group">
                                   <label for="inputBranch">Select Branch</label>
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
                              <div class="d-flex justify-content-between">
                                   <button type="submit" class="btn btn-primary">Next</button>
                                   <a href="admin_home.php" class="btn btn-primary">Cancel</a>
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
?>