<?php
include '../config/koneksi.php';

	$nm_jurusan = $_POST['nm_jurusan'];
	$si_jurusan = $_POST['si_jurusan'];

	$tambah = mysqli_query($conn, "INSERT INTO tb_jurusan VALUES(
	'',
	'".$nm_jurusan."',
	'".$si_jurusan."'
	)");

if ($tambah) {
	echo "<script>window.location='pg_sekolah.php?toastr=success_toast';</script>";
}else{
	echo "<script>window.location='pg_sekolah.php?toastr=error_toast';</script>";
}
?>

