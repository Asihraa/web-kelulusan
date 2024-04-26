<?php

// SILAHKAN SESUAIKAN KONFIGURASI DATABASE ANDA
// DENGAN MENGUBAH PARAMETER '$host,$user,$pass,$data' SESUAI DATABASE ANDA

$host='localhost';
$user='root';
$pass='';
$data='Smanja';

$conn=mysqli_connect($host,$user,$pass,$data);
if (!$conn) {
	echo '<script>window.location="error-500.php"</script>';
}

?>