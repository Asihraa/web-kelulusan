<?php
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$tambah = mysqli_query($conn, "UPDATE tb_pengumuman SET
    st_pengumuman = '".$_POST['st_pengumuman']."',
    ps_pengumuman = '".$_POST['ps_pengumuman']."'
    WHERE id_pengumuman = '".$_POST['id_pengumuman']."'
    ");
}

if ($tambah) {
	echo "<script>window.location='pg_app.php?toastr=warning_toast';</script>";
}else{
	echo "<script>window.location='pg_app.php?toastr=error_toast';</script>";
}
?>