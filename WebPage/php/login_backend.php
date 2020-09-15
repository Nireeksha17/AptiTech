<?php
  session_start();
  if (isset($_POST["submit"]))
  {
    $conn=mysqli_connect("localhost","root","","aptitech");
    $userEmail=$_POST['userEmail'];
    $pass=$_POST['pass'];
    $query="SELECT `password`, `name` , `usn` FROM `student` WHERE `email` = '$userEmail'";
    $result = mysqli_query($conn,$query);
    if($result){
      $num = mysqli_num_rows($result);
      if($num!=1)
      { echo"
        <script>
        alert('Invalid Credentials');
        document.location = '../login.php';
        </script>
        ";
      }
      else
      { 
        if($userDetails = $result->fetch_assoc()){
          $stored_password =$userDetails['password']; 
          if(password_verify($pass, $stored_password)){
            $_SESSION['name'] =  $userDetails['name'];
            $_SESSION['email'] = $userEmail;
            $_SESSION['usn'] = $userDetails['usn'];
            echo "
            <script>
            window.location = '../profile.php'
            </script>
            ";
          }
          else{
            echo"
            <script>
            alert('Invalid Credentials');
            document.location = '../login.php';
            </script>
            ";
          }
        } 
      }
    }
  }
?>

