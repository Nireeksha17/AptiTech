<?php
session_start();
if(isset($_POST['intro'])){
  echo "
    <form action='intro.php' method='post'>
      <button type='submit' name='submit' value =".$_POST['intro']." style = 'display: none;' id = 'id-to-submit'></button>
    </form>
    <script>
      document.getElementById('id-to-submit').click();
    </script>
  ";
}
if (!isset($_SESSION)) {
    echo "
      <script>
      alert('Please Login to take test!');
      document.location = 'login.php';
      </script>
    ";
} else if(isset($_POST['submit'])){
    echo "Some Rules for taking test bla bla bla";
    echo "
      <form action='first.php' method='post'>
        <button type='submit' value='" . $_POST['submit'] . "' name='submit'>Take Test</button>
      </form>
    ";
}
?>