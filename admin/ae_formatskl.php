<?php
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$editfr = mysqli_query($conn, "UPDATE tb_formatskl SET
    tp_formatskl = '".$_POST['tp_formatskl']."',
    tg_formatskl = '".$_POST['tg_formatskl']."',
    fr_formatskl = '".$_POST['fr_formatskl']."',
    bl_formatskl = '".$_POST['bl_formatskl']."',
    th_formatskl = '".$_POST['th_formatskl']."',
    st_formatskl = '".$_POST['st_formatskl']."'
    WHERE id_formatskl = '".$_POST['id_formatskl']."'
    ");
}

if ($editfr) {
	echo "<script>window.location='pg_kelulusan.php?toastr=warning_toast';</script>";
}else{
	echo "<script>window.location='pg_kelulusan.php?toastr=error_toast';</script>";
}
?>

