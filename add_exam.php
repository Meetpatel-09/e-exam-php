<?php

$title = "Add Exam";
require_once "web_config/config.php";
include('master_page/header.php');

function function_alert($message)
{
     // Display the alert box 
     echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

$sName = $branch = $semester = $exam_date = $exam_start_at =  $exam_end_at = $outOfMarks = "";
$sName_err = $branch_err = $semester_err = $exam_dater_err = $exam_start_atr_err =  $exam_end_atr_err = $outOfMarks = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

     date_default_timezone_set('Asia/Kolkata');
     $current_time = date('H:i');

     $exam_date = $_POST['exampleInputDate'];
     $exam_start_at = $_POST['exampleInputStartTime'];
     $exam_end_at = $_POST['exampleInputEndTime'];

     // Check if full name is empty
     if (empty(trim($_POST["exampleInputName"]))) {
          $sName_err = "Please Enter Subject Name";
          function_alert($sName_err);
     } else {
          $sName = trim($_POST['exampleInputName']);
     }

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
     
     // Check if full name is empty
     if (empty(trim($_POST["exampleInputOutOfMarks"]))) {
          $outOfMarks_err = "Please Enter Marks";
          function_alert($outOfMarks_err);
     } else {
          $outOfMarks = trim($_POST['exampleInputOutOfMarks']);
     }

     $exam_date = $_POST['exampleInputDate'];;

     if (empty($sName_err) && empty($branch_err) && empty($semester_err) && empty($outOfMarks_err)) {

          $query = "INSERT INTO exam(s_name,branch,semester,out_of_makes,date,start_time,end_time) VALUES(?, ?, ?, ?, ?, ?, ?)";
			$stmt = mysqli_prepare($conn, $query);
            if($stmt) {
				mysqli_stmt_bind_param($stmt, "sssssss", $param_s_name, $param_b_name , $param_semester, $param_out_of_marks , $param_exam_date, $param_start_time , $param_end_time);

				// Set this parameters

				$param_s_name = $sName;
				$param_b_name = $branch;
				$param_semester = $semester;
				$param_out_of_marks = $outOfMarks;
				$param_exam_date = $exam_date;
				$param_start_time = $exam_start_at;
				$param_end_time = $exam_end_at;

				// Try to execute the query
				if(mysqli_stmt_execute($stmt)) {
                    $_SESSION['added'] = "Subject added successfully";
                    // function_alert("Subject added successfully");
                    header("location: admin_home.php");
                } else {
                    function_alert("Something went wrong");
                }
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($conn);

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
                                   <label for="exampleInputName">Subject Name</label>
                                   <div style="margin-top:15px;"></div>
                                   <input type="text" class="form-control" id="exampleInputName" name="exampleInputName" placeholder="Subject Name" value="<?php $fname ?>">
                              </div>
                              <div style="margin-top:15px;"></div>
                              <div class="form-group">
                                   <label for="exampleInputDate">Select Date</label>
                                   <div style="margin-top:15px;"></div>
                                   <input type="date" class="form-control" id="exampleInputDate" name="exampleInputDate" placeholder="Exam Date" value="<?php echo date("Y-m-d"); ?>">
                              </div>
                              <div style="margin-top:15px;"></div>

                              <div class="row g-3">
                                   <div class="col">
                                        <label for="exampleInputStartTime">Select Exam Start Time</label>
                                        <div style="margin-top:15px;"></div>
                                        <input type="time" class="form-control" id="exampleInputStartTime" name="exampleInputStartTime" placeholder="Exam Start At Time">
                                   </div>
                                   <div class="col">
                                        <label for="exampleInputEndTime">Select Exam End Time</label>
                                        <div style="margin-top:15px;"></div>
                                        <input type="time" class="form-control" id="exampleInputEndTime" name="exampleInputEndTime" placeholder="Exam End At Time">
                                   </div>
                              </div>
                              <div style="margin-top:15px;"></div>
                              <div class="form-group">
                                   <label for="exampleInputOutOfMarks">Out Of Marks</label>
                                   <div style="margin-top:15px;"></div>
                                   <input type="number" class="form-control" id="exampleInputOutOfMarks" name="exampleInputOutOfMarks" placeholder="Out Of Marks">
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
               <div class="col-md-4">
               </div>
          </div>
     </div>
</div>

<?php
include('master_page/footer.php');
// onclick="spinner()"
?>