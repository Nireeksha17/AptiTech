<?php
	session_start();
	$cat_topic_arr = explode('-', $_POST['submit']);
	$topic_id = $cat_topic_arr[1];
	$test_assoc['topic_id'] = $topic_id;
	include 'php/topic_name.php';
	include 'front.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $topic_name['topic_name'];?></title>
	<style>
		object {
			width:100%;
			height: 500px;
			border: 2px solid black;
		}
		form {
			text-align: center;
		}
		button {
			background-color: #005461;
			color: white;
			width: 10%;
			height: 40px;
		}
		button:hover {
			background-color: red;
		}
	</style>
</head>
<body>
	<object data="<?php echo '../Content/'.$_POST['submit'].'.pdf'?>" type="application/pdf"></object>
	<form action="first.php" method="post">
		<button type="submit" name = "submit" value="<?php echo $_POST['submit'];?>">Take test</button>
	</form>
</body>
</html>
