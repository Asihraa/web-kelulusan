<?php
error_reporting(0);
include 'config/koneksi.php';

$plmain=mysqli_query($conn, "SELECT * FROM tb_maintenance");
$main=mysqli_fetch_array($plmain);
$buka = $main['st_maintenance'];

if ($buka == 'Aktif') {
	echo '<script>window.location="error-600.php"</script>';
}else{
	
	if (isset($_POST['login'])) {
		function anti_injection($data){
			$filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter;
		}

		$us_user = anti_injection($_POST['us_user']);
		$ps_user = anti_injection(MD5($_POST['ps_user']));

		$injeksi_us_user = mysqli_real_escape_string($conn, $us_user);
		$injeksi_ps_user = mysqli_real_escape_string($conn, $ps_user);

		$cek = mysqli_query($conn, "SELECT * FROM tb_user WHERE 
	      us_user = '".mysqli_real_escape_string($conn, $_POST['us_user'])."' AND 
	      ps_user = '".MD5(mysqli_real_escape_string($conn, $_POST['ps_user']))."' 
	      ");

		$user = mysqli_fetch_array($cek);
		$id_user = $user['id_user'];
		$nm_user = $user['nm_user'];
		$rl_user = $user['rl_user'];

		$log = mysqli_query($conn, "INSERT INTO tb_log VALUES('', '$nm_user', '".date('Y-m-d')."', '$rl_user')");

		if (mysqli_num_rows($cek) > 0) {

			session_start();
			$_SESSION['start_login'] = true;
			$_SESSION['id_user'] = $id_user;
			$_SESSION['nm_user'] = $nm_user;
			$_SESSION['rl_user'] = $rl_user;

			if ($rl_user == 'Siswa') {
				echo '<script>window.location="siswa/index.php"</script>';
			}elseif ($rl_user == '') {
				echo '<script>window.location="index.php?toastr=error_toast"</script>';
			}
		}else{
	      echo '<script>window.location="index.php?toastr=error_toast"</script>';
		}
	}
}
?>