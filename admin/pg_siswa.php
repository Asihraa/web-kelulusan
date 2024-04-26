<?php
error_reporting(0);
include 'pages/head.php';
include '../config/koneksi.php';
include 'fungsi_ed_status.php';

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

$nip_err = $up_type_err ="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    
    if(empty($_POST['id_siswa'])){
        $nip_err = "Anda belum memilih siswa..!!";
    }else{
        $id_siswa = $_POST['id_siswa'];
        $id_siswa = implode(",", $id_siswa);
    }
    if(empty($_POST['update_type'])){
        $up_type_err = "Anda belum memilih kelas..!!";
    }else{
        $update_type = $_POST['update_type'];
    }
    if(empty($nip_err) && empty($up_type_err)){
        if(update($update_type, $id_siswa)):
            echo "<script>window.location='pg_siswa.php?toastr=warning_toast';</script>";
        else:
            echo "<script>window.location='pg_siswa.php?toastr=error_toast';</script>";
        endif;
    }
}
?>

        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Siswa</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Data Siswa</h6>
                                <hr>
                                <div class="container">
                                    <button type="button" class="btn btn-sm btn-info text-white ml-1" data-toggle="modal" data-target="#mt_siswa">Tambah</button>
                                    <button type="button" class="btn btn-sm btn-success text-white" data-toggle="modal" data-target="#mi_siswa">Import</button>
                                    <button type="button" class="btn btn-sm btn-warning text-white" onclick="window.location='pg_siswa.php'">Refresh</button>
                                </div>
                                <hr>
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration table-sm">
                                        <thead>
                                            <tr>
                                                <th width="3px"><center>No.</center></th>
                                                <th>Cek</th>
                                                <th>Nama</th>
                                                <th>Foto</th>
                                                <th>No. SKL</th>
                                                <th>NIS</th>
                                                <th>Status</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=1;
                                            $PilihSiswa=mysqli_query($conn,"SELECT * FROM tb_siswa ORDER BY nm_siswa ASC");
                                            while($data=mysqli_fetch_array($PilihSiswa)){
                                            ?>
                                            <tr>
                                                <td align="center" width="3px"><?php echo $no++; ?></td>
                                                <td width="3px" align="center">
                                                    <input type="checkbox" name="id_siswa[]" value="<?php echo $data['id_siswa']; ?>">
                                                </td>
                                                <td>
                                                    <small>
                                                    <u><b>
                                                        <?php
                                                            $nama = $data['nm_siswa'];
                                                            $nama_kecil = strtolower($nama);
                                                            $nama_new = ucwords($nama_kecil);
                                                            echo $nama_new;
                                                        ?>
                                                    </b></u><br>
                                                    Kelas : <?php echo $data['kl_siswa']; ?><br>
                                                    Jurusan : <?php echo $data['jr_siswa']; ?>
                                                    </small>
                                                </td>
                                                <td>
                                                    <center>
                                                        <img class="img-thumbnail" src="../assets/file/foto/<?php echo $data['ft_siswa']; ?>" width="50px"><br>
                                                        <small>
                                                            <a class="btn btn-light btn-xs" id="tef_siswa" href="#" data-toggle="modal" data-target="#mef_siswa" 
                                                            data-id="<?php echo $data['id_siswa']; ?>"
                                                            data-ft="<?php echo $data['ft_siswa']; ?>">
                                                            <i class="icon-picture"></i> Edit Foto
                                                            </a>
                                                        </small>
                                                    </center>
                                                </td>
                                                <td>
                                                    <small>
                                                    <?php
                                                        $urut = $data['nu_siswa'];
                                                        $PilihFormat = mysqli_query($conn, "SELECT * FROM tb_formatskl");
                                                        $format=mysqli_fetch_array($PilihFormat);

                                                        echo 
                                                        $format['fr_formatskl'].'/'.
                                                        $urut.'/'.
                                                        $format['bl_formatskl'].'/'.
                                                        $format['th_formatskl'];
                                                    ?>
                                                    </small>
                                                 </td>
                                                <td>
                                                    <small>
                                                    NIS : <?php echo $data['ni_siswa']; ?><br>
                                                    NISN : <?php echo $data['ns_siswa']; ?>
                                                    </small>
                                                </td>
                                                <td>
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
                                                <td>
                                                    <div class="btn-group btn-sm">
                                                        <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Pilih</button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item btn-sm" id="td_siswa" href="#" data-toggle="modal" data-target="#md_siswa" 
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
                                                            >Detail</a>
                                                            <a class="dropdown-item btn-sm" id="te_siswa" href="#" data-toggle="modal" data-target="#me_siswa" 
                                                            data-id="<?php echo $data['id_siswa']; ?>"
                                                            data-kl="<?php echo $data['kl_siswa']; ?>"
                                                            data-nm="<?php echo $data['nm_siswa']; ?>"
                                                            data-jr="<?php echo $data['jr_siswa']; ?>"
                                                            data-tm="<?php echo $data['tm_siswa']; ?>"
                                                            data-tg="<?php echo $data['tg_siswa']; ?>"
                                                            data-ni="<?php echo $data['ni_siswa']; ?>"
                                                            data-ns="<?php echo $data['ns_siswa']; ?>"
                                                            data-np="<?php echo $data['np_siswa']; ?>"
                                                            data-nu="<?php echo $data['nu_siswa']; ?>"
                                                            data-st="<?php echo $data['st_siswa']; ?>"
                                                            >Edit</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </table>
                                </div>
                                <hr>
                                <label class="control-label ml-2"><b>PILIH STATUS</b></label>
                                <div class="form-group row ml-2">
                                    <select class="custom-control" name="update_type">
                                        <option value="">...</option>
                                        <option value="Lulus">Lulus</option>
                                        <option value="Tidak Lulus">Tidak Lulus</option>
                                    </select>
                                    <input type="submit" class="btn btn-dark ml-2 btn-sm" value="Ubah Status">
                                    <input type="submit" name="hapus" value="Hapus" class="btn btn-danger btn-sm ml-2 btn-sm" onclick="return confirm('Jika nama siswa telah digunakan di menu lain, maka tidak akan bisa dihapus. Hapus terlebih dahulu data siswa di menu lain..')">
                                </div>
                                <h5>
                                    <span class="text-danger ml-2"><?php echo $nip_err; ?></span><br>
                                    <span class="text-danger ml-2"><?php echo $up_type_err; ?></span>
                                </h5>
                                </form>
                                <?php
                                if (isset($_POST['hapus'])) {
                                $jml = count($_POST['id_siswa']);

                                for ($i=0; $i<$jml; $i++) { 
                                $id = $_POST['id_siswa'][$i];
                                $sql = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE id_siswa = '".$id."'");
                                $data = mysqli_fetch_array($sql);

                                if(is_file("../assets/file/foto/".$data['ft_siswa']))
                                    unlink("../assets/file/foto/".$data['ft_siswa']);

                                $hapus = mysqli_query($conn, "DELETE FROM tb_siswa WHERE id_siswa = '".$id."' ");
                                    }
                                    if ($hapus) {
                                    echo '<script>window.location="pg_siswa.php?toastr=warning_toast"</script>';
                                    }else{
                                    echo '<script>window.location="pg_siswa.php?toastr=gagal_toast"</script>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
            <section>
                <?php include 'modals/mt_siswa.php'; ?>
                <?php include 'modals/mef_siswa.php'; ?>
                <?php include 'modals/me_siswa.php'; ?>
                <?php include 'modals/md_siswa.php'; ?>
                <?php include 'modals/mi_siswa.php'; ?>
            </section>
        </div>

<?php include 'pages/foot.php'; ?>
<script>
      $(document).on("click", "#tef_siswa", function(){
          var id = $(this).data('id');
          var ft = $(this).data('ft');

          $("#mef_siswa #id_siswa").val(id);
          $("#mef_siswa #ft_siswa").attr("src", "../assets/file/foto/"+ft);
        })

      $(document).ready(function(e){
        $('#form').on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url : 'aef_siswa.php',
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

      $(document).on("click", "#te_siswa", function(){
          var id = $(this).data('id');
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

          $("#me_siswa #id_siswa").val(id);
          $("#me_siswa #kl_siswa").val(kl);
          $("#me_siswa #nm_siswa").val(nm);
          $("#me_siswa #jr_siswa").val(jr);
          $("#me_siswa #tm_siswa").val(tm);
          $("#me_siswa #tg_siswa").val(tg);
          $("#me_siswa #ni_siswa").val(ni);
          $("#me_siswa #ns_siswa").val(ns);
          $("#me_siswa #np_siswa").val(np);
          $("#me_siswa #nu_siswa").val(nu);
          $("#me_siswa #st_siswa").val(st);
        })

      $(document).ready(function(e){
        $('#form').on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url : 'ae_siswa.php',
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