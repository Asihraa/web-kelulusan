<?php
include '../config/koneksi.php';

	$nm_user = mysqli_real_escape_string($conn, $_POST['nm_user']);
	$us_user = mysqli_real_escape_string($conn, $_POST['us_user']);
	$ps_user = mysqli_real_escape_string($conn, md5($_POST['ps_user']));
	$rl_user = mysqli_real_escape_string($conn, $_POST['rl_user']);

	$tambah = mysqli_query($conn, "INSERT INTO tb_user VALUES(
	'',
	'".$nm_user."',
	'".$us_user."',
	'".$ps_user."',
	'".$rl_user."'
	)");

if ($tambah) {
	echo "<script>window.location='pg_users.php?toastr=success_toast';</script>";
}else{
	echo "<script>window.location='pg_users.php?toastr=error_toast';</script>";
}
?>