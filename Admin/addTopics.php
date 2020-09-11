<?php
// Start the session
session_start();
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

    <!-- Navbar Design -->
    <div class="navbar" style="height:68px ">
      <p><img src="Images/aptitech.png" class="imgdisplay"></p>
      <a href="adminHomePage.php">Home</a>
      <div class="dropdown">
        <button class="dropbtn">Modules<i class="fa fa-caret-down"></i></button>
        <div class="dropdown-content">
          <a href="manageCategory.php"><i class="fa fa-gear"></i>Manage Category</a>
          <a href="addCategory.php"><i class="fa fa-plus-circle"></i>Add Category</a>
          <a href="manageTopics.php"><i class="fa fa-gear"></i>Manage Topics</a>
          <a href="addTopics.php"><i class="fa fa-plus-circle"></i>Add Topics</a>
        </div>
      </div> 
      <a href="viewUsers.php">Users</a>
      <a href="viewResults.php">Exam Results</a>
      <div class="dropdown" style="float: right;padding-right: 40px">
        <button class="dropbtn"><i class="fa fa-user"></i><?php echo $_SESSION['admin_name'];
        ?><i class="fa fa-caret-down" ></i>
        </button>
        <div class="dropdown-content">
          <a href="manageProfile.php">Manage Profile</a>
          <a href="logout.php"> <i class="fa fa-sign-out"></i>Logout</a>
        </div>
      </div> 
    </div>

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

    <!--Footer-->
    <div style="position: fixed;left: 0;bottom: 0;width: 100%;background-color:#005461;height:30px;color: white;">
      <img src="Images/apti_icon.png" width="28px" align="left" style="padding-left: 60px;">
      <span style="padding-left:200px;font-size:20px;font-style: italic;color: black;font-family:Trebuchet MS,Arial, Helvetica, sans-serif;font-weight: bold;"><i class="fa fa-instagram" style="padding-right:10px;color: white"></i>apti_tech</span>
      <span style="padding-left:200px;font-size:20px;font-style: italic;color: black;font-family:Trebuchet MS,Arial, Helvetica, sans-serif;font-weight: bold;"><i class="fa fa-facebook-official" style="padding-right:10px;color: white"></i>aptitech</span>
      <span style="padding-left:200px;font-size:20px;font-style: italic;color: black;font-family:Trebuchet MS,Arial, Helvetica, sans-serif;font-weight: bold;"><i class="fa fa-envelope" style="padding-right:10px;color: white"></i>aptitech@gmail.com</span>
      <span style="padding-left:200px;font-size:20px;font-style: italic;color: black;font-family:Trebuchet MS,Arial, Helvetica, sans-serif;font-weight: bold;"><i class="fa fa-phone" style="padding-right:10px;color: white"></i>8762840329</span>
    </div>

  </body>
</html>
