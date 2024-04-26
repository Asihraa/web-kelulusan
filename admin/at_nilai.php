<?php
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['inputnilai']) {

	$id_nilai = $_POST['id_nilai'.$i];
	$jr_nilai = $_POST['jr_nilai'.$i];
	$kl_nilai = $_POST['kl_nilai'.$i];
	$mp_nilai = $_POST['mp_nilai'.$i];
	$km_nilai = $_POST['km_nilai'.$i];
	$nm_nilai = $_POST['nm_nilai'.$i];
	$nr_nilai = $_POST['nr_nilai'.$i];
	$nu_nilai = $_POST['nu_nilai'.$i];

	$count = count($id_nilai);

	for ($i=0; $i < $count; $i++) { 
		$tambah = mysqli_query($conn, "INSERT INTO tb_nilai VALUES(
		'',
		'".$jr_nilai[$i]."',
		'".$kl_nilai[$i]."',
		'".$mp_nilai[$i]."',
		'".$km_nilai[$i]."',
		'".$nm_nilai[$i]."',
		'".$nr_nilai[$i]."',
		'".$nu_nilai[$i]."'
		)");
	}

	if ($tambah) {
		echo "<script>window.location='pg_nilai.php?toastr=warning_toast';</script>";
	}else{
		echo "<script>window.location='pg_nilai.php?toastr=error_toast';</script>";
	}

}
?>

