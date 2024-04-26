<?php
include '../config/koneksi.php';
$mmapel = mysqli_fetch_array(mysqli_query($conn, "select * from tb_mmapel where mp_mmapel='$_GET[mp_mmapel]'"));
$data_mmapel = array('kl_mmapel'   	=>  $mmapel['kl_mmapel']);
 echo json_encode($data_mmapel);
?>