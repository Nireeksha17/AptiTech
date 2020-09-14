<?php
session_start();
include 'front.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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

    </style>
</head>
<body>

	<div style="padding-left:20px; padding-right: 20px; padding-top: 5px;">
      <h1 align="center" style="color: black; text-decoration: underline; text-decoration: none;">APTITUDE</h1>
      <center>
      <table><tr>
      <?php
$conn = mysqli_connect("localhost", "root", "", "aptitech");
$query = "SELECT * FROM topic where cat_id = 1";
$result = mysqli_query($conn, $query);
//while ($que_assoc = $result->fetch_assoc()) {

while ($row = $result->fetch_assoc()) {

    echo "   <td style='color:white;text-decoration:none;'>
         <button  style='padding: 20px;background-color:#005461;color:white; width: 150px;white-space: normal; height:100px;'><a href='../Content/" . $row['cat_id'] . "-" . $row['topic_id'] . ".pdf' target='_blank' rel='noopener noreferrer'>" . $row['topic_name'] . "</a></button>
        </td>";
}
//' name='submit-test'   .$row['topic_name'].
?>

    </tr><br></table></center>
  </body>
</html>
      <!--<table style="margin-left: 25%;">


            <tr>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal; height:100px;" type="button" value="Ages"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="Percentage"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="Simple Interest"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="Time and Distance"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="Boats and Streams"></td>

            </tr>
            <tr>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="LCM & HCF"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px; white-space: normal;height:100px;" type="button" value="Probability"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Pipes & Cistern"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="Bankers Discount"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Permutation & combination"></td>

            </tr>
            <tr>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Mensuration"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Time & Work"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Ratio & Propotion"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Mixture & Alligation"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px; white-space: normal;height:100px;" type="button" value="Data Interpretation"></td>

            </tr>
      		<tr>
      			<td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Calenders"></td>
      			<td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Clock"></td>
      			 <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height: 100px;" type="button" value="Number System"></td>
      			 <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height: 100px;" type="button" value="Number Series"></td>
      			<td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height: 100px;" type="button" value="Data Sufficiency"></td>

      		</tr>


        </table>;-->



