<?php

require_once "web_config/config.php";

$branch = "BCA";
$semester = "6";
$date = date('Y-m-d');

 
$sql1 = mysqli_query($conn, "SELECT * FROM exam WHERE branch = '$branch'  AND semester='$semester' AND date='$date'");
while ($row = mysqli_fetch_array($sql1)) {
     $totalMarks = $row['out_of_makes'];
     $startTime = $row['start_time'];
     $endTime = $row['end_time'];

     $sql2 = mysqli_query($conn, "SELECT * FROM mcq_bank WHERE branch = '$branch'  AND semester='$semester' AND is_approved='1'");
     while ($row1 = mysqli_fetch_array($sql2)) {
          $mcq_bank_id = $row1['mcq_bank_id'];
     }

//      $time_pre = microtime(true);

//      $a = new DateTime($endTime);
//      $b = new DateTime($current_time);
//      $interval = $a->diff($b);

//      echo $interval->format("%H:%i:%s");

//      $time_post = microtime(true);
//      $exec_time = $time_post - $time_pre;
}

$today = date("M j, Y");

?>
          
<!-- Display the countdown timer in an element -->
<p id="demo"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $today . " " . $endTime;?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
    document.getElementById("submitExam").click();
  }
}, 1000);
</script>