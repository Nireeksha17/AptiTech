<?php
  include('config.php');
  if(isset($_POST['sub_btn'])){
    $sql_qid ="SELECT `q_id`, `answer` FROM `question` WHERE `topic_id` = 1";
    $res_eveluate = mysqli_query($con,$sql_qid);
    while($eveluated = $res_eveluate -> fetch_assoc()){
      if($_POST['options'.$eveluated['q_id']] == $eveluated['answer']){
        echo "Right <br>";
      }
      else
        echo "Phatom <br>";

    }
    echo $eveluated['q_id'];

  }?>