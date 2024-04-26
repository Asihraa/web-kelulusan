<?php
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$editmapel = mysqli_query($conn, "UPDATE tb_mapel SET
    id_mapel = '".$_POST['id_mapel']."',
    nm_mapel = '".$_POST['nm_mapel']."'
    WHERE id_mapel = '".$_POST['id_mapel']."'
    ");
}

if ($editmapel) {
	echo "<script>window.location='pg_sekolah.php?toastr=warning_toast';</script>";
}else{
	echo "<script>window.location='pg_sekolah.php?toastr=error_toast';</script>";
}
?>

