<?php
  include('config.php');
  $t_id = $test_assoc['topic_id'];
  $query = "SELECT * FROM topic WHERE topic_id = $t_id";
  $topic_name = mysqli_query($con, $query) -> fetch_assoc();
?>