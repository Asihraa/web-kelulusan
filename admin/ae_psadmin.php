<?php
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$editps = mysqli_query($conn, "UPDATE tb_admin SET
    nm_admin = '".mysqli_real_escape_string($conn, $_POST['nm_admin'])."',
    us_admin = '".mysqli_real_escape_string($conn, $_POST['us_admin'])."',
    ps_admin = '".mysqli_real_escape_string($conn, md5($_POST['ps_admin']))."',
    rl_admin = '".mysqli_real_escape_string($conn, $_POST['rl_admin'])."'
    WHERE id_admin = '".$_POST['id_admin']."'
    ");
}

if ($editps) {
	echo "<script>window.location='pg_users.php?toastr=okeresetpassword_toast';</script>";
}else{
	echo "<script>window.location='pg_users.php?toastr=error_toast';</script>";
}
?>