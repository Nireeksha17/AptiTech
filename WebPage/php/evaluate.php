<?php
include 'config.php';
if (isset($_POST['submit'])) {
    $sql_qid = "SELECT `q_id`, `answer` FROM `question` WHERE `topic_id` = $topic_id";
    $res_eveluate = mysqli_query($con, $sql_qid);
}
