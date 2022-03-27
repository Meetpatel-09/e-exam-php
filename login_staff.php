<?php

$title = "Staff Log In";
require_once "web_config/config.php";
include('master_page/header.php');

function function_alert($message)
{
     // Display the alert box 
     echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

// function function_show_spinner() {
//      // Display the alert box 
//      echo '<script> </script>';
// }

$email = "";
$email_err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {

     // function_show_spinner();

     // Check if email is empty
     if (empty(trim($_POST['exampleInputEmail1']))) {
          $email_err = "Please enter email";
          function_alert($email_err);
     } else {
          $email = trim($_POST['exampleInputEmail1']);
     }

     if (empty($email_err)) {
          $sql = "SELECT faculty_id, email FROM faculty WHERE email = ?";
          $stmt = mysqli_prepare($conn, $sql);
          mysqli_stmt_bind_param($stmt, "s", $param_email);
          $param_email = $email;

          // Try to execute this statement
          if (mysqli_stmt_execute($stmt)) {
               mysqli_stmt_store_result($stmt);
               if (mysqli_stmt_num_rows($stmt) == 1) {

                    mysqli_stmt_bind_result($stmt, $id, $email);
                    if (mysqli_stmt_fetch($stmt)) {

                         $otp = mt_rand(111111, 999999);
                         $to_email = $email;
                         $subject = "OTP Verification";
                         $body = "Hello, Your OTP is $otp.";
                         $headers = "From: group7915@gmail.com";

                         $isSent = "non";
                         if (mail($to_email, $subject, $body, $headers)) {
                              $isSent = "true";
                         } else {
                              $isSent = "false";
                         }
                         $_SESSION['otp'] = $otp;
                         $_SESSION['staff_email'] = $email;
                         $_SESSION['is_sent'] = $isSent;
                         header("location: otp_verify.php");
                    } else {
                         function_alert("Internal server error");
                    }
               } else {
                    function_alert("Email not registred");
               }
          } else {
               function_alert("Internal server error");
          }
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
                         <h3 style="text-align: center">Staff Log In</h3>
                         <form action="" method="post">
                              <div style="margin-top:15px;"></div>
                              <div class="form-group">
                                   <label for="exampleInputEmail1">Email address</label>
                                   <div style="margin-top:15px;"></div>
                                   <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                              </div>
                              <div style="margin-top:15px;"></div>
                              <div style="text-align:center">
                                   <div style="margin-top:15px;"></div>
                                   <button type="submit" class="btn btn-primary col-6">Get OTP</button>
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
?>