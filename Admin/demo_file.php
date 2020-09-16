<?php
// Start the session
session_start();
$_SESSION['admin_email'];
$_SESSION['admin_name'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Introduction</title>
    <link rel="icon" href="Images/i.ico" type="image/x-icon" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/manageQuestionStyle.css">
</head>
<body>
	<!--PHP code for displaying PDF file -->
	<?php
	$conn=mysqli_connect("localhost","root","","aptitech");
	if(isset($_POST["btn"]))
	{
		$topicID=$_POST["btn"];
		$result="SELECT * FROM topic WHERE topic_id='$topicID'";
        $row=mysqli_query($conn,$result);
        $values=$row->fetch_assoc();
        $file=base64_encode($values['introduction']);
        echo"<div style='margin-left:150px;margin-top:30px;'><object data='data:application/pdf;base64,".$file."' type='application/pdf' style='height:600px;width:90%'></object><div>";
        echo "<button class='btn back' onclick='goback()' style='margin-left:100px;margin-top:30px'><i class='fa fa-arrow-circle-left'></i>Back</button>";
	}
?> 
<!-- Javascript to go to manage topic page when back button is pressed-->
    <script type="text/javascript">
    function goback() {
      document.location='manageTopics.php';
    }
    </script>
</body>
</html>