<?php
// Start the session
session_start();
$_SESSION['admin_email'];
$_SESSION['admin_name'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit Topic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/addTopicsStyle.css">
  </head>

  <body>

    <!-- Navbar design  -->
     <div class="navbar" style="height:68px ">
      <p><img src="Images/aptitech.png" class="imgdisplay"></p>
      <a href="adminHomePage.php">Home</a>
      <div class="dropdown">
        <button class="dropbtn">Modules<i class="fa fa-caret-down"></i></button>
        <div class="dropdown-content">
          <a href="manageCategory.php"><i class="fa fa-gear" ></i>Manage Category</a>
          <a href="addCategory.php"><i class="fa fa-plus-circle" ></i>Add Category</a>
          <a href="manageTopics.php"><i class="fa fa-gear" ></i>Manage Topics</a>
          <a href="addTopics.php"><i class="fa fa-plus-circle" ></i>Add Topics</a>
        </div>
      </div> 
      <a href="viewUsers.php">Users</a>
      <a href="viewResults.php">Exam Results</a>
      <div class="dropdown" style="float: right;padding-right: 40px">
        <button class="dropbtn"><i class="fa fa-user" ></i><?php echo $_SESSION['admin_name'];
        ?><i class="fa fa-caret-down" ></i>
        </button>
        <div class="dropdown-content">
          <a href="manageProfile.php">Manage Profile</a>
          <a href="logout.php"> <i class="fa fa-sign-out" ></i>Logout</a>
        </div>
      </div> 
    </div>

    <!--Edit Topic-->
    <p class="topStyle">Edit Topic</p>
    <hr class="rounded">
    <div class="addTopic1">
      <i class="fa fa-edit" style="padding-left:10px;font-size: 20px">Edit Topic</i>
      <div class="addTopic" align="center">
        <form action="" method="POST" align="center">
          <span class="required">*</span><label for="topicName">Topic Name :</label>
          <input type="text" name="topicName" placeholder="Topic Name" pattern="[a-zA-Z ]{3,50}" style="width: 300px"
           value="<?php 
                      if(isset($_POST["edit"]))   //PHP code to retrieve topic name
                      {
                          $conn=mysqli_connect("localhost","root","","aptitech");
                          $topicId=$_POST['edit'];
                          $_SESSION["v"]=$topicId;
                          $result="SELECT topic_name FROM topic WHERE topic_id='$topicId'";
                          $row=mysqli_query($conn,$result);
                          $values=$row->fetch_assoc();
                          echo $values["topic_name"];
                      }
                      ?>" required>
          <br><br><br>
          <span class="required">*</span><label for="catName">Category :</label>
          <select name="category" style="width: 300px;height: 25px" required>

            <!--PHP code to retrieve categories has options-->
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
          <span class="required">*</span><label for="time">Duration :</label>
          <input type="number" name="time" placeholder="In Minutes" min=1 max=300 style="width: 300px" 
          value="<?php
                  $previousId=$_SESSION["v"];   //PHP code to retrieve duration
                  $result="SELECT max_time FROM topic WHERE topic_id='$previousId'";
                  $row=mysqli_query($conn,$result);
                  $values=$row->fetch_assoc();
                  echo (int)$values["max_time"];
                  ?>"  required><br><br>
          <input class="subbtn2" type="submit"  name="submit" value="Submit">
        </form>
      </div>
    </div>

    <!-- Footer-->
    <div class="footer">
      <p>Footer</p>
    </div>
    <br><br>


    <!-- Javascript to make alert box disappear when close button is pressed-->
    <script type="text/javascript">
    function myFunction()
    {
      document.getElementById("p2").style.display="none";
    }
    </script>

    <!-- PHP code to edit Topic list -->
    <?php
      if (isset($_POST["submit"]))
      {
          $conn=mysqli_connect("localhost","root","","aptitech");
          $updatedName=$_POST['topicName'];
          $previousId=$_SESSION["v"];
          $updatedcatId=$_POST['category'];
          $updateTime=$_POST['time'];
          $check="SELECT * FROM topic WHERE topic_name='$updatedName'";
          $result=mysqli_query($conn,$check);
          $num=mysqli_num_rows($result);
        if($num>=1)
        {
            echo '<div class="alert" id="p2" style="background-color:rgba(21, 0, 255,0.6)">
            <span class="closebtn" onclick="myFunction()">&times;</span> 
            <strong>Unsuccessful!</strong> Topic already exists.</div>';
            sleep(0.1);    
        }
        else
        {
         $reg ="UPDATE topic SET topic_name='$updatedName',cat_id='$updatedcatId', max_time='$updateTime' WHERE topic_id='$previousId'";
            if(mysqli_query($conn,$reg))
            {
              session_unset();
               // destroy the session
              session_destroy();
              echo "<script type='text/javascript'>
              document.location = 'manageTopics.php'; </script>";
            }
          }
        }
    ?>
  </body>
</html>
