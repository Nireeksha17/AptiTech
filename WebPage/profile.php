<?php
	session_start();
	include 'front.php';
	include 'php/config.php';
	if (!$_SESSION) {
	echo "
		<script>
		alert('Login to see this page');
		window.location = 'login.php';
		</script>
	";
	}
	$email = $_SESSION['email'];
	$que = " SELECT * FROM student where email = '$email'";
	$res = mysqli_query($con, $que);
	$row = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type= "image/png" href="img/fav_icon.png">
	<link rel="stylesheet" href="css/profile.css">
	<title><?php echo $row['name'] ?>: AptiTech-Profile </title>
</head>
<body>
  <div class="container" style="float: left;">
    <div class="clmn left-grd " >
      <img class="profile-logo" src="img/profile_logo.png" alt="Profile Logo" >
      <table class="profile-table">
        <tr>
          <td>Name</td><td>:<?php echo $row['name'] ?></td>
        </tr>
        <tr>
          <td>USN</td><td>:<?php echo $row['usn'] ?></td>
        </tr>
        <tr>
          <td>Email</td><td>:<?php echo $row['email'] ?></td>
        </tr>
        <tr>
          <td>Department</td><td>:<?php echo $row['department'] ?></td>
        </tr>
        <tr>
          <td>Ph. No</td><td>:<?php echo $row['mobile_number'] ?></td>
        </tr>
      </table>
    </div>
    <div class="clmn center-grd ">
      <p id="center-heading-1">Academic Records</p>
      <div class="center-heading-2">Results:</div>
				<?php
					include 'php/student_result.php';

					if (mysqli_num_rows($res_tests_taken) == 0) {
						echo "<div class = 'no-test'>No tests taken yet</div>";
					} else {
						echo "
							<form action='TnC_test.php' method='post'>
							<table class = 'result-table'>
							<tr>
								<th class = 'brdr'>Topic Name</th>
								<th class = 'brdr'>Marks Scored</th>
								<th class = 'brdr'>Time Taken</th>
								<th class = 'brdr'>Date</th>
								<th class = 'brdr'>Re-Take Test</th>
								</tr>
						";
						while ($test_assoc = $res_tests_taken->fetch_assoc()) {
						include 'php/topic_name.php';
						echo "
							<tr>
								<td class = 'brdr'>" . $topic_name['topic_name'] . "</td>
								<td class = 'brdr'>" . $test_assoc['total_marks'] . "</td>
								<td class = 'brdr'>" . $test_assoc['time_taken'] . "</td>
								<td class = 'brdr'>" . $test_assoc['exam_date'] . "</td>
								<td class='brdr a-in-tbl'>
									<button type='submit' value='" . $topic_name['cat_id'] . "-" . $topic_name['topic_id'] . "' name='submit'>Take Test</button>
								</td>
							</tr>
            ";
						}
						echo "
							</table>
							</from>
						";
					}
				?>
				<div class="center-heading-2" style="padding-top: 20px;">Available Tests:</div>
				<?php
					include 'php/remaining_tests.php';
					if (mysqli_num_rows($remaining_test) == 0) {
						echo "<div class = 'no-test'>No new tests to be taken yet</div>";
					} else {
						echo "
							<table class = 'result-table topic-remaining'>
							<form action ='TnC_test.php' method='POST'>
						";
						while ($topics_remaining = $remaining_test->fetch_assoc()) {
							echo "
								<tr>
									<td class = 'brdr'>
									" . $topics_remaining['topic_name'] . "
									</td>
									<td class='brdr a-in-tbl'>
										<button><a href='../Content/" . $topics_remaining['cat_id'] . "-" . $topics_remaining['topic_id'] . ".pdf' target='_blank' rel='noopener noreferrer'>Introduction</a></button>
									</td>
									<td class='brdr a-in-tbl'>
										<button type='submit' value='" . $topics_remaining['cat_id'] . "-" . $topics_remaining['topic_id'] . "' name='submit'>Take Test</button>
									</td>
								</tr>
							";
						}
						echo "
							</table>
							</form>
						";
					}
				?>
		</div>
		<div class="clmn right-grd ">
				<table class="topics" style = "width: 100%;">
				<form action="intro.php" method="post">
					<?php
						include 'php/topic_list.php';
						echo "
							<tr>
								<th class='lft-grd-heading'>Aptitude</th>
							</tr>
						";
						while($quants_row = $quants_table -> fetch_assoc()){
								echo "
									<tr>
										<td>
											<button class='lft-grd-btn' type='submit' name = 'submit' value=".$quants_row['topic_id']."-".$quants_row['topic_id'].">".$quants_row['topic_name']."</button>
										</td>
									</tr>
								";
						}
						echo "
							<tr>
								<th class='lft-grd-heading'>Technical</th>
							</tr>
						";
						while($technical_row = $technical_table -> fetch_assoc()){
								echo "
									<tr>
										<td>
											<button class='lft-grd-btn' type='submit' name = 'submit' value=".$technical_row['topic_id']."-".$technical_row['topic_id'].">".$technical_row['topic_name']."</button>
										</td>
									</tr>
								";
						}
						echo "
							<tr>
								<th class='lft-grd-heading'>Verbal</th>
							</tr>
						";
						while($verbal_row = $verbal_table -> fetch_assoc()){
								echo "
									<tr>
										<td>
											<button class='lft-grd-btn' type='submit' name = 'submit' value=".$verbal_row['topic_id']."-".$verbal_row['topic_id'].">".$verbal_row['topic_name']."</button>
										</td>
									</tr>
								";
						}
					?>
				</form>
				</table>
			</div>
		</div>
</body>
</html>