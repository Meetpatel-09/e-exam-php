<?php

$title = "Approve MCQ Banks";
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
                                        <th width="7%" scope="col">Sr No.</th>
                                        <th width="10%" scope="col">Branch</th>
                                        <th width="10%" scope="col">Semester</th>
                                        <th width="10%" scope="col">Subject</th>
                                        <th width="11%" scope="col">View</th>
                                   </tr>
                                   <?php
                                   $srNo = 0;
                                   $sql1 = mysqli_query($conn, "SELECT * FROM mcq_bank");
                                   while ($row = mysqli_fetch_array($sql1)) {
                                        $srNo++;
                                   ?>
                                        <tr>
                                             <td><?php echo $srNo; ?></td>
                                             <td><?php echo $row['branch'] ?></td>
                                             <td><?php echo $row['semester'] ?></td>
                                             <td><?php echo $row['subject'] ?></td>
                                             <td><a href="view_mcq_bank2.php?mcq_bank_id=<?php echo $row['mcq_bank_id'] ?>" type="submit" class="btn btn-primary">View</button></td>
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