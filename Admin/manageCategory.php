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
    <title>Category</title>
    <link rel="icon" href="Images/icon.ico" type="image/x-icon" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/manageCategoryStyle.css">
  </head>

  <body>
    <p class="catStyle">Category Listing</p>
    <hr class="rounded">
    <br><br>

    <!-- Javascript to make alert box disappear when close button is pressed-->
    <script type="text/javascript">
    function myFunction() {
      document.getElementById("p2").style.display="none";
    }
    </script>

    <!--PHP code to retrieve category list --> 
    <?php
        $conn=mysqli_connect("localhost","root","","aptitech");
        $result="SELECT * FROM category";
        $row=mysqli_query($conn,$result);
        if(mysqli_num_rows($row)>0)
        {
          echo "<table class='mainTable' align='center'>
          <tr>
          <th style='background-color: #005461; padding: 18px 20px;'><i class='fa fa-gear'></i>Category Listing</th>
          </tr>
          <tr>
          <th style='padding:40px 30px'>
          <table class='customers' align='center'>
          <tr>
          <th style='text-align:left;'>Category Name</th>
          <th style='text-align:center;'>Action</th>
          <tr>";
          while($values=$row->fetch_assoc())
          {
            echo "<tr>
            <td>".$values["cat_name"]."</td>
            <td>
            <form action='editDelete.php' method='POST'>
            <button class='btn edit' name='edit' value=".$values["cat_id"]."><i class='fa fa-edit'></i>Edit</button></form>
            <form action='' method='POST'>
            <button class='btn delete' name='delete'  value=".$values["cat_id"]."><i class='fa fa-trash'></i>Delete</button>
            </form></td>
            </tr>";
          }
          echo "</table></th></tr></table>";
        }
        else
        {
          echo '<div class="alert" id="p2" style="background-color:rgba(21, 0, 255,0.5)">
          <span class="closebtn" onclick="myFunction()">&times;</span> 
          <strong>Info!</strong> Category field is Empty.</div>';
        }
    ?>

    <!-- PHP code to create a confirm box for deleting -->
    <?php
      if (isset($_POST["delete"]))
      {
          $conn=mysqli_connect("localhost","root","","aptitech");
          $delete=$_POST['delete'];
          echo '<div class="box" id="p2">
          <span class="boxbtn" onclick="myFunction()">&times;</span>
          <strong>DELETE</strong><hr>
          <p>Are you sure you want to delete?</p>
          <button class="boxbtn" onclick="myFunction()">Cancel</button>
          <form action="" method="POST"><button class="boxbtn" value='.$delete.' name="confirmDelete">Delete</button>
          </form>
          </div>';
      }
    ?>

    <!-- PHP code to delete category from the list -->
    <?php
      if(isset($_POST["confirmDelete"]))
        {
          $conn=mysqli_connect("localhost","root","","aptitech");
          $deleteId=$_POST['confirmDelete'];
          $result="DELETE FROM category WHERE cat_id='$deleteId'";
          if(mysqli_query($conn,$result)==TRUE)
          {
            echo "<script type='text/javascript'>
            document.location = ''; </script>";
          }
        }
    ?>
    <br><br><br><br>
  </body>
</html>
