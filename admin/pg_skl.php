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
    
    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

?>

        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">SKL</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Cetak SKL</h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration table-sm">
                                        <thead>
                                            <tr>
                                                <th class="bg bg-dark text-center" width="3px"><center>No.</center></th>
                                                <th class="bg bg-dark text-center">Nama</th>
                                                <th class="bg bg-dark text-center">Kelas</th>
                                                <th class="bg bg-dark text-center">Jurusan</th>
                                                <th class="bg bg-dark text-center">Status</th>
                                                <th class="bg bg-dark text-center">Cetak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=1;
                                            $siswa = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE st_siswa='Lulus'");
                                            while ($data = mysqli_fetch_array($siswa)) {
                                            ?>
                                            <tr>
                                                <td align="center" width="3px"><?php echo $no++; ?></td>
                                                <td>
                                                    <u>
                                                        <b>
                                                            <a href="#" class="text-primary" id="td_siswa" data-toggle="modal" data-target="#md_siswa" 
                                                            data-id="<?php echo $data['id_siswa']; ?>"
                                                            data-ft="<?php echo $data['ft_siswa']; ?>"
                                                            data-kl="<?php echo $data['kl_siswa']; ?>"
                                                            data-nm="<?php echo $data['nm_siswa']; ?>"
                                                            data-jr="<?php echo $data['jr_siswa']; ?>"
                                                            data-tm="<?php echo $data['tm_siswa']; ?>"
                                                            data-tg="<?php echo tgl_indo($data['tg_siswa']); ?>"
                                                            data-ni="<?php echo $data['ni_siswa']; ?>"
                                                            data-ns="<?php echo $data['ns_siswa']; ?>"
                                                            data-np="<?php echo $data['np_siswa']; ?>"
                                                            data-nu="<?php echo $data['nu_siswa']; ?>"
                                                            data-st="<?php echo $data['st_siswa']; ?>"
                                                            >
                                                        <?php
                                                            $nama = $data['nm_siswa'];
                                                            $nama_kecil = strtolower($nama);
                                                            $nama_new = ucwords($nama_kecil);
                                                            echo $nama_new;
                                                        ?>
                                                        </a>
                                                        </b>
                                                    </u>
                                                </td>
                                                <td><?php echo $data['kl_siswa']; ?></td>
                                                <td><?php echo $data['jr_siswa'] ?></td>
                                                <td align="center">
                                                    <?php
                                                    $status = $data['st_siswa'];
                                                    if ($status=='Lulus') {
                                                         ?>
                                                            <span class="badge badge-success text-white">
                                                                <?php echo $data['st_siswa']; ?>
                                                            </span>
                                                        <?php
                                                     }else{
                                                        ?>
                                                            <span class="badge badge-danger text-white">
                                                                <?php echo $data['st_siswa']; ?>
                                                            </span>
                                                        <?php
                                                     }
                                                    ?>
                                                </td>
                                                <td align="center">
                                                    <?php
                                                    $cetaktranskrip = mysqli_query($conn, "SELECT * FROM tb_formatskl");
                                                    $dt = mysqli_fetch_array($cetaktranskrip);
                                                    if ($dt['st_formatskl']=='Diterbitkan') {
                                                    ?>
                                                    <button class="btn btn-info btn-xs text-white" onclick="window.location='cet_skl.php?ids=<?php echo $data['id_siswa']; ?>'">SKL</button>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <button type="button" class="btn btn-sm btn-secondary text-white ml-1" data-toggle="modal" data-target="#mer_skl">SKL</button>
                                                    <?php
                                                    }

                                                    $cetaktranskrip = mysqli_query($conn, "SELECT * FROM tb_formatskl");
                                                    $dt = mysqli_fetch_array($cetaktranskrip);
                                                    if ($dt['st_formatskl']=='Diterbitkan') {
                                                    ?>
                                                    <button class="btn btn-warning btn-xs text-white" onclick="window.location='cet_transkrip.php?ids=<?php echo $data['id_siswa']; ?>'">Transkrip</button>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <button type="button" class="btn btn-sm btn-secondary text-white ml-1" data-toggle="modal" data-target="#mer_skl">Transkrip</button>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
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
                <?php
                include 'modals/mer_skl.php';
                include 'modals/md_siswa.php';
                ?>
            </section>
        </div>

<?php include 'pages/foot.php'; ?>
<script>

      $(document).on("click", "#td_siswa", function(){
          var id = $(this).data('id');
          var ft = $(this).data('ft');
          var kl = $(this).data('kl');
          var nm = $(this).data('nm');
          var jr = $(this).data('jr');
          var tm = $(this).data('tm');
          var tg = $(this).data('tg');
          var ni = $(this).data('ni');
          var ns = $(this).data('ns');
          var np = $(this).data('np');
          var nu = $(this).data('nu');
          var st = $(this).data('st');

          $("#md_siswa #id_siswa").text(id);
          $("#md_siswa #ft_siswa").attr("src", "../assets/file/foto/"+ft);
          $("#md_siswa #kl_siswa").text(kl);
          $("#md_siswa #nm_siswa").text(nm);
          $("#md_siswa #jr_siswa").text(jr);
          $("#md_siswa #tm_siswa").text(tm);
          $("#md_siswa #tg_siswa").text(tg);
          $("#md_siswa #ni_siswa").text(ni);
          $("#md_siswa #ns_siswa").text(ns);
          $("#md_siswa #np_siswa").text(np);
          $("#md_siswa #nu_siswa").text(nu);
          $("#md_siswa #st_siswa").text(st);
        })

</script>