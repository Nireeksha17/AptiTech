<?php
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
  font-size: 20px;
  font-weight: 20px;
}
* {
  box-sizing: border-box;
}



    </style>
</head>
<body>
	<div style="padding-left:20px; padding-right: 20px; padding-top: 5px;">
      <h1 align="center" style="color: black; text-decoration: underline; text-decoration: none;">VERBAL</h1>
      <center>
      <table><tr>
      <?php
      $conn=mysqli_connect("localhost","root","","aptitech");
      $query="SELECT * FROM topic where cat_id = 3";
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
      <!--<table style="margin-left: 25%;">
            
             
            <tr>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal; height:100px;" type="button" value="Anology"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="Antonyms"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="Comprehension"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="Idioms"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="Jumbled Sentence"></td>
             
            </tr>
            <tr>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="One Word substitution"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px; white-space: normal;height:100px;" type="button" value="Sentence Completion "></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Sentence Correction"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white; width: 150px;white-space: normal;height:100px;" type="button" value="Ssentence Improvement"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Spotting Errors"></td>
              
            </tr>
            <tr>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Sequence of Sentence"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Synonyms"></td>
              <td><input style="padding: 20px;background-color:#005461;color: white;width: 150px;white-space: normal;height:100px;" type="button" value="Verbs"></td>
             
              
            </tr>
      		
        
      
        </table>;-->
        
        

</body>
</html>