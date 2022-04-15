<?php
$title = "Home";
require_once "web_config/config.php";
include('master_page/header.php');

if (isset($_SESSION['admin_email'])) {

	function function_alert($message)
	{
		// Display the alert box 
		echo "<script>alert('$message');</script>";
	}
	// Function call
	// function_alert("Welcome to Geeks for Geeks");

	if (isset($_SESSION['added'])) {
		function_alert($_SESSION['added']);
		unset($_SESSION['added']);
	}

?>
	<div style="padding:15px;">
		<div style="margin-top: 15px;">
			<h3 style="text-align: center">Welcome</h3>
		</div>
		<div class="row row-cols-1 row-cols-md-2 g-4" style="margin-top: 15px;">
			<!-- <div class="col-md-3 text-center" style="padding:15px;">
				<div class="card">
				<img src="images/admin.png" class="card-img-top" alt="...">
				<div class="card-body">
					<a href="" class="btn btn-primary">Add Admin</a>
					<a href="" class="btn btn-primary">View Admins</a>
				</div>
				</div>
			</div> -->
			<div class="col-md-3 text-center" style="padding:15px;">
				<div class="card">
					<img src="images/jpg.jfif" class="card-img-top" alt="...">
					<div class="card-body">
						<a href="add_staff.php" class="btn btn-primary">Add Staff</a>
						<a href="view_staff.php" class="btn btn-primary">View Staff</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center" style="padding:15px;">
				<div class="card">
					<img src="images/PngItem_3018951.png" class="card-img-top" alt="...">
					<div class="card-body">
						<a href="add_student.php" class="btn btn-primary">Add Student</a>
						<a href="view_student1.php" class="btn btn-primary">View Students</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center" style="padding:15px;">
				<div class="card">
					<img src="images/subjects-featured-image.png" class="card-img-top" alt="...">
					<div class="card-body">
						<a href="add_subject.php" class="btn btn-primary">Add Subject</a>
						<a href="view_subject1.php" class="btn btn-primary">View Subjects</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center" style="padding:15px;">
				<div class="card">
					<img src="images/qb.png" class="card-img-top" alt="...">
					<div class="card-body">
						<a href="mcq_bank.php" class="btn btn-primary">Approve MCQ Bank</a>
						<!-- <a href="" class="btn btn-primary">View MCQ Bank</a> -->
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center" style="padding:15px;">
				<div class="card">
					<img src="images/Generic-calendar-page-icon.png" class="card-img-top" alt="...">
					<div class="card-body">
						<a href="add_exam.php" class="btn btn-primary">Add Exam</a>
						<a href="view_exam.php" class="btn btn-primary">View Exam</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center" style="padding:15px;">
				<div class="card">
					<img src="images/student-attendance-icon-2.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<a href="" class="btn btn-primary">View Results</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
} else {
	header("location: index.php");
}
include('master_page/footer.php');
?>