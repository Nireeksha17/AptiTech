<?php
// Start the session
session_start();
$_SESSION['admin_email'];
$_SESSION['admin_name'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Topic</title>
    <link rel="icon" href="Images/icon.ico" type="image/x-icon" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/manageTopicsStyle.css">
    </head>

  	<body>
    <!-- Navbar design  -->
     <div class="navbar" style="height:68px ">
      <p><img src="Images/aptitech.png" class="imgdisplay"></p>
      <a href="adminHomePage.php">Home</a>
      <div class="dropdown">
        <button class="dropbtn">Modules<i class="fa fa-caret-down"></i></button>
        <div class="dropdown-content">
          <a href="manageCategory.php"><i class="fa fa-gear"></i>Manage Category</a>
          <a href="addCategory.php"><i class="fa fa-plus-circle" ></i>Add Category</a>
          <a href="manageTopics.php"><i class="fa fa-gear" ></i>Manage Topics</a>
          <a href="addTopics.php"><i class="fa fa-plus-circle" ></i>Add Topics</a>
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

    <p class="catStyle">Topic Listing</p>
    <hr class="rounded">
    <br><br>


    <!-- Javascript to make alert box disappear when close button is pressed-->
    <script type="text/javascript">
    function myFunction() {
      document.getElementById("p2").style.display="none";
    }
    </script>


    <!--PHP code to retrieve topic list --> 
    <?php
        $conn=mysqli_connect("localhost","root","","aptitech");
        $result="SELECT * FROM topic";
        $row=mysqli_query($conn,$result);
        if(mysqli_num_rows($row)>0)
        {
          echo "<table class='mainTable' align='center'>
          <tr>
          <th style='background-color: #005461; padding: 18px 20px;'><i class='fa fa-gear'></i>Topic Listing</th>
          </tr>
          <tr>
          <th style='padding:40px 30px'>
          <table class='customers' align='center'>
          <tr>
          <th style='text-align:left;'>Topic Name</th>
          <th style='text-align:center;'>Category</th>
          <th style='text-align:center;'>Introduction</th>
          <th style='text-align:center;'>Duration</th>
          <th style='text-align:center;'>Questions</th>
          <th style='text-align:center;'>Action</th>
          <tr>";
          while($values=$row->fetch_assoc())
          {
            $id=$values["cat_id"];
            $result2="SELECT * FROM category WHERE cat_id='$id'";
            $row2=mysqli_query($conn,$result2);
            echo "<tr>
            <td>".$values["topic_name"]."</td>";
            $values2=$row2->fetch_assoc();
            echo "<td style='text-align:center;'>".$values2["cat_name"]."</td>
            <td style='text-align:center;'>
            <form action='demo_file.php' method='POST'><button class='pdf' name='btn' value=".$values["topic_id"]."><i class='fa fa-file-pdf-o'></i>PDF</button></form></td>
            <td style='text-align:center;'>".$values["max_time"]."mins</td>
            <td style='text-align:center;'>".$values["no_of_questions"]."</td>
            <td>
            <form action='manageQuestion.php' method='POST'>
            <button class='btn2 manage2' name='manage' value=".$values["topic_id"]."><i class='fa fa-gear'></i>Manage Questions</button></form>
            <form action='editTopic.php' method='POST'>
            <button class='btn2 edit2' name='edit' value=".$values["topic_id"]."><i class='fa fa-edit' ></i>Edit</button></form>
            <form action='' method='POST'>
            <button class='btn2 delete2' name='delete'  value=".$values["topic_id"]."><i class='fa fa-trash'></i>Delete</button>
            </form></td>
            </tr>";
          }
          echo "</table></th></tr></table>";
        }
        else
        {
          echo '<div class="alert" id="p2" style="background-color:rgba(21, 0, 255,0.6)">
          <span class="closebtn" onclick="myFunction()">&times;</span> 
          <strong>Info!</strong> Topic field is Empty.</div>';
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
          $deleteName=$_POST['confirmDelete'];
          $result="DELETE FROM topic WHERE topic_id='$deleteName'";
          if(mysqli_query($conn,$result)==TRUE)
          {
            echo "<script type='text/javascript'>
            document.location = ''; </script>";
          }
        }
    ?>
    <br><br><br><br>

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
