 <?php
include 'front.php';
session_start();
?>
</<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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