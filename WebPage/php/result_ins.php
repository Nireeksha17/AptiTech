<?php
include 'config.php';
if (isset($_SESSION)) {
    $exam_date = $_SESSION['start_time'];
    $now = date('Y-m-d H:i:s');
    $time_taken = gmdate("H:i:s", strtotime($now) - strtotime($exam_date));
    $usn = $_SESSION['usn'];
    $topic_name_assoc = mysqli_query($con, "SELECT topic_name FROM topic WHERE topic_id = '$topic_id'")->fetch_assoc();
    $topic_name = $topic_name_assoc['topic_name'];
    $query = "INSERT INTO `result`(`student_usn`, `topic_id`, `topic_name`, `total_marks`, `time_taken`, `exam_date`)
    VALUES ('$usn','$topic_id','$topic_name','$marks_scored','$time_taken','$exam_date')";
    $var = mysqli_query($con, $query);
}
