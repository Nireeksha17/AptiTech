<?php
  include('php/config.php');
  $query = "SELECT * FROM question WHERE topic_id = 1";
  $question_table = mysqli_query($con, $query);
  