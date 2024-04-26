<?php
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$ubah = mysqli_query($conn, "UPDATE tb_kelulusan SET
    tg_kelulusan = '".$_POST['tg_kelulusan']."',
    tp_kelulusan = '".$_POST['tp_kelulusan']."',
    wm_kelulusan = '".$_POST['wm_kelulusan']."',
    ws_kelulusan = '".$_POST['ws_kelulusan']."',
    zw_kelulusan = '".$_POST['zw_kelulusan']."',
    ns_kelulusan = '".$_POST['ns_kelulusan']."',
    tb_kelulusan = '".$_POST['tb_kelulusan']."',
    st_kelulusan = '".$_POST['st_kelulusan']."'
    WHERE id_kelulusan = '".$_POST['id_kelulusan']."'
    ");
}

if ($ubah) {
	echo "<script>window.location='pg_kelulusan.php?toastr=warning_toast';</script>";
}else{
	echo "<script>window.location='pg_kelulusan.php?toastr=error_toast';</script>";
}
?>

