<?php
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$editjr = mysqli_query($conn, "UPDATE tb_jurusan SET nm_jurusan = '".$_POST['nm_jurusan']."', si_jurusan = '".$_POST['si_jurusan']."' WHERE id_jurusan = '".$_POST['id_jurusan']."'");
}

if ($editjr) {
	echo "<script>window.location='pg_sekolah.php?toastr=warning_toast';</script>";
}else{
	echo "<script>window.location='pg_sekolah.php?toastr=error_toast';</script>";
}
?>

