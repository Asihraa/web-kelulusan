<?php
include '../config/koneksi.php';

	$nm_kelas = $_POST['nm_kelas'];
	$jr_kelas = $_POST['jr_kelas'];
	$st_kelas = $_POST['st_kelas'];

	$tambah = mysqli_query($conn, "INSERT INTO tb_kelas VALUES(
	'',
	'".$nm_kelas."',
	'".$jr_kelas."',
	'".$st_kelas."'
	)");

if ($tambah) {
	echo "<script>window.location='pg_sekolah.php?toastr=success_toast';</script>";
}else{
	echo "<script>window.location='pg_sekolah.php?toastr=error_toast';</script>";
}
?>

