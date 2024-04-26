<?php
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$edit = mysqli_query($conn, "UPDATE tb_siswa SET 
	kl_siswa = '".$_POST['kl_siswa']."',
	nm_siswa = '".$_POST['nm_siswa']."',
	jr_siswa = '".$_POST['jr_siswa']."',
	tm_siswa = '".$_POST['tm_siswa']."',
	tg_siswa = '".$_POST['tg_siswa']."',
	ni_siswa = '".$_POST['ni_siswa']."',
	ns_siswa = '".$_POST['ns_siswa']."',
	np_siswa = '".$_POST['np_siswa']."',
	nu_siswa = '".$_POST['nu_siswa']."',
	st_siswa = '".$_POST['st_siswa']."'
	WHERE id_siswa = '".$_POST['id_siswa']."'
	");
}

if ($edit) {
	echo "<script>window.location='pg_siswa.php?toastr=warning_toast';</script>";
}else{
	echo "<script>window.location='pg_siswa.php?toastr=error_toast';</script>";
}
?>

