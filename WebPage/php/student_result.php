<?php

// use function PHPSTORM_META\type;

include('config.php');
  $res_tests_taken = new stdClass();
  if(isset($_SESSION['usn'])){
    $usn = $_SESSION['usn'];
    $que = "SELECT * FROM result WHERE student_usn = '$usn'";
    $res_tests_taken = mysqli_query($con, $que);
  }
?>