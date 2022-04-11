<?php

$title = "View Result of Single Student";
require_once "web_config/config.php";
include('master_page/header.php');

function function_alert($message)
{
     // Display the alert box 
     echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

if (isset($_SESSION['rollNumber'])) {
     $roll_no = $_SESSION['rollNumber'];
     $_SESSION['rollNumber'] = null;
} else {
     $roll_no = $_GET['roll_no'];
}

$branch = $_SESSION["branch"];
$semester = $_SESSION["semester"];

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
                         <table width="100%" class="table table-bordered border-primary text-center align-middle">
                              <tbody>
                                   <tr>
                                        <th width="10%" scope="col">Roll Number</th>
                                        <th width="10%" scope="col">Name</th>
                                        <th width="10%" scope="col">Subject Name</th>
                                        <th width="10%" scope="col">Marks Scored</th>
                                        <th width="10%" scope="col">Total Marks</th>
                                   </tr>

                                   <?php

                                   $sql3 = "SELECT * FROM results WHERE branch='$branch' AND semester='$semester' AND roll_no='$roll_no';";
                                   $result3 = mysqli_query($conn, $sql3);

                                   if (mysqli_num_rows($result3) > 0) {
                                        while ($row3 = mysqli_fetch_assoc($result3)) {
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
                                            
                                        </tr>
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