<?php
  include('config.php');
  $query = "SELECT topic_name FROM topic where topic_name not in (SELECT topic_name from result where student_usn = 1)";
  $remaining_test = mysqli_query($con, $query);
?>