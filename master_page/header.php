<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

     <title><?php $title ?></title>

     <style>
          @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

          label.box {
               display: flex;
               margin-top: 10px;
               padding: 10px 12px;
               border-radius: 5px;
               cursor: pointer;
               border: 1px solid #ddd
          }

          <?php
          if ($title == "Exam") {
               for ($i = 1; $i <= $totalMarks; $i++) {

                    echo "
#one$i:checked~label.first,
#two$i:checked~label.second,
#three$i:checked~label.third,
#four$i:checked~label.forth,
#five:checked~label.fifth,
#six:checked~label.sixth,
#seven:checked~label.seveth,
#eight:checked~label.eighth {
    border-color: #8e498e
}

#one$i:checked~label.first .circle,
#two$i:checked~label.second .circle,
#three$i:checked~label.third .circle,
#four$i:checked~label.forth .circle,
#five:checked~label.fifth .circle,
#six:checked~label.sixth .circle,
#seven:checked~label.seveth .circle,
#eight:checked~label.eighth .circle {
    border: 6px solid #8e498e;
    background-color: #fff
}
";
               }
          }
          ?>label.box:hover {
               background: #d5bbf7
          }

          label.box .course {
               display: flex;
               align-items: center;
               width: 100%
          }

          label.box .circle {
               height: 22px;
               width: 22px;
               border-radius: 50%;
               margin-right: 15px;
               border: 2px solid #ddd;
               display: inline-block
          }

          input[type="radio"] {
               display: none
          }
     </style>

</head>

<body style="min-height: 100vh;">
     <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <div class="container-fluid">
               <?php
               if (isset($_SESSION['admin_email'])) { // means user is logged in
               ?>
                    <a class="navbar-brand" href="admin_home.php">Online Exam</a>
               <?php
               } else if (isset($_SESSION['staff_email'])) {
               ?>
                    <a class="navbar-brand" href="staff_home.php">Online Exam</a>
               <?php
               } else if (isset($_SESSION['student_email'])) {
               ?>
                    <a class="navbar-brand" href="student_home.php">Online Exam</a>
               <?php
               } else {
               ?>
                    <a class="navbar-brand" href="index.php">Online Exam</a>
               <?php
               }
               ?>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                         <li class="nav-item">
                              <?php
                              if ($title == "Home" || $title == "Welcome") {
                              ?>
                                   <?php
                                   if (isset($_SESSION['admin_email'])) { // means user is logged in
                                   ?>
                                        <a class="nav-link active" aria-current="page" href="admin_home.php">Home</a>
                                   <?php
                                   } else if (isset($_SESSION['staff_email'])) {
                                   ?>
                                        <a class="nav-link active" aria-current="page" href="staff_home.php">Home</a>
                                   <?php
                                   } else if (isset($_SESSION['student_email'])) {
                                   ?>
                                        <a class="nav-link active" aria-current="page" href="student_home.php">Home</a>
                                   <?php
                                   } else {
                                   ?>
                                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                                   <?php
                                   }
                                   ?>
                              <?php
                              } else {
                              ?>
                                   <?php
                                   if (isset($_SESSION['admin_email'])) { // means user is logged in
                                   ?>
                                        <a class="nav-link" aria-current="page" href="admin_home.php">Home</a>
                                   <?php
                                   } else if (isset($_SESSION['staff_email'])) {
                                   ?>
                                        <a class="nav-link" aria-current="page" href="staff_home.php">Home</a>
                                   <?php
                                   } else if (isset($_SESSION['student_email'])) {
                                   ?>
                                        <a class="nav-link" aria-current="page" href="student_home.php">Home</a>
                                   <?php
                                   } else {
                                   ?>
                                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                                   <?php
                                   }
                                   ?>
                              <?php
                              }
                              ?>
                         </li>
                         <li class="nav-item">
                              <?php
                              if ($title == "FAQ") { // means user is logged in
                              ?>
                                   <a class="nav-link active" href="faq.php">FAQ</a>
                              <?php
                              } else {
                              ?>
                                   <a class="nav-link" href="faq.php">FAQ</a>
                              <?php
                              }
                              ?>
                         </li>
                         <?php
                         if (isset($_SESSION['admin_email']) || isset($_SESSION['staff_email']) || isset($_SESSION['student_email'])) { // means user is logged in
                         } else {
                         ?>
                              <li class="nav-item dropdown">
                                   <?php
                                   if ($title == "Admin Log In" || $title == "Staff Log In" || $title == "Student Log In") { // means user is logged in
                                   ?>
                                        <a class="nav-link dropdown-toggle active" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                             Log In
                                        </a>
                                   <?php
                                   } else {
                                   ?>
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                             Log In
                                        </a>
                                   <?php
                                   }
                                   ?>
                                   <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                        <li><a class="dropdown-item" href="login_admin.php">Admin</a></li>
                                        <li><a class="dropdown-item" href="login_staff.php">Staff</a></li>
                                        <li><a class="dropdown-item" href="login_student.php">Student</a></li>
                                   </ul>
                              </li>
                         <?php
                         }
                         ?>
                    </ul>
                    <?php
                    if (isset($_SESSION['admin_email']) || isset($_SESSION['staff_email']) || isset($_SESSION['student_email'])) { // means user is logged in
                    ?>
                         <a href="logout.php" class="btn btn-danger" type="submit">Log Out</a>
                    <?php
                    }
                    ?>
               </div>
          </div>
     </nav>