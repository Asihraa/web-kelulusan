<?php
include '../config/koneksi.php';

	$jr_mmapel = $_POST['jr_mmapel'];
	$mp_mmapel = $_POST['mp_mmapel'];
	$kl_mmapel = $_POST['kl_mmapel'];

	$tambah = mysqli_query($conn, "INSERT INTO tb_mmapel VALUES(
	'',
	'".$jr_mmapel."',
	'".$mp_mmapel."',
	'".$kl_mmapel."'
	)");

	if ($tambah) {
		echo "<script>window.location='pg_sekolah.php?toastr=success_toast';</script>";
	}else{
		echo "<script>window.location='pg_sekolah.php?toastr=error_toast';</script>";
    }
?>

