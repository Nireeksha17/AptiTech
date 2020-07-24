<?php
session_start();


$from_time1 = date('y-m-d H:i:s');
$to_time1 = $_SESSION["end_time"];

$timefirst = strtotime($from_time1);
$timesecond = strtotime($to_time1);

$differenceinseconds = $timesecond-$timefirst;

echo gmdate("i:s",$differenceinseconds);


?>