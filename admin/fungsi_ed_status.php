<?php
 
function query($data){
	global $conn;
	$perintah=mysqli_query($conn, $data);
	if(!$perintah) die("Gagal query :".mysqli_connect_error());
	return $perintah;
}
function update($type, $data){

	$sql="UPDATE tb_siswa SET st_siswa='$type' WHERE id_siswa IN ($data)";
	$perintah=query($sql);
	return $perintah;
	
}

?>