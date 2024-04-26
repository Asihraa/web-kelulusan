 <?php
include '../config/koneksi.php';

$cekkode=mysqli_num_rows(mysqli_query($conn, "SELECT ni_siswa, ns_siswa FROM tb_siswa WHERE ni_siswa='".$_POST['ni_siswa']."' OR ns_siswa='".$_POST['ns_siswa']."'"));

    if ($cekkode > 0) {
        echo "<script>window.location='pg_siswa.php?toastr=confirmnis_toast';</script>";
    }
    else{

	$kl_siswa = $_POST['kl_siswa'];
	$nm_siswa = $_POST['nm_siswa'];
	$jr_siswa = $_POST['jr_siswa'];
	$tm_siswa = $_POST['tm_siswa'];
	$tg_siswa = $_POST['tg_siswa'];
	$ni_siswa = $_POST['ni_siswa'];
	$ns_siswa = $_POST['ns_siswa'];
	$np_siswa = $_POST['np_siswa'];

	$ft_siswa = $_FILES['ft_siswa']['name'];
	$tmp1 = $_FILES['ft_siswa']['tmp_name'];
	$extensi = explode(".", $_FILES['ft_siswa']['name']);
	$ft_siswa = "Foto-".round(microtime(true)).".".end($extensi);
	$path1 = "../assets/file/foto/".$ft_siswa;
	move_uploaded_file($tmp1, $path1);

	$nu_siswa = $_POST['nu_siswa'];
	$st_siswa = $_POST['st_siswa'];
 
	$tambah = mysqli_query($conn, "INSERT INTO tb_siswa VALUES(
	'',
	'".$kl_siswa."',
	'".$nm_siswa."',
	'".$jr_siswa."',
	'".$tm_siswa."',
	'".$tg_siswa."',
	'".$ni_siswa."',
	'".$ns_siswa."',
	'".$np_siswa."',
	'".$ft_siswa."',
	'".$nu_siswa."',
	'".$st_siswa."'
	)");

	if ($tambah) {
		echo "<script>window.location='pg_siswa.php?toastr=success_toast';</script>";
	}else{
		echo "<script>window.location='pg_siswa.php?toastr=warning_toast';</script>";
	}
}
?>

