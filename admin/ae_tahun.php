<?php
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$editth = mysqli_query($conn, "UPDATE tb_tahun SET 
	nm_tahun = '".$_POST['nm_tahun']."', 
	sm_tahun = '".$_POST['sm_tahun']."', 
	st_tahun = '".$_POST['st_tahun']."' 
	WHERE id_tahun = '".$_POST['id_tahun']."'");
}

if ($editth) {
	echo "<script>window.location='pg_sekolah.php?toastr=warning_toast';</script>";
}else{
	echo "<script>window.location='pg_sekolah.php?toastr=error_toast';</script>";
}
?>

