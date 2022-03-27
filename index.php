<?php

$title = "Home";
include('master_page/header.php');

?>

<div style="padding:15px;">
	<div style="margin-top: 15px;">
		<h3 style="text-align: center">Welcome</h3>
	</div>
	<div class="row row-cols-1 row-cols-md-2 g-4" style="margin-top: 0px;">
		<div class="col-md-4 text-center" style="padding:15px;">
			<div class="card">
				<img src="images/admin.gif" class="card-img-top" alt="...">
				<div class="card-body">
					<a href="login_admin.php" class="btn btn-primary">Log In Admin</a>
				</div>
			</div>
		</div>
		<div class="col-md-4 text-center" style="padding:15px;">
			<div class="card">
				<img src="images/faculty4.gif" class="card-img-top" alt="...">
				<div class="card-body">
					<a href="login_staff.php" class="btn btn-primary">Log In Staff</a>
				</div>
			</div>
		</div>
		<div class="col-md-4 text-center" style="padding:15px;">
			<div class="card">
				<img src="images/students.gif" class="card-img-top" alt="...">
				<div class="card-body">
					<a href="login_student.php" class="btn btn-primary">Log In Students</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include('master_page/footer.php');
?>