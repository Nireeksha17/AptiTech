<?php
	include 'config.php';
	$sql_quants = "SELECT * from topic WHERE cat_id = 1 LIMIT 10;";
    $quants_table = mysqli_query($con, $sql_quants);
	$sql_technical = "SELECT * from topic WHERE cat_id = 2 LIMIT 10;";
    $technical_table = mysqli_query($con, $sql_technical);
	$sql_verbal = "SELECT * from topic WHERE cat_id = 3 LIMIT 10;";
    $verbal_table = mysqli_query($con, $sql_verbal);
?>