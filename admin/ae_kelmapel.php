<?php
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$tambah = mysqli_query($conn, "UPDATE tb_kelmapel SET nm_kelmapel = '".$_POST['nm_kelmapel']."' WHERE id_kelmapel = '".$_POST['id_kelmapel']."'");
}

if ($tambah) {
	echo "<script>window.location='pg_sekolah.php?toastr=warning_toast';</script>";
}else{
	echo "<script>window.location='pg_sekolah.php?toastr=error_toast';</script>";
}
?>

