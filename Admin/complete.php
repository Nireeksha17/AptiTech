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
    <title>Result</title>
    <link rel="icon" href="Images/icon.ico" type="image/x-icon" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/viewResultsStyle.css">
  </head>
    <body>
    <?php
        $con =mysqli_connect("localhost","root","")or die("unable to   connect");
        mysqli_select_db($con,'aptitech');
         $usn = $_POST['view-details'];
         $query1 = "select * from result where student_usn = '$usn' ";
         $query2 = "select * from student where usn = '$usn' ";
         $tdata = mysqli_query($con,$query1);
         $tdata1 = mysqli_query($con,$query2);
         $r = mysqli_fetch_array($tdata1);
         $sname=$r['name'];
         echo "<br><br><br><br><table class='mainTable' align='center'>
              <tr>
              <th align='center' style='background-color: #005461; padding: 18px 20px;'>" .$sname. " - " .$usn. "</th>
              </tr>
              <tr>
              <th style='padding:40px 30px'>
              <table class='customers' align='center'>
              <tr>
              <th style='text-align:center;'>Topic Name</th>
              <th style='text-align:center;'>Total Marks</th>
              <th style='text-align:center;'>Time Taken</th>
              <th style='text-align:center;'>Date-Time</th>
              <tr>";
         while($res = mysqli_fetch_array($tdata))
        {
         echo"<tr align='center'>";
            echo "<td>".$res['topic_name']."</td>";
            echo "<td>".$res[3]."</td>";
            echo "<td>".$res[4]."</td>";
            echo "<td>".$res[5]."</td>";     
        echo"</tr>";
        }
    ?>
     
      
    </body>
 </html>
 

