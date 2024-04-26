<?php
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$editmain = mysqli_query($conn, "UPDATE tb_maintenance SET
    st_maintenance = '".$_POST['st_maintenance']."',
    ps_maintenance = '".$_POST['ps_maintenance']."'
    WHERE id_maintenance = '".$_POST['id_maintenance']."'
    ");
}

if ($editmain) {
	echo "<script>window.location='pg_app.php?toastr=warning_toast';</script>";
}else{
	echo "<script>window.location='pg_app.php?toastr=error_toast';</script>";
}
?>