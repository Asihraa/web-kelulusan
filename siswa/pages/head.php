<?php
session_start();
include '../config/koneksi.php';
if ($_SESSION['start_login'] != true) {
    echo '<script>window.location="../index.php?toastr=warning_toast"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SIK || 2021</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/file/profile/iconico.png">
    <!-- Custom Stylesheet -->
    <link href="../assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="../assets/sweetalert2/css/sweetalert2.min.css" rel="stylesheet">
    <link href="../assets/sweetalert2/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/sweetalert2/css/animate.min.css" rel="stylesheet">

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

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.php">
                    <span class="mb-6 mt-0"><img src="../assets/file/profile/icon.png" alt="" width="25px"></span>
                    <span class="brand-title text-white mt-12">
                        <b>&nbsp;&nbsp;SIK </b>2021
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="../assets/file/profile/user.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="edit_users.php"><i class="icon-user"></i> <span>Profil</span></a>
                                        </li>
                                        <hr class="my-2">
                                        <li><a onclick="return confirm('Keluar aplikasi..?')" href="logout.php"><i class="icon-key"></i> <span>Keluar</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <div class="container" style="margin-top: 30px;">
                    <b>
                    <center>
                        <small>
                        Halaman Siswa <br>
                        Sistem Informasi Kelulusan Siswa <br>
                        Tahun Ajaran 2020/2021 <br>
                        </small>
                        <br>
                        <a onclick="return confirm('Keluar aplikasi..?')" href="logout.php"  class="btn btn-outline-info btn-sm">Logout</a>
                        <br>
                        <br>
                        <small><b>Powered by <a href="#">Kang Mahmud</a><br> &reg; 2021</b></small>
                    </center>
                    </b>
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
