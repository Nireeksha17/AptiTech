<?php
// Start the session
session_start();
$_SESSION['admin_email'];
$_SESSION['admin_name'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/viewUsersStyle.css">
    <style type="text/css">
      
    </style>
  </head>

  <body>

    <!-- Navbar Design -->
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

    <br><br><br><br>

    <!-- PHP code to retreive student details -->
    <?php 
      $conn = mysqli_connect("localhost","root","","aptitech");
      $x=1;
      $h = "SELECT * FROM student";
      $E = mysqli_query($conn, $h);
      if(mysqli_num_rows($E)>0)
      {
        echo "<table class='mainTable' align='center'>
            <tr>
            <th style='background-color: #005461; padding: 18px 20px;'><i class='fa fa-gear' style='padding-right:10px'></i>User Details</th>
            </tr>
            <tr>
            <th style='padding:40px 30px'>
            <table class='customers' align='center'>
            <tr style='text-align:center;'>
            <th style='text-align:left;width:10px'>Sl.No</th>
            <th >USN</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Department</th>
            <th>Phone Number</th>
            <th>Password</th>
            </th></tr></tr>";
        while($row = $E->fetch_assoc())
        {
         echo "
            <tr style='text-align:center;'>
              <td style='text-align:left;'>".$x."</td>
              <td>".$row["usn"]."</td>
              <td>".$row["name"]."</td>
              <td>".$row["email"]."</td>
              <td>".$row["department"]."</td>
              <td>".$row["mobile_number"]."</td>
              <td>".$row["password"]."</td>
            </tr>";
        $x++;
        }
        echo "</table></table>";
      }

      else
      {
       echo '<div class="alert" id="p2" style="background-color:rgba(21, 0, 255,0.5)">
          <span class="closebtn" onclick="myFunction()">&times;</span> 
          <strong>Info!</strong> Users are not available</div>';
      }
    ?>

    <!-- Javascript to make alert box disappear when close button is pressed-->
    <script type="text/javascript">
    function myFunction() {
      document.getElementById("p2").style.display="none";
    }
    </script>

     <!--Footer-->
    <div class="footer">
      <p>Footer</p>
    </div>
    <br><br>

  </body>
</html>
    