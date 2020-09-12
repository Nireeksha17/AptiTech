<?php
!include 'front.php';
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
  font-size: 20px;
  font-weight: 20px;
}
* {
  box-sizing: border-box;
}
</style>
</head>
<body>
	<div  style="padding-left:20px; padding-right: 20px; padding-top: 5px;">
      <h1 align="center" style="color: black; text-decoration: underline; text-decoration: none;">REASONING</h1>
      <center>
      <table><tr>
      <?php
      $conn=mysqli_connect("localhost","root","","aptitech");
      $query="SELECT * FROM topic where cat_id = 2";
      $result = mysqli_query($conn,$query);
      //while ($que_assoc = $result->fetch_assoc()) {
        
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
       
          echo"   <td style='color:white;text-decoration:none;'>
         <button  style='padding: 20px;background-color:#005461;color:white; width: 150px;white-space: normal; height:100px;'><a href='../Content/" . $row['cat_id'] . "-" . $row['topic_id'] . ".pdf' target='_blank' rel='noopener noreferrer'>".$row['topic_name']."</a></button>
        </td>";
        } 
        //' name='submit-test'   .$row['topic_name'].  
        ?>
        
    </tr><br></table></center>
    
     <!-- <table style="margin-left: 25%;">
            <tr>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal; height:100px;" type="button" value="Blood Relation"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="Cause & Effect"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="Classification"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="Coding & Decoding"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="Cubes & Dice"></td>

            </tr>
            <tr>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="Data Sufficiency"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px; white-space: normal;height:100px;" type="button" value="Direction Sense"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Logical Sequence"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="Mirror Images"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Puzzles"></td>

            </tr>
            <tr>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Paper Cutting"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Seating Arrangement"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Syllogism"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Venn Diagram"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px; white-space: normal;height:100px;" type="button" value="Statement & Arguements"></td>

            </tr>



        </table>;-->



</body>
</html>
