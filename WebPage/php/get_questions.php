<?php
include 'php/config.php';
if (isset($_SESSION)) {
    if(isset($_SESSION['submit'])){
        $_POST['submit'] = $_SESSION['submit'];
    }
    $cat_topic_arr = explode('-', $_POST['submit']);
    $topic_id = $cat_topic_arr[1];
    $query = "SELECT * FROM question WHERE topic_id = $topic_id";
    $question_table = mysqli_query($con, $query);
    
}
