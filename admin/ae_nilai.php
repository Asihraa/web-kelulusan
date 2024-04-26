<?php
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$tambah = mysqli_query($conn, "UPDATE tb_nilai SET
    id_nilai = '".$_POST['id_nilai']."',
    nm_nilai = '".$_POST['nm_nilai']."',
    kl_nilai = '".$_POST['kl_nilai']."',
    mp_nilai = '".$_POST['mp_nilai']."',
    km_nilai = '".$_POST['km_nilai']."',
    nr_nilai = '".$_POST['nr_nilai']."',
    nu_nilai = '".$_POST['nu_nilai']."'
    WHERE id_nilai = '".$_POST['id_nilai']."'
    ");
}

if ($tambah) {
	echo "<script>window.location='pg_datanilai.php?toastr=warning_toast';</script>";
}else{
	echo "<script>window.location='pg_datanilai.php?toastr=error_toast';</script>";
}
?>

