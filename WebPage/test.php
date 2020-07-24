<!DOCTYPE html>
<html lang="en">
<head>
   <title>Document</title>
  <link rel="icon" type= "image/png" href="img/fav_icon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  
  
  <link rel="stylesheet" href="css/test.css">
  <style type="text/css">
    .timer{
      margin-left: 20px;
      padding :30px;
      background-color: #005461;
      color: red;
      width:100px;
      font-weight: 30px;
      font-size : 20px;
      text-align: center;
      border-radius: 8px;

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
  <div id = "response" class="timer"></div>
  <div class="container">
    <form action="result_gannu.php" method="post">
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
          echo "<input type='radio' name='options$qid' id='optionA' value = 'optionA'>".$que_assoc['optionA']."<br>";
          echo "<input type='radio' name='options$qid' id='optionB' value = 'optionB'>".$que_assoc['optionB']."<br>";
          echo "<input type='radio' name='options$qid' id='optionC' value = 'optionC'>".$que_assoc['optionC']."<br>";
          echo "<input type='radio' name='options$qid' id='optionD' value = 'optionD'>".$que_assoc['optionD']."<br>";
          echo "</div>";
          echo "</div>";
        }
      ?>
      
      <button type="submit" name="sub_btn" id="sub-btn">Submit</button>
      
    </form>
  </div>
  <?php
session_start();

?>


<script type="text/javascript">
setInterval(function()
{
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","response.php",false);
  xmlhttp.send(null);
  document.getElementById("response").innerHTML = xmlhttp.responseText;
},1000);
</script>
  

</body>
</html>