<?php
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$tambah = mysqli_query($conn, "UPDATE tb_mmapel SET
    id_mmapel = '".$_POST['id_mmapel']."',
    jr_mmapel = '".$_POST['jr_mmapel']."',
    mp_mmapel = '".$_POST['mp_mmapel']."',
    kl_mmapel = '".$_POST['kl_mmapel']."'
    WHERE id_mmapel = '".$_POST['id_mmapel']."'
    ");
}

if ($tambah) {
	echo "<script>window.location='pg_sekolah.php?toastr=warning_toast';</script>";
}else{
	echo "<script>window.location='pg_sekolah.php?toastr=error_toast';</script>";
}
?>

