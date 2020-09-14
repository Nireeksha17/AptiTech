<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type= "image/png" href="img/fav_icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/front.css">
</head>
<body>
	<div class="navbar" style="height:68px;">
      <a href="home.php" id="img-link" ><img src="img/logo.png" id ="nav-logo"></a>
      <a href="company.php"><i class="fa fa-building"></i>Company</a>
      <div class="dropdown">
        <button class="dropbtn">Aptitude<i class="fa fa-caret-down" style="padding-left:15px"></i></button>
        <div class="dropdown-content">
          <a href="aptitude.php">Quantitaitve Aptitude</a>
          <a href="verbal.php">Verbal</a>
          <a href="reasoning.php">Reasoning</a>
        </div>
      </div>
      <div id = "hide-after-login" style=" display:block; float: right;padding-right: 40px">
      	<a href="signup.php"><i class="fa fa-sign-in"></i> Sign Up</a>
        <a href="login.php"><i class="fa fa-sign-in"></i> Login</a>
      </div>
      <div id="show-after-login" style="float: right;padding-right: 40px; display:none;">
        <a href="profile.php"><?php echo $_SESSION['name']; ?>'s Profile</a>
        <a href="php/logout.php"><i class="fa fa-sign-in" ></i> Logout</a>
      </div>
    </div>

    <?php
if (isset($_SESSION['usn'])) {
    echo "
          <script>document.getElementById('hide-after-login').style.display = 'none';</script>
          <script>document.getElementById('show-after-login').style.display = 'block';</script>
        ";
}
?>

<!--Footer-->
    <div style="position: fixed;left: 0;bottom: 0;width: 100%;background-color:#005461;height:30px;color: white;">
      <img src="img/fav_icon.png" width="28px" align="left" style="padding-left: 60px;">
      <span style="padding-left:10%;font-size:20px;font-style: italic;color: black;font-family:Trebuchet MS,Arial, Helvetica, sans-serif;font-weight: bold;"><i class="fa fa-instagram" style="padding-right:10px;color: white"></i>apti_tech</span>
      <span style="padding-left:10%;font-size:20px;font-style: italic;color: black;font-family:Trebuchet MS,Arial, Helvetica, sans-serif;font-weight: bold;"><i class="fa fa-facebook-official" style="padding-right:10px;color: white"></i>aptitech</span>
      <span style="padding-left:10%;font-size:20px;font-style: italic;color: black;font-family:Trebuchet MS,Arial, Helvetica, sans-serif;font-weight: bold;"><i class="fa fa-envelope" style="padding-right:10px;color: white"></i>aptitech@gmail.com</span>
      <span style="padding-left:10%;font-size:20px;font-style: italic;color: black;font-family:Trebuchet MS,Arial, Helvetica, sans-serif;font-weight: bold;"><i class="fa fa-phone" style="padding-right:10px;color: white"></i>8762840329</span>
    </div>
</body>
</html>