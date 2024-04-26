<?php
include '../config/koneksi.php';

	$nm_admin = mysqli_real_escape_string($conn, $_POST['nm_admin']);
	$us_admin = mysqli_real_escape_string($conn, $_POST['us_admin']);
	$ps_admin = mysqli_real_escape_string($conn, md5($_POST['ps_admin']));
	$rl_admin = mysqli_real_escape_string($conn, $_POST['rl_admin']);

	$tambah = mysqli_query($conn, "INSERT INTO tb_admin VALUES(
	'',
	'".$nm_admin."',
	'".$us_admin."',
	'".$ps_admin."',
	'".$rl_admin."'
	)");

if ($tambah) {
	echo "<script>window.location='pg_users.php?toastr=success_toast';</script>";
}else{
	echo "<script>window.location='pg_users.php?toastr=error_toast';</script>";
}
?>