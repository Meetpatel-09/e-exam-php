<?php
$title = "Add Subject";

ob_start();
require_once "web_config/config.php";
include('master_page/header.php');

function function_alert($message)
{
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

$subject_name = "";
$subject_name_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check subject name is empty
    if (empty(trim($_POST["inputSubjectName"]))) {
        $subject_name_err = "Please enter subject name";
        function_alert($subject_name_err);
    } else {
        $subject_name = trim($_POST['inputSubjectName']);
    }

    $branch = $_POST['inputBranch'];
    $semester = $_POST['inputSemester'];

    // If there were no error insert user details in database
    if (empty(trim($subject_name_err))) {

        $query = "INSERT INTO subject(s_name,b_name,semester) VALUES(?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $param_s_name, $param_b_name, $param_semester);

            // Set this parameters

            $param_s_name = $subject_name;
            $param_b_name = $branch;
            $param_semester = $semester;

            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) {
                header("location: view_subject1.php");
            } else {
                function_alert("Something went wrong");
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>
<div class="form-design">
    <div class="container" style="margin-top: 25px;">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div class="card" style="padding:25px;">
                    <h3 style="text-align: center">Add new subject</h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputBranch">Select Branch</label>
                            <div style="margin-top:15px;"></div>
                            <select id="inputBranch" name="inputBranch" class="form-select">
                                <option selected>Choose</option>
                                <option>BCA</option>
                                <option>BBA</option>
                            </select>
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="form-group">
                            <label for="inputSemester">Select Semester</label>
                            <div style="margin-top:15px;"></div>
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
                            <label for="inputSubjectName" class="form-label">Subject Name</label>
                            <input type="text" class="form-control" id="inputSubjectName" name="inputSubjectName" placeholder="Subject Name">
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div style="text-align:center">
                            <button type="submit" class="btn btn-primary">Submit</button>
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