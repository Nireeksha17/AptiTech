<!DOCTYPE html>
<html>
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

    <!--Footer-->
    <div style="position: fixed;left: 0;bottom: 0;width: 100%;background-color:#005461;height:30px;color: white;">
      <img src="Images/apti_icon.png" width="28px" align="left" style="padding-left: 60px;">
      <span style="padding-left:10%;font-size:20px;font-style: italic;color: black;font-family:Trebuchet MS,Arial, Helvetica, sans-serif;font-weight: bold;"><i class="fa fa-instagram" style="padding-right:10px;color: white"></i>apti_tech</span>
      <span style="padding-left:10%;font-size:20px;font-style: italic;color: black;font-family:Trebuchet MS,Arial, Helvetica, sans-serif;font-weight: bold;"><i class="fa fa-facebook-official" style="padding-right:10px;color: white"></i>aptitech</span>
      <span style="padding-left:10%;font-size:20px;font-style: italic;color: black;font-family:Trebuchet MS,Arial, Helvetica, sans-serif;font-weight: bold;"><i class="fa fa-envelope" style="padding-right:10px;color: white"></i>aptitech@gmail.com</span>
      <span style="padding-left:10%;font-size:20px;font-style: italic;color: black;font-family:Trebuchet MS,Arial, Helvetica, sans-serif;font-weight: bold;"><i class="fa fa-phone" style="padding-right:10px;color: white"></i>8762840329</span>
    </div>
</body>
</html>