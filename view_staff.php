<?php

$title = "View Students";
require_once "web_config/config.php";
include('master_page/header.php');

function function_alert($message)
{
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

if (isset($_SESSION['added'])) {
    function_alert("Staff added successfuly.");
    unset($_SESSION['added']);
}
?>

<div style="margin-top: 15px;">
    <h3 style="text-align: center">Staff Details</h3>
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
                                <th width="17%" scope="col">Name</th>
                                <th width="19%" scope="col">Email</th>
                                <th width="11%" scope="col">Number</th>
                                <th width="13%" scope="col">Address</th>
                                <th width="10%" scope="col">Branch</th>
                                <th width="15%" scope="col">Remove</th>
                            </tr>
                            <?php
                            $sql1 = mysqli_query($conn, "SELECT * FROM faculty");
                            while ($row = mysqli_fetch_array($sql1)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['phone'] ?></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <td><?php echo $row['branch'] ?></td>
                                    <td><button type="button" class="btn btn-danger">Remove</button></td>
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