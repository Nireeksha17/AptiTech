<?php
	$con = mysqli_connect("localhost","root","")or die("unable to coneect");
	mysqli_select_db($con,'aptitech');
  if(isset($_POST['submit_btn'])){		
		$fullname = $_POST['full-name'];
		$usn = strtoupper($_POST['usn']);
		$phno = $_POST['ph-no'];
		$dept = $_POST['dept'];
		$username =$_POST['username'];
		$password =$_POST['password'];
		$cpassword =$_POST['cpassword'];
		if($password == $cpassword){
			$query = "SELCT * FROM student WHERE email='$username'";
			$query_run =mysqli_query($con,$query);
			if($query_run){
				echo"<script> alert('User Already Exists! Login ');</script>"; 
				echo"<script>window.location ='login.php';</script>";
			}
			else{
				$hash_passwod = password_hash($password, PASSWORD_DEFAULT);
				$query = "INSERT INTO `student`(`usn`, `name`, `email`, `department`, `mobile_number`, `password`) VALUES ('$usn', '$fullname', '$username', '$dept', '$phno', '$hash_passwod');";
				$query_run=mysqli_query($con,$query);
				if($query_run){
					echo "
						<script>
						alert('Registration Successful! Login again!');
						window.location = '../login.php';
						</script>
					";
				}
				else
					echo "
					<script> 
						alert('Registration Failed! Contact the Admin');
						window.location = '../home.php'	
					</script>
					
					";
					
			}
		}
		else{
			echo "<script>alert('password doesnt match');</script>";
			echo"<script>window.location ='login.php';</script>";
		}        
	}
?>
