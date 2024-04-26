<?php
error_reporting(0);
include '../config/koneksi.php';

$id_siswa = $_POST['id_siswa'];

if(@$_POST['ubah_foto']){

	$ft_siswa = $_FILES['ft_siswa']['name'];
	$tmp1 = $_FILES['ft_siswa']['tmp_name'];
	$extensi = explode(".", $_FILES['ft_siswa']['name']);
	$ft_siswabaru = "Foto-".round(microtime(true)).".".end($extensi);
	$path1 = "../assets/file/foto/".$ft_siswabaru;
	move_uploaded_file($tmp1, $path1);

		$query1 = "SELECT * FROM tb_siswa WHERE id_siswa='".$id_siswa."'";
		$sql1 = mysqli_query($conn, $query1);
		$data1 = mysqli_fetch_array($sql1);

		if(is_file("../assets/file/foto/".$data1['ft_siswa']))
			unlink("../assets/file/foto/".$data1['ft_siswa']);
		
		$query1 = "UPDATE tb_siswa SET ft_siswa='".$ft_siswabaru."' WHERE id_siswa='".$id_siswa."'";
		$sql1 = mysqli_query($conn, $query1);

		if($sql1){
			echo "<script>window.location='pg_siswa.php?toastr=warning_toast';</script>"; 
		}else{
			echo "<script>window.location='pg_siswa.php?toastr=error_toast';</script>";
		}
}else{
	echo "<script>window.location='pg_siswa.php?toastr=warning_toast';</script>";
}

?>

