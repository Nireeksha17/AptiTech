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
    <title>Home</title>
    <link rel="icon" href="Images/icon.ico" type="image/x-icon" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/adminHomePageStyle.css">
  </head>

  <body style="background-image: url('Images/c.jpg');">

    <!--Category and topic analysis-->
    <?php
    $conn=mysqli_connect("localhost","root","","aptitech");
    $check1="SELECT * FROM category";
    $result1=mysqli_query($conn,$check1);
    $num1=mysqli_num_rows($result1);
      if($num1>0)
      {
        $x=1;
        echo "<div class='bgimg-2'><div class='row'><br><div class='column'><div class='list'><br><hr><br>";
        while ($value1=$result1->fetch_assoc())
         {
            echo "<form class='available' action='' method='POST'>".$x." . <input type='submit' style='font-weight:bold' value=".$value1["cat_name"]." name='category'></form><br>";
            $id=$value1["cat_id"];
            $check2="SELECT * FROM topic WHERE cat_id='$id'";
            $result2=mysqli_query($conn,$check2);
            $num2=mysqli_num_rows($result2);
            if($num2>0)
            {
              while ($value2=$result2->fetch_assoc())
               {
                  echo "<form class='available' action='' method='POST'><li><input type='submit' name='topic' value=".$value2["topic_name"]."></li></form><br>";
                }
            }
            $x++;
        }
      }
      echo "<br><br><hr><br></div></div>";
    ?>

    <!-- Category result -->
    <?php 
    if(isset($_POST["category"]))
      { 
        $catname=$_POST["category"];
        $check1="SELECT * FROM category WHERE cat_name='$catname'";
        $result1=mysqli_query($conn,$check1);
        $value1=$result1->fetch_assoc();
        $cat_id=$value1["cat_id"];
        $check2="SELECT topic_name FROM topic WHERE cat_id='$cat_id'";
        $result2=mysqli_query($conn,$check2);
        $num2=mysqli_num_rows($result2);
        echo "<div class='graph'><br>
              <p class='graphP1' align='center'>PERFORMANCE</p>
              ";
        if($num2>0)
        {
          while ($value2=$result2->fetch_assoc())
           {
              $t_name=$value2["topic_name"];
              $check3="SELECT total_marks FROM result WHERE topic_name='$t_name'";
              $result3=mysqli_query($conn,$check3);
              $num3=mysqli_num_rows($result3);
              $sum=0;
              while ($value3=$result3->fetch_assoc())
                 {
                  $sum=$sum+$value3["total_marks"] ;
                 }
                 if($sum>0)
                 {
                 $percentage=($sum/($num3*100))*100;
                 if($percentage>=85 && $percentage<=100)
                    $color="#4CAF50";
                else if($percentage>=70 && $percentage<85)
                    $color="#2196F3";
                else if($percentage>=50 && $percentage<70)  
                    $color="#f44336";
                else
                    $color="#808080";
                 echo "<p class='graphP2'>".$t_name."</p>
                        <div class='container'>
                        <div class='skills' style='width:".$percentage."%; background-color:".$color."'>".$percentage."%</div>
                        </div>";
               }
             }

           }
           else
           {
            echo "<span class='graphSpan2'>Empty</span>";
           }
           echo "</div></div>";
      }
    ?>

    <!-- Topic Result-->
    <?php 
    if(isset($_POST["topic"]))
      { 
        $topicname=$_POST["topic"];
        echo "<div class='graph'><br>
              <p class='graphP1' align='center'>PERFORMANCE</p>
              ";
              $t_name=$topicname;
              $check3="SELECT total_marks FROM result WHERE topic_name='$t_name'";
              $result3=mysqli_query($conn,$check3);
              $num3=mysqli_num_rows($result3);
              $good=0;
              $average=0;
              $bad=0;
              $j=0;
              if($num3>0)
              {
                echo "<span class='graphSpan1' align='center'>Number of students attempted: ".$num3."</span>";
              while ($value3=$result3->fetch_assoc())
                 {
                    if($value3["total_marks"]>=70 && $value3["total_marks"]<=100)
                      $good=$good+$value3["total_marks"];
                    else if($value3["total_marks"]>=50 && $value3["total_marks"]<70)
                      $average=$average+$value3["total_marks"];
                    else
                      $bad=$bad+$value3["total_marks"];
                 }
                 $percentage=array($good,$average,$bad);
                 while($j!=3)
                 {
                 $per=($percentage[$j]/($num3*100))*100;

                 if($j==0)
                 {
                    $color="#4CAF50";
                    $grade="GOOD";
                 }
                else if($j==1)
                {
                    $color="#2196F3";
                     $grade="AVERAGE";
                }
                else
                {
                    $color="#f44336";
                     $grade="BAD";
                }
                 echo "<p class='graphP2'>".$grade."</p>
                        <div class='container'>
                        <div class='skills' style='width:".$per."%; background-color:".$color."'>".$per."%</div>
                        </div>";
                  $j++;
               }
             }

           
           else
           {
            echo "<span class='graphSpan2'>Empty</span>";
           }
           echo "</div></div>";
      }
    ?>
  </div>
    <br>
  </body>	
</html>
