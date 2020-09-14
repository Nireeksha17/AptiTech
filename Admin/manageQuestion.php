<?php
// Start the session
session_start();
$_SESSION['admin_email'];
$_SESSION['admin_name'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Questions</title>
    <link rel="icon" href="Images/i.ico" type="image/x-icon" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/manageQuestionStyle.css">
  </head>
  <body>

    <!-- Navbar Design -->
    <div class="navbar">
      <p align="center"><img src="Images/aptitech.png"></p>
    </div>
    <br><br><br><br><br><br>

    <!--PHP code to create a session variable for topic_id --> 
    <?php
        if(isset($_POST["manage"]))
        {
          $_SESSION["id"]=$_POST["manage"];
        }
    ?>

    <!--PHP code to retrieve topic details --> 
    <?php
          $conn=mysqli_connect("localhost","root","","aptitech");
          $topicId=$_SESSION["id"];
          $result="SELECT * FROM topic WHERE topic_id='$topicId'";
          $row=mysqli_query($conn,$result);
          $value=$row->fetch_assoc();
          $topicN=$value["topic_name"];
          echo "<table class='mainTable' align='center'>
          <tr>
          <th style='background-color: #005461; padding: 18px 20px;'><i class='fa fa-gear'></i>Manage Questions</th>
          </tr>
          <tr>
          <th style='padding:40px 30px'>
          <table class='customers' align='center'>
          <label for='topicName'>Topic Name :  </label>
          <input type='text' style='width: 300px; color:red;font-size:15px;font-weight:bold' value='$topicN' disabled><br><br>
          <label for='category'>Category :    </label>";
          $id=$value["cat_id"];
          $result2="SELECT * FROM category WHERE cat_id='$id'";
          $row2=mysqli_query($conn,$result2);
          $value2=$row2->fetch_assoc();
          echo "<input type='text' style='width: 200px;color:red;font-size:15px;font-weight:bold' value=".$value2["cat_name"]." disabled><br><br>
          <label for='time'>Duration :       </label>
          <input type='number' style='width: 100px;color:red;font-size:15px;font-weight:bold' value=".$value["max_time"]." disabled><br><br><br><br>
          <button class='btn back' onclick='goback()'><i class='fa fa-arrow-circle-left'></i>Back</button>
          <form action='' method='POST'>
          <button class='btn add' name='add' ><i class='fa fa-plus-circle'></i>Add Question</button>
          </form><br><br><br><br>";
    ?>

    <!-- PHP code to add Questions -->
    <?php
      if(isset($_POST["add"]))
      {
        echo"<form action='' method='POST'  enctype='multipart/form-data'>
             <span class='required'>*</span><label for='question'>Question :  </label>
             <textarea name='question' class='area' rows='8' cols='100' required></textarea><br><br><br><br><br><br><br><br><br>
             <span class='required'>*</span><label for='option1'>Option A :  </label>
             <textarea name='option1' class='area' rows='8' cols='100' required></textarea><br><br><br><br><br><br><br><br><br>
             <span class='required'>*</span><label for='option2'>Option B :  </label>
             <textarea name='option2' class='area' rows='8' cols='100' required></textarea><br><br><br><br><br><br><br><br><br>
             <span class='required'>*</span><label for='option3'>Option C :  </label>
             <textarea name='option3' class='area' rows='8' cols='100' required></textarea><br><br><br><br><br><br><br><br><br>
             <span class='required'>*</span><label for='option4'>Option D :  </label>
             <textarea name='option4' class='area' rows='8' cols='100' required></textarea><br><br><br><br><br><br><br><br><br>
             <span class='required'>*</span><label for='answer'>Answer :  </label>
             <select class='area' name='options' style='width:70px;height:25px'><option value='optionA'>A</option><option value='optionB'>B</option><option value='optionC'>C</option><option value='optionD'>D</option></select><br><br><br>
             <span class='required'>*</span><label for='solution'>Solution :  </label>
             <textarea name='solution' class='area' rows='8' cols='100' required></textarea><br><br><br><br><br><br><br><br><br>
             <input type='submit' name='sub' value='Submit' class='subbtn'></form><br><br><br>
             </th></tr></table></table><br><br><br>";
      }
    ?>

    <!-- Javascript to go to manage topic page when back button is pressed-->
    <script type="text/javascript">
    function goback() {
      document.location='manageTopics.php';
    }
    </script>

    <!-- Javascript to make alert box disappear when close button is pressed-->
    <script type="text/javascript">
    function myFunction() {
      document.getElementById("p2").style.display="none";
    }
    </script>


    <!-- PHP code to add questions into the database -->
    <?php
    if (isset($_POST["sub"]))
    {
        $conn=mysqli_connect("localhost","root","","aptitech");
        $topicId=$_SESSION['id'];
        $question=$_POST['question'];
        $option1=$_POST['option1'];
        $option2=$_POST['option2'];
        $option3=$_POST['option3'];
        $option4=$_POST['option4'];
        $answer=$_POST['options'];
        $solution=$_POST['solution'];
        $check="SELECT * FROM question WHERE topic_id='$topicId' AND question='$question'";
        $result=mysqli_query($conn,$check);
        $num=mysqli_num_rows($result);
      if($num>0)
      {
          echo '<div class="alert2" id="p2" style="background-color:rgba(21, 0, 255,0.6);position:absolute;top:100px;left:10px;width:1460px">
          <span class="closebtn" onclick="myFunction()">&times;</span> 
          <strong>Unsuccessful!</strong> Question already exists.</div>';
      }
      else
      {
        $reg ="INSERT INTO question(topic_id,question,optionA,optionB,optionC,optionD,answer,solution) values('$topicId','$question','$option1','$option2','$option3','$option4','$answer','$solution')";
      	if(mysqli_query($conn,$reg))
      	{
        		echo '<div class="alert2" id="p2" style="position:absolute;top:100px;left:10px;width:1460px">
          <span class="closebtn" onclick="myFunction()">&times;</span> 
          <strong>Success!</strong> Question added successfully.</div>';
      	}
      }
    }
    ?>

    <!-- PHP code to display questions -->
    <?php
        $conn=mysqli_connect("localhost","root","","aptitech");
        $topicId=$_SESSION["id"];
        $result="SELECT * FROM question WHERE topic_id='$topicId'";
        $row=mysqli_query($conn,$result);
        $x=1;
        echo "<table class='mainTable' align='center'>
            <tr>
            <th style='background-color: #005461; padding: 18px 20px;'><i class='fa fa-edit'></i>Questions added</th>
            </tr>";
            if(mysqli_num_rows($row)>0)
            {
              while ($value=$row->fetch_assoc())
               {
                echo"<table class='customers' align='center' style='width:1200px'>
                      <tr><td style='border: 1px solid white;'><form action='' method='POST' >
                      <button style='width:1000px;height:40px ;text-align:left;' value=".$value['q_id']." name='".$value['q_id']."'><i class='fa fa-edit' style='padding-right:10px'></i>Question ".$x."</button></form></td></tr>";
                  if(isset($_POST[$value['q_id']]))
                  {
                    echo"<td style='border: 1px solid white;'><form action='' method='POST'  enctype='multipart/form-data'>
                     <span class='required'>*</span><label for='question'>Question :  </label>
                     <textarea name='question' class='area' rows='8' cols='100' required>".$value['question']."</textarea><br><br><br><br><br><br><br><br><br>
                     <span class='required'>*</span><label for='option1'>Option A :  </label>
                     <textarea name='option1' class='area' rows='8' cols='100' required>".$value['optionA']."</textarea><br><br><br><br><br><br><br><br><br>
                     <span class='required'>*</span><label for='option2'>Option B :  </label>
                     <textarea name='option2' class='area' rows='8' cols='100' required>".$value['optionB']."</textarea><br><br><br><br><br><br><br><br><br>
                     <span class='required'>*</span><label for='option3'>Option C :  </label>
                     <textarea name='option3' class='area' rows='8' cols='100' required>".$value['optionC']."</textarea><br><br><br><br><br><br><br><br><br>
                     <span class='required'>*</span><label for='option4'>Option D :  </label>
                     <textarea name='option4' class='area' rows='8' cols='100' required>".$value['optionD']." </textarea><br><br><br><br><br><br><br><br><br>
                     <span class='required'>*</span><label for='answer'>Answer :  </label>
                     <select class='area' name='options' style='width:70px;height:25px' value=".$value['answer']."  required><option value='optionA'>A</option><option value='optionB'>B</option><option value='optionC'>C</option><option value='optionD'>D</option></select><br><br><br>
                     <span class='required'>*</span><label for='solution'>Solution :  </label>
                     <textarea name='solution' class='area' rows='8' cols='100' required>".$value['solution']." </textarea><br><br><br><br><br><br><br><br><br>
                     <button type='submit' name='update' value=".$value["q_id"]." class='subbtn'>Update</button>
                     </form><form action='' method='POST'>
                    <button class='btn delete' style='position:relative;top:0px;left:280px;width:130px;height:40px' name='delete'  value=".$value["q_id"]."><i class='fa fa-trash' style='padding-right:5px'></i>Delete</button>
                    </form><br><br><br>
                     </td></tr></table>";
                  }
                        $x++;
              }
              echo "</table></table>";
            }
    ?>


    <!-- PHP code to update questions into the database -->
    <?php
    if (isset($_POST["update"]))
    {
        $conn=mysqli_connect("localhost","root","","aptitech");
        $topicId=$_SESSION['id'];
        $qid=$_POST['update'];
        $question=$_POST['question'];
        $option1=$_POST['option1'];
        $option2=$_POST['option2'];
        $option3=$_POST['option3'];
        $option4=$_POST['option4'];
        $answer=$_POST['options'];
        $solution=$_POST['solution'];
        $check="SELECT * FROM question WHERE topic_id='$topicId' AND question='$question'";
        $result=mysqli_query($conn,$check);
        $num=mysqli_num_rows($result);
      if($num>1)
      {
          echo '<div class="alert2" id="p2" style="background-color:rgba(21, 0, 255,0.6);">
          <span class="closebtn" onclick="myFunction()">&times;</span> 
          <strong>Unsuccessful!</strong> Question already exists.</div>';
      }
      else
      {
       
         $reg ="UPDATE question SET question='$question',optionA='$option1',optionB='$option2',optionC='$option3',optionD='$option4',answer='$answer',solution='$solution' WHERE topic_id='$topicId' AND q_id='$qid'";
          if(mysqli_query($conn,$reg))
          {
              echo '<div class="alert2" id="p2">
            <span class="closebtn" onclick="myFunction()">&times;</span> 
            <strong>Success!</strong> Question updated successfully.</div>';
          }
      }
    }
    ?>


    <!-- PHP code to create a confirm box for deleting -->
    <?php
      if (isset($_POST["delete"]))
      {
          $conn=mysqli_connect("localhost","root","","aptitech");
          $delete=$_POST['delete'];
          echo '<div class="box" id="p2">
          <span class="boxbtn" onclick="myFunction()">&times;</span>
          <strong>DELETE</strong><hr>
          <p>Are you sure you want to delete?</p>
          <button class="boxbtn" onclick="myFunction()">Cancel</button>
          <form action="" method="POST"><button class="boxbtn" value='.$delete.' name="confirmDelete">Delete</button>
          </form>
          </div>';
      }
    ?>

    <!-- PHP code to delete category from the list -->
    <?php
      if(isset($_POST["confirmDelete"]))
        {
          $conn=mysqli_connect("localhost","root","","aptitech");
          $deleteId=$_POST['confirmDelete'];
          $result="DELETE FROM question WHERE q_id='$deleteId'";
          if(mysqli_query($conn,$result)==TRUE)
          {
            echo "<script type='text/javascript'>
            document.location = ''; </script>";
          }
        }
    ?>
  <br><br>
  </body>
</html>
