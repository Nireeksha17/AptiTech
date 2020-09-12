<?php
// Start the session
session_start();
include 'navbar.php';
$_SESSION['admin_email'];
$_SESSION['admin_name'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add Topic</title>
    <link rel="icon" href="Images/icon.ico" type="image/x-icon" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/addTopicsStyle.css">
  </head>

  <body>

    <!-- ADD Topic-->
    <p class="topStyle">Add Topic</p>
    <hr class="rounded">
    <div class="addTopic1"><i class="fa fa-plus-circle">Add Topic</i>
      <div class="addTopic">
        <form action="" method="POST" align="center" enctype="multipart/form-data">
          <span class="required">*</span><label for="topicName">Topic Name :</label>
          <input type="text" name="topicName" placeholder="Category Name" pattern="[a-zA-Z ]{3,50}" style="width: 300px"  required><br><br><br>
          <span class="required">*</span><label for="catName">Category :</label>
          <select name="category" style="width: 300px;height: 25px" required>

            <!--PHP code to retrieve categories has Options-->
            <?php
              $conn=mysqli_connect("localhost","root","","aptitech");
              $result="SELECT * FROM category";
              $row=mysqli_query($conn,$result);
              if(mysqli_num_rows($row)>0)
              {
                while($values=$row->fetch_assoc())
                {
                  echo "<option value=".$values["cat_id"].">".$values["cat_name"]."</option>";
                }
              }
              else
              {
                echo "Empty";
              }
            ?>

          </select>
          <br><br><br>
          <span class="required">*</span><label for="catName">Duration :</label>
          <input type="number" name="time" placeholder="In Minutes" min=1 max=300 style="width: 300px"  required><br><br><br>
          <span class="required">*</span><label for="intro">Introduction :  </label>
          <input type="file" id="inputfile" name="filename" required>
          <br><br><br>
          <input class="subbtn2" type="submit"  name="submit" value="Submit">
        </form>
      </div>
    </div>


    <!-- Javascript to make alert box disappear when close button is pressed-->
    <script type="text/javascript">
    function myFunction() {
      document.getElementById("p2").style.display="none";
    }
    </script>
    
    <!-- PHP code to add topic into the database -->
    <?php
    if (isset($_POST["submit"]))
    {
        $conn=mysqli_connect("localhost","root","","aptitech");
        $topicname=$_POST['topicName'];
        $catid=$_POST['category'];
        $time=$_POST['time'];
        $filename=$_FILES['filename']['name'];
        $filetype=$_FILES['filename']['type'];
        $data=addslashes(file_get_contents($_FILES['filename']['tmp_name']));       
        $check="SELECT * FROM topic WHERE topic_name='$topicname'";
        $result=mysqli_query($conn,$check);
        $num=mysqli_num_rows($result);
      if($num>=1)
      {
          echo '<div class="alert" id="p2" style="background-color:rgba(21, 0, 255,0.6);">
          <span class="closebtn" onclick="myFunction()">&times;</span> 
          <strong>Unsuccessful!</strong> Topic already exists.</div>';
      }
      else
      {
        $reg ="INSERT INTO topic(topic_name,cat_id,max_time,intro_name,intro_type,introduction,no_of_questions) values('$topicname','$catid','$time','$filename','$filetype','$data',0)";
      	if(mysqli_query($conn,$reg))
      	{
        		echo '<div class="alert" id="p2">
          <span class="closebtn" onclick="myFunction()">&times;</span> 
          <strong>Success!</strong> Topic added successfully.</div>';
      	}
      }
    }
    ?>

  </body>
</html>
