<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type= "image/png" href="img/fav_icon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/test.css">
	<title></title>
	<style type="text/css">
  table, th, td {
  border: 3px solid black;
  border-collapse: collapse;
  background-color: white;
  color: black;
}
th, td {
  padding: 25px;
  text-align: left;
  color: black;
}
	</style>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <img src = "img/logo.png" align="left"  style="width: 60%; padding-top: 7px; left: 8px;">
      </div>  
    </div>
  </nav>  
  <div class="container">
  	
    
    <?php
    	include('php/get_questions.php');
        $qno = 1;
         while($que_assoc = $question_table -> fetch_assoc()){
          echo "<div class='que-and-ans'>";
          echo "<div class='question'>";
          echo $qno++.". ".$que_assoc['question'];
          echo "</div>";
          echo "<div class='answer'>";
          $qid = $que_assoc['q_id'];
          echo "<table>
          		<tr>
              		<th>Options</th>
              		<th>Your Answer</th>
              		<th>Correct Answer</th>
              		<th>Answers</th>
            	</tr>
            	<tr>
              		<td>A</td>
              		<td><span class='glyphicon glyphicon-ok' id='you".$qid."optionA' style='display:none;'></span</td>
              		<td><span class='glyphicon glyphicon-ok'  id='CorrectoptionA$qid' style = 'display:none;'></span></td>
                    <td>".$que_assoc['optionA']."</td>
          		</tr>
          			<td>B</td>
              		<td><span class='glyphicon glyphicon-ok' id='you".$qid."optionB' style='display:none; color:red'></span></td>
              		<td><span class='glyphicon glyphicon-ok' id='CorrectoptionB$qid' style='display:none;'></span></td>
              		<td>".$que_assoc['optionB']."</td>
          		</tr>
          		<td>C</td>
              		<td><span class='glyphicon glyphicon-ok' id='you".$qid."optionC' style='display:none;'></span></td>
              		<td><span class='glyphicon glyphicon-ok' id='CorrectoptionC$qid' style='display:none;'></span></td>
              		<td>".$que_assoc['optionC']."</td>
          		</tr>
          			<td>D</td>
              		<td><span class='glyphicon glyphicon-ok' id='you".$qid."optionD' style='display:none;'></span></td>
              		<td><span class='glyphicon glyphicon-ok' id='CorrectoptionD$qid' style='display:none;'></span></td>
              		<td>".$que_assoc['optionD']."</td>
          		</tr>
            </table>";
            $sql_qid ="SELECT `q_id`, `answer` FROM `question` WHERE `q_id` = $qid";
            $res_eveluate = mysqli_query($con,$sql_qid);
            if($eveluated = $res_eveluate -> fetch_assoc()){
              if($_POST['options'.$eveluated['q_id']] == $eveluated['answer']){
                echo "<script>document.getElementById('you".$qid.$_POST['options'.$eveluated['q_id']]."').style.display='block'; </script>";
              }
              echo "<script>document.getElementById('Correct".$eveluated['answer'].$qid."').style.display='block'; </script>";
            }

  }
    

  
    ?>
    

</body>
</html>