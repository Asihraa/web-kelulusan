<?php
error_reporting(0);
include '../config/koneksi.php';

$id_sekolah = $_POST['id_sekolah'];
$nm_sekolah = $_POST['nm_sekolah'];
$kp_sekolah = $_POST['kp_sekolah'];
$nk_sekolah = $_POST['nk_sekolah'];

if(@$_POST['ubah_logo']){

	$lg_sekolah = $_FILES['lg_sekolah']['name'];
	$tmp1 = $_FILES['lg_sekolah']['tmp_name'];
	$extensi = explode(".", $_FILES['lg_sekolah']['name']);
	$lg_sekolahbaru = "Logo-".round(microtime(true)).".".end($extensi);
	$path1 = "../assets/file/profile/".$lg_sekolahbaru;
	move_uploaded_file($tmp1, $path1);

		$query1 = "SELECT * FROM tb_sekolah WHERE id_sekolah='".$id_sekolah."'";
		$sql1 = mysqli_query($conn, $query1);
		$data1 = mysqli_fetch_array($sql1);

		if(is_file("../assets/file/profile/".$data1['lg_sekolah']))
			unlink("../assets/file/profile/".$data1['lg_sekolah']);
		
		$query1 = "UPDATE tb_sekolah SET nm_sekolah='".$nm_sekolah."', kp_sekolah='".$kp_sekolah."', nk_sekolah='".$nk_sekolah."', lg_sekolah='".$lg_sekolahbaru."' WHERE id_sekolah='".$id_sekolah."'";
		$sql1 = mysqli_query($conn, $query1);

		if($sql1){
			echo "<script>window.location='pg_sekolah.php?toastr=warning_toast';</script>"; 
		}else{
			echo "<script>window.location='pg_sekolah.php?toastr=error_toast';</script>";
		}
}else{
	$query2 = "UPDATE tb_sekolah SET nm_sekolah='".$nm_sekolah."', kp_sekolah='".$kp_sekolah."', nk_sekolah='".$nk_sekolah."' WHERE id_sekolah='".$id_sekolah."'";
	$sql2 = mysqli_query($conn, $query2);

	if($sql2){ 
		echo "<script>window.location='pg_sekolah.php?toastr=warning_toast';</script>";
	}else{
		echo "<script>window.location='pg_sekolah.php?toastr=error_toast';</script>";
	}
}

if(@$_POST['ubah_kop']){

	$ks_sekolah = $_FILES['ks_sekolah']['name'];
	$tmp2 = $_FILES['ks_sekolah']['tmp_name'];
	$extensi = explode(".", $_FILES['ks_sekolah']['name']);
	$ks_sekolahbaru = "Kop-".round(microtime(true)).".".end($extensi);
	$path2 = "../assets/file/profile/".$ks_sekolahbaru;
	move_uploaded_file($tmp2, $path2);

		$query2 = "SELECT * FROM tb_sekolah WHERE id_sekolah='".$id_sekolah."'";
		$sql2 = mysqli_query($conn, $query2);
		$data2 = mysqli_fetch_array($sql2);

		if(is_file("../assets/file/profile/".$data2['ks_sekolah']))
			unlink("../assets/file/profile/".$data2['ks_sekolah']);
		
		$query2 = "UPDATE tb_sekolah SET nm_sekolah='".$nm_sekolah."', kp_sekolah='".$kp_sekolah."', nk_sekolah='".$nk_sekolah."', ks_sekolah='".$ks_sekolahbaru."' WHERE id_sekolah='".$id_sekolah."'";
		$sql2 = mysqli_query($conn, $query2);

		if($sql2){
			echo "<script>window.location='pg_sekolah.php?toastr=warning_toast';</script>"; 
		}else{
			echo "<script>window.location='pg_sekolah.php?toastr=error_toast';</script>";
		}
}else{
	$query2 = "UPDATE tb_sekolah SET nm_sekolah='".$nm_sekolah."', kp_sekolah='".$kp_sekolah."', nk_sekolah='".$nk_sekolah."' WHERE id_sekolah='".$id_sekolah."'";
	$sql2 = mysqli_query($conn, $query2);

	if($sql2){ 
		echo "<script>window.location='pg_sekolah.php?toastr=warning_toast';</script>";
	}else{
		echo "<script>window.location='pg_sekolah.php?toastr=error_toast';</script>";
	}
}

?>

