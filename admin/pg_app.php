<?php
error_reporting(0);
include 'pages/head.php';
include '../config/koneksi.php';
?>

        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Aplikasi</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pengaturan Aplikasi</h4>
                            <hr>
                            <ul class="nav nav-pills mb-3">
                                <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Maintenance</a>
                                </li>
                                <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Pengumuman</a>
                                </li>
                                <li class="nav-item"><a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="false">Reset Data</a>
                                </li>
                            </ul>
                            <hr>
                            <div class="tab-content br-n pn">
                                <div id="navpills-1" class="tab-pane active">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 col-md-8 col-xl-10">
                                            <div class="container">
                                                <table class="table table-borderless">
                                                    <?php
                                                    $pilihdata = mysqli_query($conn, "SELECT * FROM tb_maintenance");
                                                    $data = mysqli_fetch_array($pilihdata);
                                                    ?>
                                                    <tr>
                                                        <td width="20%">Status</td>
                                                        <td>
                                                            <?php
                                                            if ($data['st_maintenance']=='Aktif') {
                                                                ?>
                                                                <div class="badge badge-success text-white">
                                                                    <?php echo $data['st_maintenance']; ?>
                                                                </div>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <div class="badge badge-danger text-white">
                                                                    <?php echo $data['st_maintenance']; ?>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="20%">Isi</td>
                                                        <td>
                                                            <?php
                                                            if ($data['st_maintenance']=='Aktif') {
                                                                ?>
                                                                <div class="text-info">
                                                                    <?php echo $data['ps_maintenance']; ?>
                                                                </div>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                Maintenance tidak aktif
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#me_main" id="te_main" data-id="<?php echo $data['id_maintenance']; ?>" data-st="<?php echo $data['st_maintenance']; ?>" data-ps="<?php echo $data['ps_maintenance']; ?>">Ubah</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="navpills-2" class="tab-pane">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 col-md-8 col-xl-10">
                                            <div class="container">
                                                <table class="table table-borderless">
                                                    <?php
                                                    $pilihdata = mysqli_query($conn, "SELECT * FROM tb_pengumuman");
                                                    $data = mysqli_fetch_array($pilihdata);
                                                    ?>
                                                    <tr>
                                                        <td width="20%">Status</td>
                                                        <td>
                                                            <?php
                                                            if ($data['st_pengumuman']=='Aktif') {
                                                                ?>
                                                                <div class="badge badge-success text-white">
                                                                    <?php echo $data['st_pengumuman']; ?>
                                                                </div>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <div class="badge badge-danger text-white">
                                                                    <?php echo $data['st_pengumuman']; ?>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="20%">Isi</td>
                                                        <td>
                                                            <?php
                                                            if ($data['st_pengumuman']=='Aktif') {
                                                                ?>
                                                                <div class="text-info">
                                                                    <?php echo $data['ps_pengumuman']; ?>
                                                                </div>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                Pengumuman tidak aktif
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#me_umum" id="te_umum" data-id="<?php echo $data['id_pengumuman']; ?>" data-st="<?php echo $data['st_pengumuman']; ?>" data-ps="<?php echo $data['ps_pengumuman']; ?>">Ubah</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="navpills-3" class="tab-pane">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 col-md-8 col-xl-10">
                                            <div class="container">
                                                <button type="button" class="btn btn-sm btn-danger text-white mb-3" data-toggle="modal" data-target="#mr_nilai">Reset Nilai</button>
                                                <button type="button" class="btn btn-sm btn-danger text-white mb-3" data-toggle="modal" data-target="#mr_users">Reset Users</button>
                                                <button type="button" class="btn btn-sm btn-danger text-white mb-3" data-toggle="modal" data-target="#mr_log">Reset Histori Log</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
            <section>
                <?php include 'modals/md_main.php'; ?>
                <?php include 'modals/md_umum.php'; ?>
                <?php include 'modals/mr_nilai.php'; ?>
                <?php include 'modals/mr_users.php'; ?>
                <?php include 'modals/mr_log.php'; ?>
            </section>
        </div>

<?php include 'pages/foot.php'; ?>
<script>
  $(document).on("click", "#te_main", function(){
      var id = $(this).data('id');
      var st = $(this).data('st');
      var ps = $(this).data('ps');

      $("#me_main #id_maintenance").val(id);
      $("#me_main #st_maintenance").val(st);
      $("#me_main #ps_maintenance").val(ps);
    })

  $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'ae_main.php',
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

  $(document).on("click", "#te_umum", function(){
      var id = $(this).data('id');
      var st = $(this).data('st');
      var ps = $(this).data('ps');

      $("#me_umum #id_pengumuman").val(id);
      $("#me_umum #st_pengumuman").val(st);
      $("#me_umum #ps_pengumuman").val(ps);
    })

  $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'ae_umum.php',
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