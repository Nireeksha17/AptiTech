<?php
session_start();
?>
<!DOCTYPE html>
  <html>
    <head>
      <title>Login</title>
      <link rel="icon" href="Images/i.ico" type="image/x-icon" >
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="CSS/adminLoginStyle.css">
    </head>

    <body style="background-image: url('Images/c.jpg');">
      <div align="center" class="loginform">
        <form action="" method="POST" style="height:100%">
          <img src="Images/aptitech.png" align="center">
          <h1>Admin Login</h1>
          <hr><br>
          <label for="admin_email"><b>Email</b></label><br>
          <input type="email"  placeholder="Enter Name" name="admin_email"  required  ><br><br>
          <label for="admin_password"><b>Password</b></label>
          <input type = "Password"  placeholder="Enter Password" name="admin_password" required ><br><br>
          <button type="submit" class="loginbtn" name="sub">Login</button>
        </form>
      </div>

      <!-- login validation -->
      <?php
        if (isset($_POST["sub"]))
        {
          $conn=mysqli_connect("localhost","root","","aptitech");
          $admin_email=$_POST['admin_email'];
          $admin_password=$_POST['admin_password'];
          $s=("SELECT * FROM admin WHERE admin_email='$admin_email' AND admin_password='$admin_password'");
          $result = mysqli_query($conn,$s);
          $num = mysqli_num_rows($result);
          if($num!=1)
          {
            echo"<script>alert('Wrong username or password try again.');</script>";
            sleep(1);
            echo "<script type='text/javascript'>document.location='adminLogin.php';</script?";
          }
          else
          {
            $value = $result->fetch_assoc();
            $_SESSION['admin_email']=$admin_email;
            $_SESSION['admin_name']=$value["admin_name"];
            echo "<script type='text/javascript'>document.location='adminHomePage.php';</script>";
          }
        }
      ?>
    </body>
  </html>