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
    <title>Results</title>
    <link rel="icon" href="Images/icon.ico" type="image/x-icon" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/viewResultsStyle.css">
  </head>

  <body>
    <br><br><br><br><br>

  <?php
   	 $conn=mysqli_connect("localhost","root","","aptitech");
       $query = "SELECT * FROM student "; 
       $tdata=mysqli_query($conn,$query);
       $total = mysqli_num_rows($tdata);
        if($total > 0)
        {
        	echo "<table class='mainTable' align='center'>
            <tr>
            <th style='background-color: #005461; padding: 18px 20px;'><i class='fa fa-gear' ></i>Student Record</th>
            </tr>
            <tr>
            <th style='padding:40px 30px'>
            <table class='customers' align='center'>
            <tr>
            <th style='text-align:center;'>USN</th>
            <th style='text-align:center;'>Name</th>
            <th style='text-align:center;'>E-mail</th>
            <th style='text-align:center;'>Overall Results</th>
            <th style='text-align:center;'>Grade</th>
            <th style='text-align:center;'>Action</th>
            <tr>";
            while($res= $tdata -> fetch_assoc())
            {  
                $sum = 0;
                $usn = $res['usn'];
                $query1="SELECT * FROM result WHERE student_usn= '$usn'";   
                $t0 = mysqli_query($conn,$query1);
                $total2= mysqli_num_rows($t0);
                while($res1 = $t0-> fetch_assoc())
                {
                    $sum += $res1['total_marks']; 
                        
                }   
                
  /**
   * Calculate percetage between the numbers
   */           if($sum!=0)
              {
                $per = ($sum/($total2*100))*100;
                //grading
                if($per >90)
                {
                     $grade ='S';
                     $color="#62ff00";
                }
                else if($per > 80 && $per <=90)
                {
                      $grade='A';
                      $color="#024af0";
                    
                }
                else if($per >70 && $per <=80)
                {
                    $grade ='B';
                    $color="#fff30a";
                }
                else if($per >60 && $per <=70)
                {
                    $grade ='C';
                    $color="#ff700a";
                    
                }
                else if($per >50 && $per <= 60)
                {
                    $grade ='D';
                    $color="#8c8a88";
                }
                else
                {
                    $grade ='Fail';
                    $color="#f20000";
                }
              }
            else
            {
                $grade ='Fail';
                $color="#f20000";
                $per=0;
            }
                echo "<tr align='center'>";
                 echo "<td>".$res['usn']."</td>";
                 echo "<td>".$res['name']."</td>";
                 echo "<td>".$res['email']."</td>";
                 echo "<td>".$per."% </td>";
                 $usn=$res['usn'];
                 echo  "<td style='color:".$color.";font-size:20px;'>".$grade."</td>";
                 echo"<td><form action='complete.php' method='POST'><button type='submit' class='subbtn' name ='view-details' value =".$usn.">View Details</button></form></td>";
                echo  "</tr>";     
            }
            echo "</table>";
        }
        else
        {
          echo '<div class="alert" id="p2" style="background-color:rgba(21, 0, 255,0.5)">
            <span class="closebtn" onclick="myFunction()">&times;</span> 
            <strong>Info!</strong> No Results available</div>';
        }
      ?>
                

    <!-- Javascript to make alert box disappear when close button is pressed-->
    <script type="text/javascript">
    function myFunction() {
      document.getElementById("p2").style.display="none";
    }
    </script>

  </body>
</html>
    