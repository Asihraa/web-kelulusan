<?php
  session_start();
  session_destroy();
  echo "<script>window.location = '../index.php?toastr=success_toast'</script>";
?>
