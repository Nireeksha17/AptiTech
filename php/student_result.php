<?php
  include('config.php');
  $usn = $row['usn'];
  $que = "SELECT * FROM result WHERE student_usn = $usn";
  $res_tests_taken = mysqli_query($con, $que);
?>