<?php
error_reporting(0);
include 'pages/head.php';
include '../config/koneksi.php';

function tgl_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>

        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <?php
                    $HitungSiswa=mysqli_query($conn, "SELECT st_siswa, COUNT(id_siswa) AS jml FROM tb_siswa");
                    $sisjml=mysqli_fetch_array($HitungSiswa);

                    $HitungLulus=mysqli_query($conn, "SELECT st_siswa, COUNT(id_siswa) AS ls FROM tb_siswa WHERE st_siswa='Lulus'");
                    $sisls=mysqli_fetch_array($HitungLulus);

                    $HitungTidaklulus=mysqli_query($conn, "SELECT st_siswa, COUNT(id_siswa) AS tl FROM tb_siswa WHERE st_siswa='Tidak Lulus'");
                    $sistl=mysqli_fetch_array($HitungTidaklulus);
                    ?>
                    <div class="col-4 col-sm-4">
                        <div class="card card-widget">
                            <div class="card-body gradient-8">
                                <div class="media">
                                    <span class="card-widget__icon"><i class="icon-user"></i></span>
                                    <div class="media-body">
                                        <h4 class="card-widget__title"><?php echo $sisjml['jml']; ?></h4>
                                        <h5 class="card-widget__subtitle">Total Siswa</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 col-sm-4">
                        <div class="card card-widget">
                            <div class="card-body gradient-4">
                                <div class="media">
                                    <span class="card-widget__icon"><i class="icon-user-following"></i></span>
                                    <div class="media-body">
                                        <h4 class="card-widget__title"><?php echo $sisls['ls']; ?></h4>
                                        <h5 class="card-widget__subtitle">Siswa Lulus</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 col-sm-4">
                        <div class="card card-widget">
                            <div class="card-body gradient-9">
                                <div class="media">
                                    <span class="card-widget__icon"><i class="icon-user-unfollow"></i></span>
                                    <div class="media-body">
                                        <h4 class="card-widget__title"><?php echo $sistl['tl']; ?></h4>
                                        <h5 class="card-widget__subtitle">Tidak Lulus</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a href="#log" class="nav-link active">Histori Log</a>
                                </li>
                                <li class="nav-item"><a href="#perjanjian" class="nav-link">Perjanjian</a>
                                </li>
                                <li class="nav-item"><a href="#panduan" class="nav-link">Panduan</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3>Sistem Informasi Kelulusan Siswa</h3>
                                <h4>Tahun Ajaran 2020/2021</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>Selamat Datang <b><?php echo $_SESSION['nm_admin'] ?></b></h4>
                                <p>Aplikasi Sistem Informasi Kelulusan Siswa merupakan aplikasi pengumuman kelulusan siswa berbasis web</p>
                                <p>Aplikasi Sistem Informasi Kelulusan Siswa dikembangkan secara MANDIRI (bukan aplikasi buatan direktorat) yang bertujuan untuk membantu sekolah dalam mengelola pengumuman kelulusan dan Transkrip Nilai serta cetak Surat Keterangan Lulus (SKL)</p>
                                <p>Selain Sebagai Aplikasi Pengumuman Online, Aplikasi ini juga diperuntukkan untuk mengelola dan mencetak Surat Keterangan Lulus (SKL)</p>
                                <p>Surat keterangan lulus sekolah (SKL) adalah surat yang diterbitkan oleh pihak sekolah sebagai solusi dan pengganti dari ijazah yang belum keluar.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card" id="perjanjian">
                            <div class="card-body">
                                <h3>Perjanjian Penggunaan</h3>
                                <p>Dengan menggunakan Aplikasi Sistem Informasi Kelulusan Siswa, maka anda setuju untuk :</p>
                                Tidak mengubah Nama Aplikasi Sistem Informasi Kelulusan Siswa menjadi nama aplikasi lain <br><br>
                                Tidak mengubah footer yang menunjukkan Developer Aplikasi Kelulusan Sistem Informasi Kelulusan Siswa <br><br>
                                Tidak menjual Aplikasi Sistem Informasi Kelulusan Siswa. Tetapi anda diperbolehkan untuk mengambil keuntungan dari jasa proses instalasi, konsultasi dan lain sebagainya yang berkaitan dengan Aplikasi Sistem Informasi Kelulusan Siswa <br><br>
                                Tidak menhapus Perjanjian Penggunaan <br><br>
                                Semoga Aplikasi Sistem Informasi Kelulusan Siswa dapat bermanfaat untuk kita semua.
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card" id="panduan">
                            <div class="card-body">
                                <h3>Panduan Penggunaan</h3>
                                <p>Silahkan download panduan penggunaan aplikasi ini <a href="../assets/file/PANDUAN_ADMIN_SIK_2021.pdf" target="_blank" class="text-primary"><b><u>DI SINI</u></b></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card" id="log">
                            <div class="card-body">
                                <h4>Histori Login</h4>
                                <button type="button" class="btn btn-sm btn-danger text-white mb-3" data-toggle="modal" data-target="#mr_log">Reset Histori Log</button>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration table-sm">
                                        <thead>
                                            <tr>
                                                <th align="center" width="2px">No</th>
                                                <th>Nama</th>
                                                <th>Waktu</th>
                                                <th>Role</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=1;
                                            $AmbilLog=mysqli_query($conn, "SELECT * FROM tb_log ORDER BY wk_log DESC");
                                            while($data=mysqli_fetch_array($AmbilLog)){
                                            ?>
                                            <tr>
                                                <td align="center" width="2px"><?php echo $no++; ?></td>
                                                <td><?php echo $data['nm_log']; ?></td>
                                                <td><?php echo tgl_indo($data['wk_log']); ?></td>
                                                <td><?php echo $data['rl_log']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
            <section>
                <div class="p-20">
                  <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-lg">
                          <!-- Modal content-->
                          <div class="modal-content">
                              <div class="modal-body">
                                <div class="modal-body bg-success text-white">
                                  <center><b>UCAPAN TERIMA KASIH</b></center>
                                </div>
                                  <hr>
                                  <p>
                                    Terima kasih atas kepercayaan anda menggunakan aplikasi ini <br>
                                    Jika dirasa aplikasi ini bermanfaat, dan ingin membantu kami untuk mengembangkan aplikasi ini Dapat dilakukan dengan cara memberikan donasi agar kami lebih produktif lagi mengembangkan aplikasi yang bermanfaat untuk kebaikan. <br><br>
                                    Donasi anda dapat disalurkan ke rekening berikut :<br><br>
                                    <b>Nama Bank : Bank Mandiri</b><br>
                                    <b>No. Rek : 110-00-1099610-3</b><br>
                                    <b>Atas Nama : Muhammad Yunas</b>
                                  </p>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-warning text-white" data-dismiss="modal">Tutup</button>
                              </div>
                          </div>
                      </div>
                      </div>
                  </div>
                </div>
            <section>
                <?php include 'modals/mr_log.php'; ?>
            </section>
        </div>

<?php include 'pages/foot.php'; ?>