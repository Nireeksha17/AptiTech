<?php
session_start();
include 'config.php';
if (isset($_SESSION)) {
    if (isset($_POST['submit-test'])) {
        $_SESSION['submit-test'] = $_POST['submit-test'];
        echo "
        <script>
        window.location = '../TnC_test.php';
        </script>
        ";
    }
}
