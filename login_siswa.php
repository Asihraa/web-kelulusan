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
    <div class="col-12" style="margin-top: 5%">
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-sm-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body">
                                <form action="proses_login_siswa.php" method="post" class="mt-5 mb-5">
                                    <center>
                                    <a class="text-center" href="index.php"> <h4>LOGIN SISWA</h4></a>
                                    <hr>
                                        <div class="form-group">
                                            <input type="text" class="form-control text-center" style="border: none;" placeholder="Username" name="us_user" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="ps_user" id="pass" class="form-control text-center" style="border: none;" placeholder="Password">
                                            <input type="checkbox" onclick="change()" id="ps_user" name="ps_user">
                                            <label for="ps_user" class="form-check-label mt-3">&nbsp;Show Password</label>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-info col-sm-12">Log In</button>
                                        <button type="button" onclick="self.history.back()" class="btn btn-outline-danger col-sm-12 mt-1">Kembali</button>
                                    </center>
                                </form>
                                <center>
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