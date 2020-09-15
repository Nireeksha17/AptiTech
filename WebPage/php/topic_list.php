<?php
	include 'config.php';
	$sql_cat = "SELECT * FROM `category` WHERE 1;";
	$cat_table = mysqli_query($con, $sql_cat);
	while($cat_assoc = $cat_table -> fetch_assoc()){
		$cat_id = $cat_assoc['cat_id'];
		echo "
			<tr>
				<th class='lft-grd-heading'>".$cat_assoc['cat_name']."</th>
			</tr>
		";
		$sql_topic = "SELECT * FROM `topic` WHERE `cat_id` = $cat_id LIMIT 10;";
		$topic_table = mysqli_query($con, $sql_topic);
		while ($topic_assoc = $topic_table -> fetch_assoc()) {
			echo "
			<tr>
				<td>
					<button class='lft-grd-btn' type='submit' name = 'submit' value=".$topic_assoc['cat_id']."-".$topic_assoc['topic_id'].">".$topic_assoc['topic_name']."</button>
				</td>
			</tr>
			";
		}
	}
?>