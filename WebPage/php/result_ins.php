<?php
  include ('config.php');
  if(isset($_SESSION)){
    $exam_date = $_SESSION['start_time'];
    $now = date('Y-m-d H:i:s');
    $time_taken = gmdate("H:i:s", strtotime($now) - strtotime($exam_date));
    $usn = $_SESSION['usn'];
    $query = "INSERT INTO `result`(`student_usn`, `topic_id`, `total_marks`, `time_taken`, `exam_date`) VALUES ('$usn',$topic_id,$sum,'$time_taken','$exam_date')";
    $var = mysqli_query($con, $query);
    var_dump($var);
  }
  

?>