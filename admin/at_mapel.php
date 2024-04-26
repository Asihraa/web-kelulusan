<?php
include '../config/koneksi.php';

	$id_mapel = $_POST['id_mapel'];
	$nm_mapel = $_POST['nm_mapel'];

    $cekkode=mysqli_num_rows(mysqli_query($conn, "SELECT id_mapel FROM tb_mapel WHERE id_mapel='".$_POST['id_mapel']."'"));
    if ($cekkode > 0) {
        echo "<script>window.location='pg_sekolah.php?toastr=confirmkode_toast';</script>";
    }
    else{
	$tambah = mysqli_query($conn, "INSERT INTO tb_mapel VALUES(
	'".$id_mapel."',
	'".$nm_mapel."'
	)");

	if ($tambah) {
		echo "<script>window.location='pg_sekolah.php?toastr=success_toast';</script>";
	}else{
		echo "<script>window.location='pg_sekolah.php?toastr=error_toast';</script>";
    }
}
?>

