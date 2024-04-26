<?php
include '../config/koneksi.php';

//HAPUS JURUSAN
if (isset($_GET['idj'])) {
	$delkel = mysqli_query($conn, "DELETE FROM tb_jurusan WHERE id_jurusan = '".$_GET['idj']."' ");
	echo '<script>window.location.assign("pg_sekolah.php?toastr=warning_toast");</script>';
}

//HAPUS KELAS
if (isset($_GET['idk'])) {
	$delkel = mysqli_query($conn, "DELETE FROM tb_kelas WHERE id_kelas = '".$_GET['idk']."' ");
	echo '<script>window.location.assign("pg_sekolah.php?toastr=warning_toast");</script>';
}

//HAPUS JURUSAN
if (isset($_GET['idklm'])) {
	$delkel = mysqli_query($conn, "DELETE FROM tb_kelmapel WHERE id_kelmapel = '".$_GET['idklm']."' ");
	echo '<script>window.location.assign("pg_sekolah.php?toastr=warning_toast");</script>';
}

//HAPUS MAPEL
if (isset($_GET['idm'])) {
	$delkel = mysqli_query($conn, "DELETE FROM tb_mapel WHERE id_mapel = '".$_GET['idm']."' ");
	echo '<script>window.location.assign("pg_sekolah.php?toastr=warning_toast");</script>';
}

//HAPUS MAPEL
if (isset($_GET['idmp'])) {
	$delkel = mysqli_query($conn, "DELETE FROM tb_mmapel WHERE id_mmapel = '".$_GET['idmp']."' ");
	echo '<script>window.location.assign("pg_sekolah.php?toastr=warning_toast");</script>';
}

?>