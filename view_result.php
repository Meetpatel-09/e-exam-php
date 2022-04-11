<?php

$title = "View Result";
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

<div style="padding:15px;">
     <div style="margin-top: 15px;">
          <h3 style="text-align: center">Welcome</h3>
     </div>
     <form action="" method="post">
          <div class="row row-cols-1 row-cols-md-2 g-4" style="margin-top: 15px;">
               <div class="col-md-3 text-center" style="padding:15px;">
               </div>
               <div class="col-md-3 text-center" style="padding:15px;">
                    <div class="card">
                         <img src="images/class.png" class="card-img-top" alt="...">
                         <div class="card-body">
                              <a href="view_result_c.php" class="btn btn-primary">View Class wise</a>
                         </div>
                    </div>
               </div>
               <div class="col-md-3 text-center" style="padding:15px;">
                    <div class="card">
                         <img src="images/ss.png" class="card-img-top" alt="...">
                         <div class="card-body">
                              <a href="view_result_s.php" class="btn btn-primary">View Single Student</a>
                         </div>
                    </div>
               </div>
          </div>
     </form>
</div>

<?php
include('master_page/footer.php');
?>