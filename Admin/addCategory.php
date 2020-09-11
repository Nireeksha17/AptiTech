<?php
// Start the session
session_start();
$_SESSION['admin_email'];
$_SESSION['admin_name'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add Category</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/addCategoryStyle.css">
  </head>

  <body>

    <!-- Navbar Design -->
     <div class="navbar" style="height:68px">
      <p><img src="Images/aptitech.png" class="imgdisplay"></p>
      <a href="adminHomePage.php">Home</a>
      <div class="dropdown">
        <button class="dropbtn">Modules<i class="fa fa-caret-down"></i></button>
        <div class="dropdown-content">
          <a href="manageCategory.php"><i class="fa fa-gear"></i>Manage Category</a>
          <a href="addCategory.php"><i class="fa fa-plus-circle"></i>Add Category</a>
          <a href="manageTopics.php"><i class="fa fa-gear"></i>Manage Topics</a>
          <a href="addTopics.php"><i class="fa fa-plus-circle" ></i>Add Topics</a>
        </div>
      </div> 
      <a href="viewUsers.php">Users</a>
      <a href="viewResults.php">Exam Results</a>
      <div class="dropdown" style="float: right;padding-right: 40px">
        <button class="dropbtn"><i class="fa fa-user"></i><?php echo $_SESSION['admin_name'];
        ?><i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="manageProfile.php">Manage Profile</a>
          <a href="logout.php"> <i class="fa fa-sign-out"></i>Logout</a>
        </div>
      </div> 
    </div>

    
    <!-- ADD Category-->
    <p class="catStyle">Add Category</p>
    <hr class="rounded">
    <div class="addCategory1"><i class="fa fa-plus-circle">Add Category</i>
      <div class="addCategory" align="center">
        <form action="" method="POST">
          <span class="required">*</span><label for="catName">Category Name:</label>
          <input type="text" name="catName" placeholder="Category Name" pattern="[a-zA-Z ]{3,50}" title="Three or more alphabets" style="width: 300px"  required><br><br><br><br><br>
          <input class="subbtn2"  type="submit"  name="submit" value="Submit">
        </form>
      </div>
    </div>

    <!--Footer-->
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


    <!-- PHP code to add category into the database -->
    <?php
    if (isset($_POST["submit"]))
    {
        $conn=mysqli_connect("localhost","root","","aptitech");
        $catname=$_POST['catName'];
        $check="SELECT * FROM category WHERE cat_name='$catname'";
        $result=mysqli_query($conn,$check);
        $num=mysqli_num_rows($result);
      if($num>=1)
      {
          echo '<div class="alert" id="p2" style="background-color:rgba(21, 0, 255,0.6);">
          <span class="closebtn" onclick="myFunction()">&times;</span> 
          <strong>Unsuccessful!</strong> Category already exists.</div>';
      }
      else
      {
        $reg ="INSERT INTO category(cat_name) values('$catname')";
      	if(mysqli_query($conn,$reg))
      	{
        		echo '<div class="alert" id="p2">
          <span class="closebtn" onclick="myFunction()">&times;</span> 
          <strong>Success!</strong> Category added successfully.</div>';
      	}
      }
    }
    ?>

  </body>
</html>
