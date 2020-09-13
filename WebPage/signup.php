<?php
include 'front.php';
?>
<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href ="css/signup.css">
		<title>SignUp</title>
</head>
<body>
	<div class="log">
		<h2>SignUp</h2>
		<img src ="images/login1.png" ><span id="lo"></span>
		<form action="php/config.php" method="post">
			<label for="name">Full Name:</label><br>
			<input type="text" name="full-name" id="name" placeholder="Enter Full name here" required><br>
			<label for="ph-no">Phone Number</label><br>
			<input type="tel" name="ph-no" id="ph-no" maxlength="10" min="1000000000" placeholder="Enter Phone number" required><br>
			<label for="usn">USN:</label><br>
			<input type="text" name="usn" id="usn" placeholder="Enter USN here" maxlength="15" required><br>
			<label for="dept">Department:</label><br>
			<select name="dept" id="dept" placeholder="Select Department" required>
				<option value="CSE">Computer Science</option>
				<option value="ME">Mechanical</option>
				<option value="IS">Information Science</option>
			</select><br>
			<label>Username:</label><br>
			<input name="username" type="email" placeholder="example@xyz.com" required/><br>
			<label>Password:</label><br>
			<input name ="password" type="password" placeholder="Type your password" required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" title="Your password shuold minimum 8 characters, at least one letter, one number and one special character"/><br>
			<label> Confirm Password:</label><br>
			<input name ="cpassword" type="password" placeholder=" Re-type your password" required/><br>
			<input name ="submit_btn" type="submit" id ="Sign-btn" value="SignUp"/><br>
			</form>
			<a href="login.php"><input type="button" id ="back-btn" value="Back"/></a>
	</div>
</body>
</html>
