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

            <div class="container-fluid">
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
                            <h4>Selamat Datang <b><?php echo $_SESSION['nm_user']; ?></b></h4>
                            <?php
                            $cetakskl = mysqli_query($conn, "SELECT * FROM tb_formatskl");
                            $dt = mysqli_fetch_array($cetakskl);
                            if ($dt['st_formatskl']=='Diterbitkan') {
                            ?>
                            Untuk Mencetak SKL & Transkrip Nilai, Silahkan klik tombol berikut
                            <br><br>
                            <?php
                            $siswa=$_SESSION['nm_user'];
                            $pilihsiswa = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE nm_siswa='$siswa'");
                            $data=mysqli_fetch_array($pilihsiswa);
                            ?>
                            <ul class="nav nav-pills">
                                <?php
                                $status=$data['st_siswa'];
                                if ($status=='Lulus') {
                                ?>
                                <li class="nav-item mr-1">
                                    <button class="btn btn-info text-white" onclick="window.location='cet_skl.php?ids=<?php echo $data['id_siswa']; ?>'">SKL
                                    </button>
                                </li>
                                <li class="nav-item ml-1">
                                    <button class="btn btn-warning text-white" onclick="window.location='cet_transkrip.php?ids=<?php echo $data['id_siswa']; ?>'">Transkrip</button>
                                </li>
                                <?php
                                }else{
                                    ?>
                                    <b class="text-danger">Mohon Maaf <?php echo $data['nm_siswa'] ?>. SKL & Transkrip Nilai anda belum dapat diterbitkan</b>
                                    <?php
                                } ?>
                            </ul>
                            <?php
                            }else{
                            ?>
                            <p class="text-danger">Saat ini SKL belum diterbitkan, Silahkan hubungi Admin</p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                $pengumuman = mysqli_query($conn, "SELECT * FROM tb_pengumuman");
                $pg = mysqli_fetch_array($pengumuman);
                if ($pg['st_pengumuman']=='Aktif') {
                ?>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <b>PENGUMUMAN PENTING</b>
                            <hr>
                            <p><?php echo $pg['ps_pengumuman']; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <section>
            <?php
            include 'modals/mer_skl.php';
            $pilumum = mysqli_query($conn, "SELECT * FROM tb_kelulusan");
            $du = mysqli_fetch_array($pilumum);
            if ($du['st_kelulusan']=='Dibuka') {
            ?>
                <div class="p-20">
                  <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-lg">
                          <!-- Modal content-->
                          <div class="modal-content">
                              <div class="modal-body">
                                <div class="table-responsive">
                                    <center class="text-dark">
                                        <?php
                                        $pilsek = mysqli_query($conn, "SELECT * FROM tb_sekolah");
                                        $ds = mysqli_fetch_array($pilsek);
                                        ?>
                                        <img src="../assets/file/profile/<?php echo $ds['ks_sekolah']?>">
                                        <br><br>
                                        <b>
                                            <u><h4>PENGUMUMAN KELULUSAN</h4></u>
                                            <h6>NOMOR : <?php echo $du['ns_kelulusan']; ?></h6>
                                        </b>
                                        <center>
                                        <p class="text-dark">
                                        Berdasarkan Hasil Rapat Pendidik & Tenaga Kependidikan <?php echo $ds['nm_sekolah']; ?> <br>
                                        yang dilaksanakan pada tanggal <?php echo tgl_indo($du['tg_kelulusan']); ?> pukul <?php echo $du['wm_kelulusan']; ?> s.d. <?php echo $du['ws_kelulusan']; ?> <?php echo $du['zw_kelulusan']; ?><br>

                                        <?php
                                        $pilsis = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE nm_siswa='".$_SESSION['nm_user']."'");
                                        $dw = mysqli_fetch_array($pilsis);
                                        ?>

                                        Dengan ini diputuskan bahwa : <br>
                                        <table>
                                            <tr>
                                                <td><b>Nama&nbsp;&nbsp;</b></td>
                                                <td><b> : <?php echo strtoupper($dw['nm_siswa']); ?></b></td>
                                            </tr>
                                            <tr>
                                                <td><b>NIS&nbsp;&nbsp;</b></td>
                                                <td><b> : <?php echo $dw['ni_siswa']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td><b>NISN&nbsp;&nbsp;</b></td>
                                                <td><b> : <?php echo $dw['ns_siswa']; ?></b></td>
                                            </tr>
                                        </table>
                                        <br>
                                        Dinyatakan
                                        <br>
                                        <h3><?php echo $dw['st_siswa']; ?></h3>

                                        dalam menempuh pendidikan di <?php echo $ds['nm_sekolah']; ?> Tahun Ajaran
                                        <?php
                                            $tahun=mysqli_query($conn, "SELECT nm_tahun FROM tb_tahun");
                                            $th=mysqli_fetch_array($tahun);
                                            echo $th['nm_tahun'];
                                        ?> <br><br>
                                        <?php echo $du['tp_kelulusan']; ?><br>
                                        Kepala <?php echo $ds['nm_sekolah']; ?><br><br><br>
                                        <u><?php echo $ds['kp_sekolah']; ?></u><br>
                                        NIP : <?php echo $ds['nk_sekolah']; ?>
                                        </p>
                                    </center>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-warning text-white" data-dismiss="modal">Tutup</button>
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
                </div>
            <?php } ?>
            <?php //echo $data['ps_pengumuman']; ?>
            </section>
            <!-- #/ container -->
        </div>

<?php include 'pages/foot.php'; ?>
