<?php
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$editkl = mysqli_query($conn, "UPDATE tb_kelas SET
    nm_kelas = '".$_POST['nm_kelas']."',
    jr_kelas = '".$_POST['jr_kelas']."',
    st_kelas = '".$_POST['st_kelas']."'
    WHERE id_kelas = '".$_POST['id_kelas']."'
    ");
}

if ($editkl) {
	echo "<script>window.location='pg_sekolah.php?toastr=warning_toast';</script>";
}else{
	echo "<script>window.location='pg_sekolah.php?toastr=error_toast';</script>";
}
?>