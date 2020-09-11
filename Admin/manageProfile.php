<?php
// Start the session
session_start();
$_SESSION['admin_email'];
$_SESSION['admin_name'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Profile</title>
    <link rel="icon" href="Images/icon.ico" type="image/x-icon" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/manageProfileStyle.css">
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
        <button class="dropbtn"><i class="fa fa-user" ></i><?php echo $_SESSION['admin_name'];
        ?><i class="fa fa-caret-down" ></i>
        </button>
        <div class="dropdown-content">
          <a href="manageProfile.php">Manage Profile</a>
          <a href="logout.php"> <i class="fa fa-sign-out" ></i>Logout</a>
        </div>
      </div> 
    </div>


     <!-- Javascript to make alert box disappear when close button is pressed-->
    <script type="text/javascript">
    function myFunction() {
      document.getElementById("p2").style.display="none";
    }
    </script>

    <br><br>


    <!-- PHP code to edit admin details -->

    <?php
      $adminEmail=$_SESSION['admin_email'];
      $conn=mysqli_connect("localhost","root","","aptitech");
      $query = "SELECT * FROM admin WHERE admin_email='$adminEmail'";
      $row=mysqli_query($conn,$query);
      $values=$row->fetch_assoc();
      $name=$values['admin_name'];
      if($values["admin_email"]=="aptitech@gmail.com")
      {
        
        echo"<div align='center'>
            <p class='information'><i class='fa fa-gear'></i>Profile</p></div>";
        echo "<br>";
        echo "<form action='' method='POST'><div align='center' class='inform'>
              <i class='fa fa-user'></i>
              <input type='text' name='name' value='$name' required><br><br><br>
              <i class='fa fa-envelope' ></i>
              <input type='email' name='email' value=".$values['admin_email']." required><br><br><br>
              <i class='fa fa-key'></i>
              <input type='text' name='password' value=".$values['admin_password']." required>
              <input type='submit' name='submit' class='subbtn'  value='UPDATE' ></div></form>";

        echo "<form action='' method='POST'><button name='admin' class='subbtn2' ><i class='fa fa-gear' ></i>Manage Admins</button></form>";
      }

      else
      {
        echo"<br><br><div align='center'>
            <p class='information' ><i class='fa fa-gear' ></i>Profile</p></div>";
        echo "<br><br>";
        echo "<div align='center' style='font-size:20px;' class='inform'>
              <i class='fa fa-user' i></i>
              <input type='text' name='name'  value='$name'  disabled><br><br><br>
              <i class='fa fa-envelope'></i>
              <input type='email' name='email' value=".$values['admin_email']."   disabled><br><br><br>
              <i class='fa fa-key'></i>
              <input type='text' name='password' value=".$values['admin_password']."   disabled></div>";
      }
      
    ?>

    <br><br><br><br><br><br><br><br><br><br><br><br>


    <!-- PHP code to update faculty details -->
    <?php
      if (isset($_POST["admin"]))
      {
        $conn=mysqli_connect("localhost","root","","aptitech");
        $s=$_SESSION['admin_email'];
        $result="SELECT * FROM admin WHERE admin_email!='$s'";
        $row=mysqli_query($conn,$result);
        if(mysqli_num_rows($row)>0)
        {
          echo "<table class='mainTable'  align='center'>
          <tr>
          <th style='background-color: #005461; padding: 18px 20px;'><i class='fa fa-gear' ></i>Manage Admins</th>
          </tr>
          <tr>
          <th style='padding:40px 30px;'>
          <table class='customers' align='center'>
          <tr>
          <th style='text-align:center;'>Name</th>
          <th style='text-align:center;'>E-mail</th>
          <th style='text-align:center;'>Password</th>
          <th style='text-align:center;'>Action</th>
          <tr>";
          while($values=$row->fetch_assoc())
          {
            $name=$values['admin_name'];
            echo "<tr>
            <form action='' method='POST'>
            <td ><input type='text' name='name'  value='$name' class='manage' required></td>
            <td ><input type='email' name='email'  value=".$values['admin_email']."  class='manage' required></td>
            <td ><input type='text' name='password'  value=".$values['admin_password']." class='manage' required></td>
            <td align='center'><input type='submit' name='update' class='subbtn3'  value='UPDATE'>
            <button class='subbtn4' name='delete' value=".$values['admin_email']." formaction=''><i class='fa fa-trash'></i>Delete</button></td>
            </form>
            </tr>";
          }
          echo "</table></th></tr></table><br><br>";
          echo "<form action='' method='POST'  align='center'><button name='addadmin' class='subbtn5'><i class='fa fa-plus' ></i>Add Admin</button></form>";
        }
        else
        {
          echo '<div class="alert" id="p2" style="background-color:rgba(21, 0, 255,0.5)">
          <span class="closebtn" onclick="myFunction()">&times;</span> 
          <strong>Info!</strong> Admins are not available</div><br><br><br><br><br><br>';

          echo "<form action='' method='POST' align='center'><button name='addadmin' class='subbtn5'><i class='fa fa-plus'></i>Add Admin</button></form>";
        }
      }
    ?>


    <!-- PHP code to update admin details -->
    <?php
      if (isset($_POST["submit"]))
      {
          $conn=mysqli_connect("localhost","root","","aptitech");
          $updatedName=$_POST['name'];
          $mail=$_POST['email'];
          $pass=$_POST['password'];
          $check="SELECT * FROM admin WHERE admin_email='$mail' OR admin_password='$pass'";
          $result=mysqli_query($conn,$check);
          $num=mysqli_num_rows($result);
         if($num>1)
        {
           echo '<div class="alert" id="p2" style="background-color:rgba(21, 0, 255,0.6)">
            <span class="closebtn" onclick="myFunction()">&times;</span> 
            <strong>Info!</strong> Email/Password already exists.</div>';
        }
        else
        {
         $reg ="UPDATE admin SET admin_email='$mail',admin_name='$updatedName', admin_password='$pass' WHERE admin_email='$mail'";
            if(mysqli_query($conn,$reg))
            {
              echo '<div class="alert" id="p2">
            <span class="closebtn" onclick="myFunction()">&times;</span> 
            <strong>Successful!</strong> Details Updated</div>';
            }
          }
        }
    ?>



    <!-- PHP code to update faculty details -->
    <?php
      if (isset($_POST["update"]))
      {
          $conn=mysqli_connect("localhost","root","","aptitech");
          $updatedName=$_POST['name'];
          $mail=$_POST['email'];
          $pass=$_POST['password'];
          $check="SELECT * FROM admin WHERE admin_email='$mail' OR admin_password='$pass'";
          $result=mysqli_query($conn,$check);
          $num=mysqli_num_rows($result);
        if($num>1)
        {
           echo '<div class="alert" id="p2" style="background-color:rgba(21, 0, 255,0.6)">
            <span class="closebtn" onclick="myFunction()">&times;</span> 
            <strong>Info!</strong> Email/Password already exists.</div>';
        }
        else
        {
         $reg ="UPDATE admin SET admin_email='$mail',admin_name='$updatedName', admin_password='$pass' WHERE admin_email='$mail'";
            if(mysqli_query($conn,$reg))
            {
              echo '<div class="alert" id="p2">
            <span class="closebtn" onclick="myFunction()">&times;</span> 
            <strong>Successful!</strong> Details Updated</div>';
            }
          }
        }
    ?>


    <!-- PHP code to add new admins-->
    <?php
      if(isset($_POST["addadmin"]))
          {
              echo "<div align='center'>
              <p class='information'><i class='fa fa-edit' style='padding-right:10px'></i>Admin</p></div>
              <form action='' method='POST'><div align='center' class='inform'>
              <i class='fa fa-user' ></i>
              <input type='text' name='name'  required><br><br><br>
              <i class='fa fa-envelope'></i>
              <input type='email' name='email' required><br><br><br>
              <i class='fa fa-key'></i>
              <input type='text' name='password'  required><br><br><br>
              <input type='submit' name='new' class='subbtn6' value='ADD' ><input type='submit' name='cancel' class='subbtn7'  value='Cancel' ></form>";
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
          $result="DELETE FROM admin WHERE admin_email='$deleteId'";
          if(mysqli_query($conn,$result)==TRUE)
          {
            echo "<script type='text/javascript'>
            document.location = ''; </script>";
          }
        }
    ?>

    <!-- PHP code to update faculty details -->
    <?php
      if (isset($_POST["new"]))
      {
          $conn=mysqli_connect("localhost","root","","aptitech");
          $updatedName=$_POST['name'];
          $mail=$_POST['email'];
          $pass=$_POST['password'];
          $check="SELECT * FROM admin WHERE admin_email='$mail' OR admin_password='$pass'";
          $result=mysqli_query($conn,$check);
          $num=mysqli_num_rows($result);
        if($num >=1)
        {
           echo '<div class="alert" id="p2" style="background-color:rgba(21, 0, 255,0.6)">
            <span class="closebtn" onclick="myFunction()">&times;</span> 
            <strong>Info!</strong> Email/Password already exists.</div>';
        }
        else
        {
         $reg ="INSERT INTO admin(admin_email,admin_name,admin_password) values('$mail','$updatedName','$pass')";
            if(mysqli_query($conn,$reg))
            {
              echo '<div class="alert" id="p2">
            <span class="closebtn" onclick="myFunction()">&times;</span> 
            <strong>Successful!</strong> Details Updated</div>';
            }
          }
        }
    ?>

    <br><br><br><br><br>

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
    