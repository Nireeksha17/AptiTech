<?php
session_start();
if (!isset($_SESSION)) {
    echo "
      <script>
      alert('Please Login to take test!');
      document.location = 'login.php';
      </script>
    ";
} else {
    echo "Some Rules for taking test bla bla bla";
    var_dump($_SESSION);
    echo "
      <form action='first.php' method='post'>
      <button type='submit' value='" . $_POST['submit'] . "' name='submit'>Take Test</button>
      </form>
    ";
}
