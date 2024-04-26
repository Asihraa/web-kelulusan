<?php
error_reporting(0);
include '../config/koneksi.php';

if (@$_POST['reset']) {
	$rst = mysqli_query($conn, "SELECT * FROM tb_user");
	$bersih = mysqli_query($conn, "TRUNCATE tb_user");

	if($bersih) { 
		echo '<script>window.location="pg_app.php?toastr=success_toast"</script>';
	} else { 
		echo '<script>window.location="pg_app.php?toastr=error_toast"</script>';
	}
}

?>