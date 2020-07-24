<?php
  include('config.php');
  $remaining_test = new stdClass();
  if(isset($_SESSION['usn'])){
    $usn = $_SESSION['usn'];
    $query = "SELECT * FROM topic where topic_name not in (SELECT topic_name from result where student_usn = '$usn')";
    $remaining_test = mysqli_query($con, $query);
  }
?>