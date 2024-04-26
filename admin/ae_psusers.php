<?php
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$editps = mysqli_query($conn, "UPDATE tb_user SET
    nm_user = '".mysqli_real_escape_string($conn, $_POST['nm_user'])."',
    us_user = '".mysqli_real_escape_string($conn, $_POST['us_user'])."',
    ps_user = '".mysqli_real_escape_string($conn, md5($_POST['ps_user']))."',
    rl_user = '".mysqli_real_escape_string($conn, $_POST['rl_user'])."'
    WHERE id_user = '".$_POST['id_user']."'
    ");
}

if ($editps) {
	echo "<script>window.location='pg_users.php?toastr=okeresetpassword_toast';</script>";
}else{
	echo "<script>window.location='pg_users.php?toastr=error_toast';</script>";
}
?>