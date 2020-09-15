<?php
session_start();
include 'front.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Verbal: AptiTech</title>
	<style type="text/css">
	table, th, td {
		border: none;
		border-collapse: collapse;
		background-color: white;
		color: black;
	}
	th, td {
		padding: 25px;
		text-align: left;
		color: white;
		font-weight: 20px;
	}
	* {
		box-sizing: border-box;
	}

	input[type="button"]{
		font-size: 20px;
	}
	.row .a-tag .btn{
		text-decoration: none;
		color: white;
		font-size: 20px;
	}

	.row .a-tag .btn {
		padding: 20px;
		background-color:#005461;
		color:white;
		width: 150px;
		white-space: normal;
		height:100px;'
	}
	</style>
</head>
<body>
	<div style="padding-left:20px; padding-right: 20px; padding-top: 5px;">
		<h1 align="center" >Verbal</h1>
		<center>
		<table>
			<tr>
				<?php
					$conn = mysqli_connect("localhost", "root", "", "aptitech");
					$query = "SELECT * FROM `category` WHERE `cat_name` = 'Verbal';";
					$cat_table = mysqli_query($conn, $query);
					$cat_assoc = $cat_table -> fetch_assoc();
					$cat_id = $cat_assoc['cat_id'];
					$query1 = "SELECT * FROM topic where cat_id = $cat_id;";
					$result = mysqli_query($conn, $query1);
					$num_of_button = 5;
					while ($row = $result->fetch_assoc()) {
						echo "
							<td class = 'row'>
									<a href='../Content/" . $row['cat_id'] . "-" . $row['topic_id'] . ".pdf' class = 'a-tag' target='_blank' rel='noopener noreferrer'>
										<button class = 'btn'>
											" . $row['topic_name'] . "
										</button>
									</a>
							</td>
						";
						if(--$num_of_button == 0){
							echo"
								</tr><tr>
							";
							$num_of_button = 6;
						}
					}
				?>
			</tr><br>
		</table>
		</center>
	</div>
</body>
</html>
