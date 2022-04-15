<?php
$title = "View Subject";

require_once "web_config/config.php";
include('master_page/header.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $branch = $_POST['inputBranch'];
    $semester = $_POST['inputSemester'];

    session_start();
    $_SESSION["branch"] = $branch;
    $_SESSION["semester"] = $semester;

    header("location: view_subject2.php");
}
?>

<div class="form-design">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <div class="card" style="padding:25px; margin-top: 25px;">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h3 style="text-align: center">View Subject</h3>
                        <div class="form-group">
                            <div style="margin-top:15px;"></div>
                            <label for="inputBranch">Select Branch</label>
                            <div style="margin-top:15px;"></div>
                            <select id="inputBranch" name="inputBranch" class="form-select">
                                <option selected>Choose</option>
                                <option>BCA</option>
                                <option>BBA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div style="margin-top:15px;"></div>
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
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Next</button>
                            <a href="admin_home.php" class="btn btn-primary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>
</div>

<?php
include('master_page/footer.php');
?>