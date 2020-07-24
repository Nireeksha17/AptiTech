<?php
session_start();
session_destroy();
?>
<script>
  alert('Successuflly logged out');
  document.location = '../home.php';
</script>
