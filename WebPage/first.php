<?php

session_start();
if (!isset($_SESSION) || !isset($_POST['submit'])) {
    echo "
    <script>
    alert('Please login to take test!');
    window.location = 'home.php';
    </script>
    ";
}
  
 /* $link = mysqli_connect("localhost","root","");
  mysqli_select_db($link,"aptitech");
  $duration = "";
  $res = mysqli_query($link,"select * from duration");
  while($row = mysqli_fetch_array($res))
  {
    $duration = $row["duration"];
  }
  $_SESSION["duration"] = $duration;
  $_SESSION["start_time"] = date("y-m-d H:i:s");
  $end_time = date('y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes', strtotime($_SESSION["start_time"])));

  $_SESSION["end_time"] = $end_time;

?>*/
//$_SESSION['start_time'] = date('Y-m-d H:i:s');
/*$link = mysqli_connect("localhost","root","");
  mysqli_select_db($link,"aptitech");
  $duration = "";
  $res = mysqli_query($link,"select * from topic where topic_id = $topic_id");*/
  include 'php/get_questions.php';
  //while($row = mysqli_fetch_array($res))
  $query1 = "SELECT * FROM topic WHERE topic_id = $topic_id";
    $question_table1 = mysqli_query($con, $query1);
  $max_time = "";
  while($row = $question_table1->fetch_assoc())
  {
    $max_time = $row['max_time'];
    
  }
  $_SESSION["max_time"] = $max_time;
  $_SESSION["start_time"] = date("y-m-d H:i:s");
  $end_time = date('y-m-d H:i:s', strtotime('+'.$_SESSION["max_time"].'minutes', strtotime($_SESSION["start_time"])));

  $_SESSION["end_time"] = $end_time;
  ?>
<script type="text/javascript">
window.location = "test.php";
</script>