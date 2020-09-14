 <?php
include 'front.php';
session_start();
?>
</<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="pos">
  <form action="php/login_backend.php" method="POST" class="form-style" >
    <h1 class="login-title">Login</h1>
    <label for="user">UserName</label>
    <input type="text" placeholder="example@xyz.com" name="userEmail" required>
    <label for="psw">Password</label>
    <input type = "password" placeholder="***********" name="pass" required>
    <button type="submit" class="btnl" name="submit" >Login</button>
  </form>
</div>
</body>
</html>