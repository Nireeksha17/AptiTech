<?php
session_start();
include 'front.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="icon" type= "image/png" href="img/fav_icon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/result.css">
</head>
<body>
  <div class="container">
  	<table style="margin-top: 5px;width: 1100px; font-family: sans-serif;">
		<tr>
		<th id="score" style="font-size: 25px;"></th>
        <th id ="tot" style="font-size: 25px;"></th>
        <th id="corr" style="font-size: 25px;"></th>
        <th id="unans" style="font-size: 25px;"></th>
		</tr>
		</table>
    <?php

$answered = 0;
$marks_scored = 0;
$qno = 1;
echo "<div id = 'a'></div>";
include 'php/get_questions.php';
include 'php/evaluate.php';
while ($que_assoc = $question_table->fetch_assoc()) {
    echo "<div class='que-and-ans'>";
    echo "<div class='question'><br>";
    echo "<p style='float:left;padding-left:20px;'>" . $qno . ". " . $que_assoc['question'] . "</p>";
    echo "</div>";
    echo "<div class='answer'>";
    $qid = $que_assoc['q_id'];
    echo "
        <br>
        <table style='text-align:center;width:1100px;'>
            <tr>
                <th>Options</th>
                <th>Your Answer</th>
                <th>Correct Answer</th>
                <th>Answers</th>
            </tr>
            <tr>
                <td>A</th>
                <td><span class='glyphicon glyphicon-ok' id='you" . $qid . "optionA' style='display:none;'></span></th>
                <td><span class='glyphicon glyphicon-ok' id='Correct" . $qid . "optionA' style='display:none;'></span></th>
                <td>" . $que_assoc['optionA'] . "</th>
            </tr>
            <tr>
                <td>B</th>
                <td><span class='glyphicon glyphicon-ok' id='you" . $qid . "optionB' style='display:none;'></span></th>
                <td><span class='glyphicon glyphicon-ok' id='Correct" . $qid . "optionB' style='display:none;'></span></th>
                <td>" . $que_assoc['optionB'] . "</th>
            </tr>
            <tr>
                <td>C</th>
                <td><span class='glyphicon glyphicon-ok' id='you" . $qid . "optionC' style='display:none;'></span></th>
                <td><span class='glyphicon glyphicon-ok' id='Correct" . $qid . "optionC' style='display:none;'></span></th>
                <td>" . $que_assoc['optionC'] . "</th>
            </tr>
            <tr>
                <td>D</th>
                <td><span class='glyphicon glyphicon-ok' id='you" . $qid . "optionD' style='display:none;'></span></th>
                <td><span class='glyphicon glyphicon-ok' id='Correct" . $qid . "optionD' style='display:none;'></span></th>
                <td>" . $que_assoc['optionD'] . "</th>
            </tr>
		</table>";
    $q_id = $que_assoc['q_id'];
    $sql_qid = "SELECT `q_id`, `answer` FROM `question` WHERE `topic_id`=$topic_id and `q_id` = $q_id";
    $res_eveluate = mysqli_query($con, $sql_qid);
    if ($eveluated = $res_eveluate->fetch_assoc()) {
        $qno++;
        echo "<script>document.getElementById('Correct" . $qid . "" . $eveluated['answer'] . "').style.display='block'; </script>";
        if (isset($_POST['options' . $eveluated['q_id']])) {
            $answered++;
            echo "<script>document.getElementById('you" . $qid . "" . $_POST['options' . $eveluated['q_id']] . "').style.display='block';
			</script>";
        } else {
            continue;
        }
        if ($_POST['options' . $eveluated['q_id']] == $eveluated['answer']) {
            $marks_scored++;
        }
    }
}
$total_question = $qno - 1;
$unanswered = ($qno - 1) - $marks_scored;
echo "
	<script>document.getElementById('score').innerHTML='Your Score: " . $marks_scored . "';</script>
	<script>document.getElementById('tot').innerHTML='Total question: " . $total_question . "';</script>
	<script>document.getElementById('corr').innerHTML='Answered: " . $answered . "';</script>
	<script>document.getElementById('unans').innerHTML='Wrong/Unanswered: " . $unanswered . "';</script>
	";
include 'php/result_ins.php';
?>
</div>
</body>
</html>