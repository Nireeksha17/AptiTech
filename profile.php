<!DOCTYPE html>
<?php
  include('php/config.php');
  $que = " SELECT * FROM student where usn = 1";
  $res = mysqli_query($con, $que);
  $row = $res -> fetch_assoc();
?>
<html lang="en">
<head>
  <link rel="icon" type= "image/png" href="img/fav_icon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/profile.css">
  <title><?php echo $row['name']?>: AptiTech-Profile </title>

</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <img src = "img/logo.png" align="left"  style="width: 60%; padding-top: 7px; left: 8px;">
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-book " style = "padding-top: 7px"></span> Aptitude</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-book " style = "padding-top: 7px"></span> Reasoning</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-book " style = "padding-top: 7px"></span> Verbal</a></li>
        <li><a href="#" style="padding-top: 20px;"><?php echo "$row[name]'s "; ?>Profile</a></li>
        <li><a href="#"><input type="text" class="form-control" placeholder="Search" name="search"></a></li>
        <li><a href="#">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container" style="float: left;">
    <div class="clmn left-grd " > 
      <img class="profile-logo" src="img/profile_logo.png" alt="Profile Logo" >
      <table class="profile-table">
        <tr>
          <td>Name</td><td>:<?php echo $row['name']?></td>
        </tr>
        <tr>
          <td>USN</td><td>:<?php echo $row['usn']?></td>
        </tr>
        <tr>
          <td>Email</td><td>:<?php echo $row['email']?></td>
        </tr>
        <tr>
          <td>Department</td><td>:<?php echo $row['department']?></td>
        </tr>
        <tr>
          <td>Ph. No</td><td>:<?php echo $row['mobile_number']?></td>
        </tr>
      </table>
    </div>
    <div class="clmn center-grd ">
      <p id="center-heading-1">Academic Records</p>
      <div class="center-heading-2">Results:</div>
      <?php
        include('php/student_result.php');
        if(!$res_tests_taken){
          echo "<div class = 'no-test'>No tests taken yet</div>";
        }
        else {
          echo "<table class = 'result-table'>";
          echo "<tr><th class = 'brdr'>Topic Name</th><th class = 'brdr'>Total Marks</th><th class = 'brdr'>Time Taken</th><th class = 'brdr'>Date</th></tr>";
          while($test_assoc = $res_tests_taken -> fetch_assoc()){
            echo "<tr><td class = 'brdr'>".$test_assoc['topic_name']."</td><td class = 'brdr'>".$test_assoc['total_marks']."</td><td class = 'brdr'>".$test_assoc['time_taken']."</td><td class = 'brdr'>".$test_assoc['exam_date']."</td></tr>";
          }
          echo "</table>";
        }
      ?>
      <div class="center-heading-2" style="padding-top: 20px;">Available Tests:</div>
      <?php
        include('php/remaining_tests.php');
        if(!$remaining_test){
          echo "<div class = 'no-test'>No tests to be taken yet</div>";
        }
        else{
          echo "<table class = 'result-table topic-remaining'>";
          while($topics_remaining = $remaining_test -> fetch_assoc()){
            echo "<tr><td class = 'brdr'><a href='#' style = 'text-decoration: none;'>".$topics_remaining['topic_name']."</a></td></tr>"; 
          }
          echo "</table>";

        }
      ?>
    </div>
    <div class="clmn right-grd ">
        <table class="topics">
          <tr><th><a href="#">Aptitude</a></th></tr>
          <tr><td><a href="#"><li>Ages</li></a></td></tr>
          <tr><td><a href="#"><li>Percentage</li></a></td></tr>
          <tr><td><a href="#"><li>Simple Intrest</li></a></td></tr>
          <tr><td><a href="#"><li>Time and Distance</li></a></td></tr>

          <tr><th><a href="#">Verbal</a></th></tr>
          <tr><td><a href="#"><li>Anology</li></a></td></tr>
          <tr><td><a href="#"><li>Antonyms</li></a></td></tr>
          <tr><td><a href="#"><li>Comprehension</li></a></td></tr>
          <tr><td><a href="#"><li>Idioms</li></a></td></tr>

          <tr><th><a href="#">Reasoning</a></th></tr>
          <tr><td><a href="#"><li>Blood Relation</li></a></td></tr>
          <tr><td><a href="#"><li>Cause and Effect</li></a></td></tr>
          <tr><td><a href="#"><li>Classification</li></a></td></tr>
          <tr><td><a href="#"><li>Coding and Decoding</li></a></td></tr>
        </table>
    </div>
  </div>
</body>
</html>