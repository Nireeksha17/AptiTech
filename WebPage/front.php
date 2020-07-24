<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/front.css">
</head>
<body>
	<div class="navbar" style="height:68px;">
      <a href="home.php" id="img-link"><img src="img/logo.png" id ="nav-logo"></a>
      <a href="company.php"><i class="fa fa-building"></i>Company</a>
      <div class="dropdown">
        <button class="dropbtn">Aptitude<i class="fa fa-caret-down" style="padding-left:15px"></i></button>
        <div class="dropdown-content">
          <a href="aptitude.php">Quantitaitve Aptitude</a>
          <a href="verbal.php">Verbal</a>
          <a href="reasoning.php">Reasoning</a>
        </div>
      </div> 
      <div class="dropdown" id = "hide-after-login" style=" display:block; float: right;padding-right: 40px">
      	<a href="sigUP.php"><i class="fa fa-sign-in"></i> Sign Up</a>
        <a href="login.php"><i class="fa fa-sign-in"></i> Login</a>
      </div> 
      <div class="dropdown" id="show-after-login" style="float: right;padding-right: 40px; display:none;">
        <a href="profile.php"><?php echo $_SESSION['name'];?>'s Profile</a>
        <a href="php/logout.php"><i class="fa fa-sign-in" ></i> Logout</a>
      </div> 
    </div>
    <div class="footer">
      <p>Footer</p>
    </div>
    <?php
      if(isset($_SESSION['usn'])){
        echo "
          <script>document.getElementById('hide-after-login').style.display = 'none';</script>
          <script>document.getElementById('show-after-login').style.display = 'block';</script> 
        ";
        
      }
    ?>
    
</body>
</html>