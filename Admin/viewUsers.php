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
    <title>Users</title>
    <link rel="icon" href="Images/i.ico" type="image/x-icon" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/viewUsersStyle.css">
    <style type="text/css">
      
    </style>
  </head>

  <body>

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

    <br><br><br><br><br>

  </body>
</html>
    