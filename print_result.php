<?php

require('vendor/autoload.php');
require_once "web_config/config.php";

$branch = $_GET["branch"];
$semester = $_GET["semester"];
$date = $_GET["date"];

$html = '

<div style="margin-top: 15px; text-align: center; display: flex; justify-content: space-around;">
     <h3 style="text-align: center; display: flex;">Branch: ' . $branch.'</h3>
     <h3 style="text-align: center; display: flex;">Semester: ' . $semester.'</h3>
</div>

                    <div>
                         <table width="100%" style="border-collapse: collapse;">';

              
                              $sql4 = "SELECT * FROM results WHERE branch='$branch' AND semester='$semester' AND date='$date'";
                              $result4 = mysqli_query($conn, $sql4);
                              if (mysqli_num_rows($result4) > 0) {
                                   while ($row4 = mysqli_fetch_array($result4)) {
                                        
                                        $subject2 = $row4['subject'];
                                        $totalMarks2 = $row4['totalMarks'];
                                   }
          

                         $html .= '<tbody>
                                   <tr style="padding: 10px; border: 1px solid;">
                                        <th width="10%" style="padding: 10px; border: 1px solid;">Roll No.</th>
                                        <th width="10%" style="padding: 10px; border: 1px solid;">Name</th>
                                        <th width="10%" style="padding: 10px; border: 1px solid;">Subject Name</th>
                                        <th width="10%" style="padding: 10px; border: 1px solid;">Marks Scored</th>
                                        <th width="10%" style="padding: 10px; border: 1px solid;">Total Marks</th>
                                   </tr>';

                                   
                                   $sql1 = mysqli_query($conn, "SELECT * FROM student WHERE branch='$branch' AND semester='$semester' ORDER BY roll_no");
                                   while ($row = mysqli_fetch_array($sql1)) {
                                        $roll_no =  $row['roll_no'];
                                        $fname = $row['name'];
                                        $sql3 = "SELECT * FROM results WHERE branch='$branch' AND semester='$semester' AND date='$date' AND roll_no='$roll_no';";
                                        $result3 = mysqli_query($conn, $sql3);

                                        if (mysqli_num_rows($result3) > 0) {
                                             while ($row3 = mysqli_fetch_assoc($result3)) {

                                                  $roll_no2 = $row3['roll_no'];
                                                  $fname3 = $row3['name'];
                                                  $marks = $row3['marks'];
                                                  $subject = $row3['subject'];
                                                  $semester3 = $row3['semester'];
                                                  $totalMarks = $row3['totalMarks'];
                                             }

                                  

                                   $html .= '<tr style="padding: 10px; border: 1px solid;">
                                             <td style="padding: 10px; border: 1px solid; text-align: center;">' . $roll_no . '</td>
                                             <td style="padding: 10px; border: 1px solid; text-align: center;">' . $fname3 . '</td>
                                             <td style="padding: 10px; border: 1px solid; text-align: center;">' . $subject. '</td>
                                             <td style="padding: 10px; border: 1px solid; text-align: center;">' . $marks. '</td>
                                             <td style="padding: 10px; border: 1px solid; text-align: center;">' . $totalMarks. '</td>
                                        </tr>';
                                  

                                        } else {
                                   
                                            $html .= '<tr style="padding: 10px; border: 1px solid; background-color: #f8d7da;">
                                             <td style="padding: 10px; border: 1px solid; text-align: center;">' . $roll_no. '</td>
                                             <td style="padding: 10px; border: 1px solid; text-align: center;">' . $fname. '</td>
                                             <td style="padding: 10px; border: 1px solid; text-align: center;">' . $subject2. '</td>
                                             <td style="padding: 10px; border: 1px solid; text-align: center;">' . "Absent". '</td>
                                             <td style="padding: 10px; border: 1px solid; text-align: center;">' . $totalMarks2. '</td>
                                        </tr>';

                                   
                                        }
                                   }
                              } else {

                                 $html .= '<div class="center text-center"><h3>No Exam</h3></div>';

                              }
                              $html .= '</tbody>
                         </table>
                    </div>';

// echo $html;

$mpdf = new \Mpdf\Mpdf();
$mpdf -> WriteHTML($html);
$file = time().'.pdf';
$mpdf -> Output($file,'D');
?>