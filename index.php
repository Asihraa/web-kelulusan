<?php
session_start();
error_reporting(0);
include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SIK || 2021</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/file/profile/iconico.png">
    <!-- Custom Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/sweetalert2/css/sweetalert2.min.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <center>
                	<?php
                	$plsekolah=mysqli_query($conn, "SELECT * FROM tb_sekolah");
                	$dts=mysqli_fetch_object($plsekolah);

                	?>
                	<img src="assets/file/profile/<?php echo $dts->lg_sekolah; ?>" width="70px">
                	<br>
                	<?php

                	$pltahun=mysqli_query($conn, "SELECT * FROM tb_tahun");
                	$dtt=mysqli_fetch_object($pltahun);
                	?>
                	<br>
                    <h3>Sistem Informasi Kelulusan Siswa</h3>
                    <h4><?php echo $dts->nm_sekolah; ?></h4>
                    <h5>Tahun Ajaran <?php echo $dtt->nm_tahun; ?></h5>
                </center>
            </div>
        </div>
    </div>    
    <div class="col-12">
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-sm-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body">
                                <center>
                                <h4>SILAHKAN LOGIN</h4>
                                <br>
                                <form action="" method="post">
                                    <select name="pilihan" class="custom-select">
                                        <option value="">...</option>
                                        <option value="Siswa">SISWA</option>
                                        <option value="Admin">ADMIN</option>
                                    </select><br><br>
                                    <input type="submit" name="pilih" class="btn btn-primary" value="PILIH">
                                </form>
                                <?php
                                if (@$_POST['pilih']) {
                                    $data=$_POST['pilihan'];
                                    if ($data=='Siswa') {
                                        echo "<script>window.location='login_siswa.php'</script>";
                                    }else{
                                        echo "<script>window.location='login_admin.php'</script>";
                                    }
                                }
                                ?>
                                <br>
                                <div class="container">
                                    <div class="copyright">
                                        <p>&reg; Powered by <a href="#">Kang Mahmud</a> 2021</p>
                                    </div>
                                </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Footer start
        ***********************************-->
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="assets/plugins/common/common.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/gleek.js"></script>
    <script src="assets/js/styleSwitcher.js"></script>
    <script type="text/javascript">
           function change()
           {
              var x = document.getElementById('pass').type;

              if (x == 'password')
              {
                 document.getElementById('pass').type = 'text';
                 document.getElementById('mybutton').innerHTML = '<i class="icon-eye-slash"></i>';
              }
              else
              {
                 document.getElementById('pass').type = 'password';
                 document.getElementById('mybutton').innerHTML = '<i class="icon-eye"></i>';
              }
           }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <script type="text/javascript">
        <?php
        if (@$_GET['toastr']) {
            if (@$_GET['toastr'] == 'success_toast') {
                ?>
                    Swal.fire(
                      'Ok ... Mantab ...',
                      'Anda Telah Keluar ...',
                      'success'
                    )
                <?php
            }elseif (@$_GET['toastr'] == 'warning_toast') {
                ?>
                    Swal.fire(
                      'Maaf ...',
                      'Anda Harus Login Dulu ...',
                      'warning'
                    )
                <?php
            }elseif (@$_GET['toastr'] == 'error_toast') {
                ?>
                    Swal.fire(
                      'Oppss .. Maaf ...!',
                      'Username & Password Tidak Valid',
                      'error'
                    )
                <?php
            }
        }
        ?>
    </script>
</body>

</html>