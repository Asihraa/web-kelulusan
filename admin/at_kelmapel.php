<?php
include '../config/koneksi.php';

	$nm_kelmapel = $_POST['nm_kelmapel'];

	$tambah = mysqli_query($conn, "INSERT INTO tb_kelmapel VALUES(
	'',
	'".$nm_kelmapel."'
	)");

if ($tambah) {
	echo "<script>window.location='pg_sekolah.php?toastr=success_toast';</script>";
}else{
	echo "<script>window.location='pg_sekolah.php?toastr=error_toast';</script>";
}
?>

