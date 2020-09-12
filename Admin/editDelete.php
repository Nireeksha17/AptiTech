<?php
// Start the session
session_start();
include 'navbar.php';
$_SESSION['admin_email'];
$_SESSION['admin_name'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit Category</title>
    <link rel="icon" href="Images/icon.ico" type="image/x-icon" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/addCategoryStyle.css">
  </head>

  <body>

    <!--Edit Category-->
    <p class="catStyle">Edit Category</p>
    <hr class="rounded">
    <div class="addCategory1">
      <i class="fa fa-edit" style="padding-left:10px;font-size: 20px">Edit Category</i>
      <div class="addCategory" align="center">
        <form action="" method="POST">
          <span class="required">*</span><label for="catName">Category Name:</label>
          <input type="text" name="catName" placeholder="Category Name" pattern="[a-zA-Z ]{3,50}" title="Three or more alphabets" style="width: 300px"  
          value="<?php 
          if(isset($_POST["edit"]))  //PHP code to retrieve category name
          {
            $conn=mysqli_connect("localhost","root","","aptitech");
            $catId=$_POST['edit'];
            $result="SELECT * FROM category WHERE cat_id='$catId'";
            $row=mysqli_query($conn,$result);
            $values=$row->fetch_assoc();
            echo $values["cat_name"];
            $_SESSION["v"]=$values["cat_id"];
          }
          ?>" required>
          <br><br><br><br><br>
          <input class="subbtn2" type="submit"  name="submit" value="Submit">
        </form>
      </div>
    </div>


    <!-- Javascript to make alert box disappear when close button is pressed-->
    <script type="text/javascript">
    function myFunction()
    {
      document.getElementById("p2").style.display="none";
    }
    </script>


    <!-- PHP code to edit category list -->
    <?php
      if (isset($_POST["submit"]))
      {
          $conn=mysqli_connect("localhost","root","","aptitech");
          $updatedName=$_POST['catName'];
          $previousId=$_SESSION["v"];
          $check="SELECT * FROM category WHERE cat_name='$updatedName'";
          $result=mysqli_query($conn,$check);
          $num=mysqli_num_rows($result);
        if($num>=1)
        {
            echo '<div class="alert" id="p2" style="background-color:rgba(21, 0, 255,0.6)">
            <span class="closebtn" onclick="myFunction()">&times;</span> 
            <strong>Unsuccessful!</strong> Category already exists.</div>';
            sleep(0.1);    
        }
        else
        {
          $reg ="UPDATE category SET cat_name='$updatedName' WHERE cat_id='$previousId'";
          if(mysqli_query($conn,$reg))
          {
            session_unset();
             // destroy the session
            session_destroy();
            echo "<script type='text/javascript'>
            document.location = 'manageCategory.php'; </script>";
          }
        }
      }
    ?>
    
  </body>
</html>
