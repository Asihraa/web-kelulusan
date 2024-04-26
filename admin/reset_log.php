<?php
error_reporting(0);
include '../config/koneksi.php';

if (@$_POST['reset']) {
	$rst = mysqli_query($conn, "SELECT * FROM tb_log");
	$bersih = mysqli_query($conn, "TRUNCATE tb_log");

	if($bersih) { 
		echo '<script>window.location="index.php?toastr=success_toast"</script>';
	} else { 
		echo '<script>window.location="index.php?toastr=error_toast"</script>';
	}
}

?>