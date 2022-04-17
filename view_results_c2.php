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

$branch = $_SESSION["branch"];
$semester = $_SESSION["semester"];
$date = $_SESSION["date"];
?>

<div style="margin-top: 15px;">
     <h3 style="text-align: center"></h3>
</div>
<div class="form-design">
     <div class="container">
          <div class="row">
               <div class="col-sm-2">
               </div>
               <div class="col-sm-8">
                    <div style="margin-top: 15px;">
                    </div>
                    <div>
                         <table width="100%" class="table table-bordered text-center align-middle">

                         <?php
                              $sql4 = "SELECT * FROM results WHERE branch='$branch' AND semester='$semester' AND date='$date'";
                              $result4 = mysqli_query($conn, $sql4);
                              if (mysqli_num_rows($result4) > 0) {
                                   while ($row4 = mysqli_fetch_array($result4)) {
                                        
                                        $subject2 = $row4['subject'];
                                        $totalMarks2 = $row4['totalMarks'];
                                   }
                         ?>

                              <tbody>
                                   <tr>
                                        <th width="10%" scope="col">Roll Number</th>
                                        <th width="10%" scope="col">Name</th>
                                        <th width="10%" scope="col">Subject Name</th>
                                        <th width="10%" scope="col">Marks Scored</th>
                                        <th width="10%" scope="col">Total Marks</th>
                                        <th width="10%" scope="col">View Single</th>
                                   </tr>

                                   <?php

                                   $sql1 = mysqli_query($conn, "SELECT * FROM student WHERE branch='$branch' AND semester='$semester' ORDER BY roll_no");
                                   while ($row = mysqli_fetch_array($sql1)) {
                                        $roll_no =  $row['roll_no'];
                                        $fname = $row['name'];
                                        $sql3 = "SELECT * FROM results WHERE branch='$branch' AND semester='$semester' AND date='$date' AND roll_no='$roll_no';";
                                        $result3 = mysqli_query($conn, $sql3);

                                        if (mysqli_num_rows($result3) > 0) {
                                             while ($row3 = mysqli_fetch_assoc($result3)) {

                                                  $roll_no2 = $row3['roll_no'];
                                                  $fname3 = $row3['name'];
                                                  $marks = $row3['marks'];
                                                  $subject = $row3['subject'];
                                                  $semester3 = $row3['semester'];
                                                  $totalMarks = $row3['totalMarks'];
                                             }

                                   ?>

                                        <tr>
                                             <td><?php echo $roll_no; ?></td>
                                             <td><?php echo $fname3; ?></td>
                                             <td><?php echo $subject; ?></td>
                                             <td><?php echo $marks; ?></td>
                                             <td><?php echo $totalMarks; ?></td>
                                             <td>
                                                  <a href="view_result_s2.php?roll_no=<?php echo $roll_no; ?>" type="submit" class="btn btn-primary">View</a>
                                             </td>
                                        </tr>
                                   <?php

                                        } else {
                                             ?>
                                             <tr class="table-danger">
                                             <td><?php echo $roll_no; ?></td>
                                             <td><?php echo $fname; ?></td>
                                             <td><?php echo $subject2; ?></td>
                                             <td><?php echo 'Absent'; ?></td>
                                             <td><?php echo $totalMarks2; ?></td>
                                             <td>
                                                  <a href="view_result_s2.php?roll_no=<?php echo $roll_no; ?>" type="submit" class="btn btn-primary">View</a>
                                             </td>
                                        </tr>

                                   <?php
                                        }
                                   }
                              } else {
                                   ?>

                                   <div class="center text-center"><h3>No Exam</h3></div>

                                   <?php 
                              }
                                   ?>
                              </tbody>
                         </table>
                    </div>
               </div>
               <div class="col-sm-2">
               </div>
          </div>
     </div>
</div>

<?php
include('master_page/footer.php');
?>