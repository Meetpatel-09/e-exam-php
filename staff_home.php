<?php

$title = "Home";
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
	<div class="row row-cols-1 row-cols-md-2 g-4" style="margin-top: 15px;">

		<div class="col-md-3 text-center" style="padding:15px;">

		</div>
		<div class="col-md-3 text-center" style="padding:15px;">
			<div class="card">
				<img src="images/qb.png" class="card-img-top" alt="...">
				<div class="card-body">
					<a href="add_mcq_bank1.php" class="btn btn-primary">Add MCQ Bank</a>
					<a href="mcq_bank.php" class="btn btn-primary">View MCQ Bank</a>
				</div>
			</div>
		</div>
		<div class="col-md-3 text-center" style="padding:15px;">
			<div class="card">
				<img src="images/student-attendance-icon-2.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<a href="view_result.php" class="btn btn-primary">View Results</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include('master_page/footer.php');
?>