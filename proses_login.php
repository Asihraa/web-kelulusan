<?php
error_reporting(0);
include 'config/koneksi.php';
if (isset($_POST['login'])) {
	function anti_injection($data){
		$filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
		return $filter;
	}

	$us_admin = anti_injection($_POST['us_admin']);
	$ps_admin = anti_injection(MD5($_POST['ps_admin']));

	$injeksi_us_admin = mysqli_real_escape_string($conn, $us_admin);
	$injeksi_ps_admin = mysqli_real_escape_string($conn, $ps_admin);

	$cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE 
      us_admin = '".mysqli_real_escape_string($conn, $_POST['us_admin'])."' AND 
      ps_admin = '".MD5(mysqli_real_escape_string($conn, $_POST['ps_admin']))."' 
      ");

	$user = mysqli_fetch_array($cek);
	$id_admin = $user['id_admin'];
	$nm_admin = $user['nm_admin'];
	$rl_admin = $user['rl_admin'];

	$log = mysqli_query($conn, "INSERT INTO tb_log VALUES('', '$nm_admin', '".date('Y-m-d')."', '$rl_admin')");
	
	if (mysqli_num_rows($cek) > 0) {

		session_start();
		$_SESSION['start_login'] = true;
		$_SESSION['id_admin'] = $id_admin;
		$_SESSION['nm_admin'] = $nm_admin;
		$_SESSION['rl_admin'] = $rl_admin;

		if ($rl_admin=='Admin') {
			echo '<script>window.location="admin/index.php"</script>';
		}elseif ($rl_admin=='') {
			echo '<script>window.location="index.php?toastr=error_toast"</script>';
		}

	}else{
      echo '<script>window.location="index.php?toastr=error_toast"</script>';
	}
}
?>