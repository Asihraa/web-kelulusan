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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Kelulusan</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Pengumuman Kelulusan</h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-borderless">
                                        <thead>
                                            <tr>
                                                <th class="bg bg-dark">Rapat Kelulusan</th>
                                                <th class="bg bg-dark">Pengumuman</th>
                                                <th class="bg bg-dark">Ubah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $PilihWaktu = mysqli_query($conn,"SELECT * FROM tb_kelulusan");
                                            $data=mysqli_fetch_array($PilihWaktu);
                                            ?>
                                            <tr>
                                                <td>
                                                    <small>Tanggal : <?php echo tgl_indo($data['tg_kelulusan']) ?></small><br>
                                                    <small>Tempat : <?php echo $data['tp_kelulusan'] ?></small><br>
                                                    <small>Waktu : <?php echo $data['wm_kelulusan'] ?> s.d <?php echo $data['ws_kelulusan'] ?> <?php echo $data['zw_kelulusan'] ?></small>
                                                </td>
                                                <td>
                                                    <small>No. SK : <?php echo $data['ns_kelulusan'] ?></small><br>
                                                    <small>Tanggal Buka : <?php echo tgl_indo($data['tb_kelulusan']) ?></small><br>
                                                    <small>Status : 
                                                        <?php
                                                        $stts = $data['st_kelulusan'];
                                                        if ($stts=='Dibuka') {
                                                            ?>
                                                            <span class="badge badge-success text-white">
                                                                <?php echo $stts; ?>
                                                            </span>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <span class="badge badge-danger text-white">
                                                                <?php echo $stts; ?>
                                                            </span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </small>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success text-white" id="te_kelulusan" href="#" data-toggle="modal" data-target="#me_kelulusan" 
                                                    data-id="<?php echo $data['id_kelulusan']; ?>" 
                                                    data-tg="<?php echo $data['tg_kelulusan']; ?>" 
                                                    data-tp="<?php echo $data['tp_kelulusan']; ?>" 
                                                    data-wm="<?php echo $data['wm_kelulusan']; ?>" 
                                                    data-ws="<?php echo $data['ws_kelulusan']; ?>" 
                                                    data-zw="<?php echo $data['zw_kelulusan']; ?>" 
                                                    data-ns="<?php echo $data['ns_kelulusan']; ?>" 
                                                    data-tb="<?php echo $data['tb_kelulusan']; ?>" 
                                                    data-st="<?php echo $data['st_kelulusan']; ?>">
                                                    Ubah
                                                    </a>
                                                </td>
                                            </tr>
                                    </table>
                                </div>
                                <hr>
                                <h6 class="card-title">SKL</h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-borderless">
                                        <thead>
                                            <tr>
                                                <th class="bg bg-dark">Data SKL</th>
                                                <th class="bg bg-dark">Ubah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $PilihFormat = mysqli_query($conn,"SELECT * FROM tb_formatskl");
                                            $data=mysqli_fetch_array($PilihFormat);
                                            ?>
                                            <tr>
                                                <td>
                                                    <small>Tempat Terbit : <?php echo $data['tp_formatskl'] ?></small><br>
                                                    <small>Tanggal Terbit : <?php echo tgl_indo($data['tg_formatskl']) ?></small><br>
                                                    <small>Format Nomor : <?php echo $data['fr_formatskl'] ?></small><br>
                                                    <small>Bulan Terbit : <?php echo $data['bl_formatskl'] ?></small><br>
                                                    <small>Tahun Terbit : <?php echo $data['th_formatskl'] ?></small><br>
                                                    <small>Status :
                                                    <?php
                                                    $st = $data['st_formatskl'];
                                                    if ($st=='Diterbitkan') {
                                                        ?>
                                                        <span class="badge badge-success text-white">
                                                            <?php echo $st; ?>
                                                        </span>
                                                        <?php
                                                    }else{
                                                        ?> 
                                                        <span class="badge badge-danger text-white">
                                                            <?php echo $st; ?>
                                                        </span>
                                                        <?php
                                                    } ?>
                                                    </small>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success text-white" id="te_formatskl" href="#" data-toggle="modal" data-target="#me_formatskl" 
                                                    data-id="<?php echo $data['id_formatskl']; ?>" 
                                                    data-tp="<?php echo $data['tp_formatskl']; ?>" 
                                                    data-tg="<?php echo $data['tg_formatskl']; ?>" 
                                                    data-fr="<?php echo $data['fr_formatskl']; ?>" 
                                                    data-bl="<?php echo $data['bl_formatskl']; ?>" 
                                                    data-th="<?php echo $data['th_formatskl']; ?>" 
                                                    data-st="<?php echo $data['st_formatskl']; ?>">
                                                    Ubah
                                                    </a>
                                                </td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
            <section>
                <?php include 'modals/me_kelulusan.php'; ?>
                <?php include 'modals/me_formatskl.php'; ?>
            </section>
        </div>

<?php include 'pages/foot.php'; ?>
<script>
      $(document).on("click", "#te_kelulusan", function(){
          var id = $(this).data('id');
          var tg = $(this).data('tg');
          var tp = $(this).data('tp');
          var wm = $(this).data('wm');
          var ws = $(this).data('ws');
          var zw = $(this).data('zw');
          var ns = $(this).data('ns');
          var tb = $(this).data('tb');
          var st = $(this).data('st');

          $("#me_kelulusan #id_kelulusan").val(id);
          $("#me_kelulusan #tg_kelulusan").val(tg);
          $("#me_kelulusan #tp_kelulusan").val(tp);
          $("#me_kelulusan #wm_kelulusan").val(wm);
          $("#me_kelulusan #ws_kelulusan").val(ws);
          $("#me_kelulusan #zw_kelulusan").val(zw);
          $("#me_kelulusan #ns_kelulusan").val(ns);
          $("#me_kelulusan #tb_kelulusan").val(tb);
          $("#me_kelulusan #st_kelulusan").val(st);
        })

      $(document).ready(function(e){
        $('#form').on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url : 'ae_kelulusan.php',
                type : 'POST',
                data : new FormData(this),
                contentType : false,
                cache : false,
                processData : false,
                success : function(msg){
                    $('.table').html(msg);
                }
            });
        });
      })

      $(document).on("click", "#te_formatskl", function(){
          var id = $(this).data('id');
          var tp = $(this).data('tp');
          var tg = $(this).data('tg');
          var fr = $(this).data('fr');
          var bl = $(this).data('bl');
          var th = $(this).data('th');
          var st = $(this).data('st');

          $("#me_formatskl #id_formatskl").val(id);
          $("#me_formatskl #tp_formatskl").val(tp);
          $("#me_formatskl #tg_formatskl").val(tg);
          $("#me_formatskl #fr_formatskl").val(fr);
          $("#me_formatskl #bl_formatskl").val(bl);
          $("#me_formatskl #th_formatskl").val(th);
          $("#me_formatskl #st_formatskl").val(st);
        })

      $(document).ready(function(e){
        $('#form').on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url : 'ae_formatskl.php',
                type : 'POST',
                data : new FormData(this),
                contentType : false,
                cache : false,
                processData : false,
                success : function(msg){
                    $('.table').html(msg);
                }
            });
        });
      })

</script>