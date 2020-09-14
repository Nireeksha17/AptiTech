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
	<title>Company</title>
	<link rel="icon" href="Images/icon.ico" type="image/x-icon" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="CSS/addTopicsStyle.css">
	<link rel="stylesheet" href="CSS/manageCategoryStyle.css">
	</head>

	<body>

	<!-- ADD Company-->
	<br>
	<center style="font-weight:bold;">Add Company</center>
	<hr class="rounded">
	<div align="center">
	<br>
	<form action="" method="POST">
	<span class="required">*</span><label for="CompanyName" style="padding-right: 10px;">Company Name :</label>
	<input type="text" name="Company" placeholder="Company Name">
	<br><br>
	<input class="subbtn2" type="submit" name="sub" value="Submit">
	</form>
	</div>
	<br><br><br><br>
	<form action='' method='POST' style="padding-left: 20px">
	<button name='add' class='subbtn2' style="width:290px;background-color: rgba(98,0,0,0.8);" ><i class='fa fa-gear' style="padding-right: 10px;"></i>Manage Company Details</button>
	</form>

	<!-- Javascript to make alert box disappear when close button is pressed-->
	<script type="text/javascript">
	function myFunction() {
	document.getElementById("p2").style.display="none";
	}
	</script>

	<br><br>

	<!-- PHP code to insert company details -->
	<?php
	if (isset($_POST["sub"]))
	{
	$name=$_POST["Company"];
	$conn=mysqli_connect("localhost","root","","aptitech");
	$result="SELECT * FROM company WHERE co_name='$name'";
	$row=mysqli_query($conn,$result);
	if(mysqli_num_rows($row)>0)
	{
	echo '<div class="alert" id="p2" style="background-color:rgba(21, 0, 255,0.6)">
	<span class="closebtn" onclick="myFunction()">&times;</span>
	<strong>Info!</strong> Company already exists.</div>';
	}
	else
	{
	$res="INSERT INTO company(co_name) values('$name')";
	if(mysqli_query($conn,$res))
	{
	echo '<div class="alert" id="p2">
	<span class="closebtn" onclick="myFunction()">&times;</span>
	<strong>Info!</strong> Company added successfully.</div>';
	}
	else
	{
	echo '<div class="alert" id="p2" style="background-color:rgba(21, 0, 255,0.6)">
	<span class="closebtn" onclick="myFunction()">&times;</span>
	<strong>Info!</strong>Failed</div>';
	}
	}
	}
	?>


	<!-- PHP code to display company details -->
	<?php
	if(isset($_POST["add"]))
	{
	$conn=mysqli_connect("localhost","root","","aptitech");
	$res="SELECT * FROM company";
	$q=mysqli_query($conn,$res);
	$n=mysqli_num_rows($q);
	if($n>0)
	{
	echo "<table class='customers' align='center'>
	<tr>
	<th style='text-align:left;width:25%'>Company Name</th>
	<th style='text-align:center;width:50%'>Links</th>
	<th style='text-align:center;'>Add new Link</th>";

	// php code to display company name
	while($values=$q->fetch_assoc())
	{
	$id=$values['co_id'];
	echo "<tr><td style='border: 3px solid black;background-color:rgba(248, 255, 107,0.9);color:black;'>
	<form action='' method='POST'>
	<input type='text' name='name' value=".$values['co_name']." style='font-weight:bold;border-color:rgba(248, 255, 107,00.9);font-size:15px'>
	<br><br>
	<button name='update' class='subbtn2' value=".$id.">Update</button>
	<button class='subbtn2' name='delete' value=".$id." formaction='' style='background-color: rgb(247, 2, 2);'><i class='fa fa-trash' style='padding-right:10px'></i>Delete</button>
	</form>
	</td>";
	$r="SELECT * FROM co_url WHERE co_id='$id'";
	$query=mysqli_query($conn,$r);
	if(mysqli_num_rows($query)>0)
	{
	echo "<td style='border: 3px solid black;background-color:rgba(248, 255, 107,0.7);color:black;'>";

	// php code to display links
	while($v=$query->fetch_assoc())
	{
	echo "<ul><li><form action='' method='POST'>
	<input type='url' name='link' value=".$v['url']." style='font-weight:bold;border-color:rgba(248, 255, 107,0.7);font-size:15px;width:400px'>
	<button name='updateLink' class='subbtn2' value=".$v['url']." style='width:50px;height:30px;margin-left:70px'><i class='fa fa-edit'></i></</button>
	<button class='subbtn2' name='deleteLink' value=".$v['url']." formaction='' style='background-color: rgb(247, 2, 2);width:50px;;height:30px;margin-left:30px'><i class='fa fa-trash'></i></button>
	</form>
	</li></ul>";
	}
	echo "</td>";
	}
	else
	{
	echo "<td style='border: 3px solid black;background-color:rgba(248, 255, 107,0.7);color:black;'>Empty</td>";
	}
	echo "<td style='border: 3px solid black;background-color:rgba(248, 255, 107,0.9);color:black;'>
	<form action='' method='POST' align='center'>
	<span class='required'>*</span><label for='url' style='padding-right:30px;'>URL :</label>
	<input type='url' name='link' style='border-color:rgba(248, 255, 107,00.9)'><br><br>
	<button name='url' class='subbtn2' value=".$id.">ADD</button>
	</form>
	</td></tr>";

	}
	echo "<tr></table>";
	}
	else
	{
	echo '<div class="alert" id="p2" style="background-color:rgba(21, 0, 255,0.6)">
	<span class="closebtn" onclick="myFunction()">&times;</span>
	<strong>Info!</strong>Empty</div>';
	}
	}
	?>

	<!-- PHP code to company name -->
	<?php
	if (isset($_POST["update"]))
	{
	$conn=mysqli_connect("localhost","root","","aptitech");
	$oldId=$_POST["update"];
	$updatedName=$_POST['name'];
	$check="SELECT * FROM company WHERE co_name='$updatedName'";
	$result=mysqli_query($conn,$check);
	$num=mysqli_num_rows($result);
	if($num>1)
	{
	echo '<div class="alert" id="p2" style="background-color:rgba(21, 0, 255,0.6)">
	<span class="closebtn" onclick="myFunction()">&times;</span>
	<strong>Info!</strong> Company name already exists.</div>';
	}
	else
	{
	$reg ="UPDATE company SET co_name='$updatedName' WHERE co_id='$oldId'";
	if(mysqli_query($conn,$reg))
	{
	echo '<div class="alert" id="p2">
	<span class="closebtn" onclick="myFunction()">&times;</span>
	<strong>Successful!</strong> Name Updated</div>';
	}
	}
	}
	?>


	<!-- PHP code to add new url-->
	<?php
	if(isset($_POST["url"]))
	{
	$conn=mysqli_connect("localhost","root","","aptitech");
	$id=$_POST["url"];
	$link=$_POST["link"];
	$res="INSERT INTO co_url values('$id','$link')";
	if(mysqli_query($conn,$res))
	{
	echo '<div class="alert" id="p2">
	<span class="closebtn" onclick="myFunction()">&times;</span>
	<strong>Successful!</strong> Link Added</div>';
	}
	}
	?>

	<!-- PHP code to update url-->
	<?php
	if(isset($_POST["updateLink"]))
	{
	$conn=mysqli_connect("localhost","root","","aptitech");
	$url=$_POST["link"];
	$oldurl=$_POST["updateLink"];
	$re="UPDATE co_url SET url='$url' WHERE url='$oldurl'";
	if(mysqli_query($conn,$re))
	{
	echo '<div class="alert" id="p2">
	<span class="closebtn" onclick="myFunction()">&times;</span>
	<strong>Successful!</strong> Link Updated</div>';
	}
	}
	?>


	<!-- PHP code to create a confirm box for deleting -->
	<?php
	if (isset($_POST["delete"]))
	{
	$conn=mysqli_connect("localhost","root","","aptitech");
	$delete=$_POST['delete'];
	echo '<div class="box" id="p2">
	<span class="boxbtn" onclick="myFunction()">&times;</span>
	<strong>DELETE</strong><hr>
	<p>Are you sure you want to delete?</p>
	<button class="boxbtn" onclick="myFunction()">Cancel</button>
	<form action="" method="POST"><button class="boxbtn" value='.$delete.' name="confirmDelete">Delete</button>
	</form>
	</div>';
	}
	?>


	<!-- PHP code to delete company from the list -->
	<?php
	if(isset($_POST["confirmDelete"]))
	{
	$conn=mysqli_connect("localhost","root","","aptitech");
	$deleteId=$_POST['confirmDelete'];
	$result="DELETE FROM company WHERE co_id='$deleteId'";
	if(mysqli_query($conn,$result)==TRUE)
	{
	echo "<script type='text/javascript'>
	document.location = ''; </script>";
	}
	}
	?>

	<!-- PHP code to create a confirm box for deleting -->
	<?php
	if (isset($_POST["deleteLink"]))
	{
	$conn=mysqli_connect("localhost","root","","aptitech");
	$delete=$_POST['deleteLink'];
	echo '<div class="box" id="p2">
	<span class="boxbtn" onclick="myFunction()">&times;</span>
	<strong>DELETE</strong><hr>
	<p>Are you sure you want to delete?</p>
	<button class="boxbtn" onclick="myFunction()">Cancel</button>
	<form action="" method="POST"><button class="boxbtn" value='.$delete.' name="confirmDeleteLink">Delete</button>
	</form>
	</div>';
	}
	?>


	<!-- PHP code to delete company from the list -->
	<?php
	if(isset($_POST["confirmDeleteLink"]))
	{
	$conn=mysqli_connect("localhost","root","","aptitech");
	$deleteId=$_POST['confirmDeleteLink'];
	$result="DELETE FROM co_url WHERE url='$deleteId'";
	if(mysqli_query($conn,$result)==TRUE)
	{
	echo "<script type='text/javascript'>
	document.location = ''; </script>";
	}
	}
	?>
	<br><br><br><br><br>


</body>
</html>
