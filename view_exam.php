<?php

$title = "View Exam";
require_once "web_config/config.php";
include('master_page/header.php');

function function_alert($message)
{
     // Display the alert box 
     echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

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
                    <div style="text-align: center">
                         <table width="100%" class="table table-bordered border-primary">
                              <tbody>
                                   <tr>
                                        <th width="5%" scope="col">Sr No.</th>
                                        <th width="10%" scope="col">Subject Name</th>
                                        <th width="10%" scope="col">Branch</th> 
                                        <th width="10%" scope="col">Semester</th>
                                        <th width="10%" scope="col">Exam Total Marks</th>
                                        <th width="10%" scope="col">Date</th>
                                        <th width="10%" scope="col">Start Time</th>
                                        <th width="10%" scope="col">End Time</th>
                                        <!-- <th width="10%" scope="col">Modify</th> -->
                                        <th width="10%" scope="col">View</th>
                                   </tr>
                                   <?php
                                   $srNo = 0;
                                   $sql1 = mysqli_query($conn, "SELECT * FROM exam");
                                   while ($row = mysqli_fetch_array($sql1)) {
                                        $srNo++;
                                   ?>
                                        <tr>
                                             <td><?php echo $srNo; ?></td>
                                             <td><?php echo $row['s_name'] ?></td>
                                             <td><?php echo $row['branch'] ?></td>
                                             <td><?php echo $row['semester'] ?></td>
                                             <td><?php echo $row['out_of_makes'] ?></td>
                                             <td><?php echo $row['date'] ?></td>
                                             <td><?php echo $row['start_time'] ?></td>
                                             <td><?php echo $row['end_time'] ?></td>
                                             <!-- <td><a href="modify_exam.php?exam_id=<?php echo $row['exam_id'] ?>" type="submit" class="btn btn-warning">Modify</a></td> -->
                                             <td><a href="delete_exam.php?exam_id=<?php echo $row['exam_id'] ?>" type="submit" class="btn btn-danger">Remove</a></td>
                                        </tr>
                                   <?php } ?>
                              </tbody>
                         </table>
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