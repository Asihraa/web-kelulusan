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
    <link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                                            <a href="pg_users.php"><i class="icon-user"></i> <span>Profil</span></a>
                                        </li>
                                        <hr class="my-2">
                                        <li><a href="logout.php" onclick="return confirm('Keluar aplikasi');"><i class="icon-key"></i> <span>Keluar</span></a></li>
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
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="index.php" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="pg_skl.php" aria-expanded="false">
                            <i class="icon-layers menu-icon"></i><span class="nav-text">Cetak SKL</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Data Nilai</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="pg_leger.php">Leger Nilai</a></li>
                            <li><a href="pg_datanilai.php">Data Nilai</a></li>
                            <li><a href="pg_nilai.php">Input Nilai</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-settings menu-icon"></i><span class="nav-text">Pengaturan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="pg_users.php">Users</a></li>
                            <li><a href="pg_siswa.php">Data Siswa</a></li>
                            <li><a href="pg_kelulusan.php">Kelulusan</a></li>
                            <li><a href="pg_sekolah.php">Sekolah</a></li>
                            <li><a href="pg_app.php">Aplikasi</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php" onclick="return confirm('Keluar aplikasi');" aria-expanded="false">
                            <i class="icon-logout menu-icon"></i><span class="nav-text">Keluar</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
