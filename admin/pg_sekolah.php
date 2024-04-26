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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Sekolah</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Sekolah</h4>
                            <hr>
                            <ul class="nav nav-pills mb-3">
                                <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Nama Sekolah</a>
                                </li>
                                <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Tahun Ajaran</a>
                                </li>
                                <li class="nav-item"><a href="#navpills-30" class="nav-link" data-toggle="tab" aria-expanded="true">Data Jurusan</a>
                                </li>
                                <li class="nav-item"><a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">Data Rombel</a>
                                </li>
                                <li class="nav-item"><a href="#navpills-40" class="nav-link" data-toggle="tab" aria-expanded="true">Kel. Mapel</a>
                                </li>
                                <li class="nav-item"><a href="#navpills-4" class="nav-link" data-toggle="tab" aria-expanded="true">Data Mapel</a>
                                </li>
                                <li class="nav-item"><a href="#navpills-50" class="nav-link" data-toggle="tab" aria-expanded="true">Map. Mapel</a>
                                </li>
                            </ul>
                            <hr>
                            <div class="tab-content br-n pn">
                                <div id="navpills-1" class="tab-pane active">
                                    <div class="row align-items-center">
                                        <div class="container">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="bg bg-warning text-white text-center">Nama Sekolah</th>
                                                            <th class="bg bg-warning text-white text-center">Nama Kepala</th>
                                                            <th class="bg bg-warning text-white text-center">NIP Kepala</th>
                                                            <th class="bg bg-warning text-white text-center">Logo Sekolah</th>
                                                            <th class="bg bg-warning text-white text-center">Kop Sekolah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sekolah = mysqli_query($conn, "SELECT * FROM tb_sekolah");
                                                        $data = mysqli_fetch_array($sekolah);
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $data['nm_sekolah']; ?></td>
                                                            <td><?php echo $data['kp_sekolah']; ?></td>
                                                            <td><?php echo $data['nk_sekolah']; ?></td>
                                                            <td align="center">
                                                                <img src="../assets/file/profile/<?php echo $data['lg_sekolah']; ?>" width="50px">
                                                            </td>
                                                            <td align="center">
                                                                <img src="../assets/file/profile/<?php echo $data['ks_sekolah']; ?>" width="50px">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr>
                                                <a class="btn btn-success text-white" id="te_sekolah" href="#" data-toggle="modal" data-target="#me_sekolah" 
                                                data-id="<?php echo $data['id_sekolah']; ?>" 
                                                data-nm="<?php echo $data['nm_sekolah']; ?>" 
                                                data-kp="<?php echo $data['kp_sekolah']; ?>" 
                                                data-nk="<?php echo $data['nk_sekolah']; ?>" 
                                                data-lg="<?php echo $data['lg_sekolah']; ?>" 
                                                data-ks="<?php echo $data['ks_sekolah']; ?>">
                                                Ubah
                                                </a>
                                        </div>
                                    </div>
                                </div>
                                <div id="navpills-2" class="tab-pane">
                                    <div class="row align-items-center">
                                        <div class="container">
                                            <table class="table table-stripped table-borderless">
                                                <?php
                                                $tahunajaran = mysqli_query($conn, "SELECT * FROM tb_tahun");
                                                $data = mysqli_fetch_array($tahunajaran);
                                                ?>
                                                <tr>
                                                    <td width="20%">Tahun Ajaran</td>
                                                    <td>: <?php echo $data['nm_tahun'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Semester</td>
                                                    <td>: <?php echo $data['sm_tahun'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a class="btn btn-success text-white" id="te_tahun" href="#" data-toggle="modal" data-target="#me_tahun" 
                                                        data-id="<?php echo $data['id_tahun']; ?>" 
                                                        data-nm="<?php echo $data['nm_tahun']; ?>" 
                                                        data-sm="<?php echo $data['sm_tahun']; ?>" 
                                                        data-st="<?php echo $data['st_tahun']; ?>">
                                                        Ubah
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="navpills-30" class="tab-pane">
                                    <div class="row align-items-center">
                                        <div class="container">
                                            <button type="button" class="btn btn-primary btn-sm mt-1" data-toggle="modal" data-target="#mt_jurusan">Tambah</button>
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th class="bg bg-success text-white text-center">No.</th>
                                                            <th class="bg bg-success text-white text-center">Nama Jurusan</th>
                                                            <th class="bg bg-success text-white text-center">Singkatan</th>
                                                            <th class="bg bg-success text-white text-center">Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no=1;
                                                        $jurusan = mysqli_query($conn, "SELECT * FROM tb_jurusan");
                                                        while ($data = mysqli_fetch_array($jurusan)) {
                                                        ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $no++; ?>.</td>
                                                            <td><?php echo $data['nm_jurusan'] ?></td>
                                                            <td><?php echo $data['si_jurusan'] ?></td>
                                                            <td width="12%" align="center">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary btn-sm">Pilih</button>
                                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="sr-only">Pilih</span>
                                                                </button>
                                                                <div class="dropdown-menu btn-sm">
                                                                    <a class="dropdown-item btn-sm" id="te_jurusan" href="#" data-toggle="modal" data-target="#me_jurusan" 
                                                                    data-id="<?php echo $data['id_jurusan']; ?>"
                                                                    data-nm="<?php echo $data['nm_jurusan']; ?>"
                                                                    data-si="<?php echo $data['si_jurusan']; ?>"
                                                                    >Edit</a>
                                                                    <a href="#" class="dropdown-item btn-sm"  onClick="confirm_modal('del_data.php?idj=<?php echo $data['id_jurusan'] ?>');">Hapus
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="navpills-3" class="tab-pane">
                                    <div class="row align-items-center">
                                        <div class="container">
                                            <button type="button" class="btn btn-primary btn-sm mt-1" data-toggle="modal" data-target="#mt_kelas">Tambah</button>
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th width="6px" class="bg bg-dark text-white text-center">No.</th>
                                                            <th class="bg bg-dark text-white text-center">Nama Rombel</th>
                                                            <th class="bg bg-dark text-white text-center">Jurusan</th>
                                                            <th class="bg bg-dark text-white text-center">Status</th>
                                                            <th class="bg bg-dark text-white text-center">Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no=1;
                                                        $kelas = mysqli_query($conn, "SELECT * FROM tb_kelas");
                                                        while ($data = mysqli_fetch_array($kelas)) {
                                                        ?>
                                                        <tr>
                                                            <td width="6px" class="text-center"><?php echo $no++; ?>.</td>
                                                            <td><?php echo $data['nm_kelas'] ?></td>
                                                            <td><?php echo $data['jr_kelas'] ?></td>
                                                            <td>
                                                            <?php
                                                            $status = $data['st_kelas'];
                                                            if ($status=='Aktif') {
                                                               ?>
                                                                <span class="badge badge-success text-white">
                                                                    <?php echo $data['st_kelas']; ?>
                                                                </span>
                                                               <?php
                                                            }else{
                                                                ?>
                                                                <span class="badge badge-danger text-white">
                                                                    <?php echo $data['st_kelas']; ?>
                                                                </span>
                                                                <?php
                                                            }
                                                            ?>
                                                            </td>
                                                            <td width="12%" align="center">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary btn-sm">Pilih</button>
                                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="sr-only">Pilih</span>
                                                                </button>
                                                                <div class="dropdown-menu btn-sm">
                                                                    <a class="dropdown-item btn-sm" id="te_kelas" href="#" data-toggle="modal" data-target="#me_kelas" 
                                                                    data-id="<?php echo $data['id_kelas']; ?>"
                                                                    data-nm="<?php echo $data['nm_kelas']; ?>"
                                                                    data-jr="<?php echo $data['jr_kelas']; ?>"
                                                                    data-st="<?php echo $data['st_kelas']; ?>"
                                                                    >Edit</a>
                                                                    <a href="#" class="dropdown-item btn-sm"  onClick="confirm_modal('del_data.php?idk=<?php echo $data['id_kelas'] ?>');">Hapus
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="navpills-40" class="tab-pane">
                                    <div class="row align-items-center">
                                        <div class="container">
                                            <button type="button" class="btn btn-primary btn-sm mt-1" data-toggle="modal" data-target="#mt_kelmapel">Tambah</button>
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th class="bg bg-info text-white text-center">No.</th>
                                                            <th class="bg bg-info text-white text-center">Nama Kelompok</th>
                                                            <th class="bg bg-info text-white text-center">Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no=1;
                                                        $kelmapel = mysqli_query($conn, "SELECT * FROM tb_kelmapel");
                                                        while ($data = mysqli_fetch_array($kelmapel)) {
                                                        ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $no++; ?>.</td>
                                                            <td><?php echo $data['nm_kelmapel'] ?></td>
                                                            <td width="12%" align="center">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary btn-sm">Pilih</button>
                                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="sr-only">Pilih</span>
                                                                </button>
                                                                <div class="dropdown-menu btn-sm">
                                                                    <a class="dropdown-item btn-sm" id="te_kelmapel" href="#" data-toggle="modal" data-target="#me_kelmapel" 
                                                                    data-id="<?php echo $data['id_kelmapel']; ?>"
                                                                    data-nm="<?php echo $data['nm_kelmapel']; ?>"
                                                                    >Edit</a>
                                                                    <a href="#" class="dropdown-item btn-sm"  onClick="confirm_modal('del_data.php?idklm=<?php echo $data['id_kelmapel'] ?>');">Hapus
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="navpills-4" class="tab-pane">
                                    <div class="row align-items-center">
                                        <div class="container">
                                            <form action="" method="post">
                                            <button type="button" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#mt_mapel">Tambah</button>
                                            <input type="submit" name="hapus" value="Hapus" class="btn btn-danger btn-sm btn-sm mb-1" onclick="return confirm('Data akan dihapus..')">
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered zero-configuration table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th width="6px" class="bg bg-dark text-white text-center">No.</th>
                                                            <th class="bg bg-dark text-white text-center">Cek</th>
                                                            <th class="bg bg-dark text-white text-center">Kode Mapel</th>
                                                            <th class="bg bg-dark text-white text-center">Nama Mapel</th>
                                                            <th class="bg bg-dark text-white text-center">Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no=1;
                                                        $mapel = mysqli_query($conn, "SELECT * FROM tb_mapel");
                                                        while ($data = mysqli_fetch_array($mapel)) {
                                                        ?>
                                                        <tr>
                                                            <td width="6px" class="text-center"><?php echo $no++; ?>.</td>
                                                            <td width="3px" align="center">
                                                                <input type="checkbox" name="id_mapel[]" value="<?php echo $data['id_mapel']; ?>">
                                                            </td>
                                                            <td><?php echo $data['id_mapel'] ?></td>
                                                            <td><?php echo $data['nm_mapel'] ?></td>
                                                            <td width="12%" align="center">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary btn-sm">Pilih</button>
                                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="sr-only">Pilih</span>
                                                                </button>
                                                                <div class="dropdown-menu btn-sm">
                                                                    <a class="dropdown-item btn-sm" id="te_mapel" href="#" data-toggle="modal" data-target="#me_mapel" 
                                                                    data-id="<?php echo $data['id_mapel']; ?>"
                                                                    data-nm="<?php echo $data['nm_mapel']; ?>"
                                                                    >Edit</a>
                                                                    <a href="#" class="dropdown-item btn-sm"  onClick="confirm_modal('del_data.php?idm=<?php echo $data['id_mapel'] ?>');">Hapus
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            </form>
                                            <?php
                                            if (isset($_POST['hapus'])) {
                                            $jml = count($_POST['id_mapel']);

                                            for ($i=0; $i<$jml; $i++) { 
                                            $id = $_POST['id_mapel'][$i];
                                            $sql = mysqli_query($conn, "SELECT * FROM tb_mapel WHERE id_mapel = '".$id."'");
                                            $data = mysqli_fetch_array($sql);

                                            $hapus = mysqli_query($conn, "DELETE FROM tb_mapel WHERE id_mapel = '".$id."' ");
                                                }
                                                if ($hapus) {
                                                echo '<script>window.location="pg_sekolah.php?toastr=warning_toast"</script>';
                                                }else{
                                                echo '<script>window.location="pg_sekolah.php?toastr=gagal_toast"</script>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div id="navpills-50" class="tab-pane">
                                    <div class="row align-items-center">
                                        <div class="container">
                                            <form action="" method="post">
                                            <button type="button" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#mt_mmapel">Tambah</button>
                                            <input type="submit" name="delet" value="Hapus" class="btn btn-danger btn-sm btn-sm mb-1" onclick="return confirm('Data akan dihapus..')">
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th width="8px" class="bg bg-dark text-white text-center">No.</th>
                                                            <th width="8px" class="bg bg-dark text-white text-center">Cek</th>
                                                            <th class="bg bg-dark text-white text-center">Jurusan</th>
                                                            <th class="bg bg-dark text-white text-center">Nama Mapel</th>
                                                            <th class="bg bg-dark text-white text-center">Kelompok</th>
                                                            <th class="bg bg-dark text-white text-center">Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no=1;
                                                        $kelas = mysqli_query($conn, "SELECT * FROM tb_mmapel");
                                                        while ($data = mysqli_fetch_array($kelas)) {
                                                        ?>
                                                        <tr>
                                                            <td width="8px" class="text-center"><?php echo $no++; ?>.</td>
                                                            <td width="3px" align="center">
                                                                <input type="checkbox" name="id_mmapel[]" value="<?php echo $data['id_mmapel']; ?>">
                                                            </td>
                                                            <td><?php echo $data['jr_mmapel'] ?></td>
                                                            <td><?php echo $data['mp_mmapel'] ?></td>
                                                            <td><?php echo $data['kl_mmapel'] ?></td>
                                                            <td width="12%" align="center">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary btn-sm">Pilih</button>
                                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="sr-only">Pilih</span>
                                                                </button>
                                                                <div class="dropdown-menu btn-sm">
                                                                    <a class="dropdown-item btn-sm" id="te_mmapel" href="#" data-toggle="modal" data-target="#me_mmapel" 
                                                                    data-id="<?php echo $data['id_mmapel']; ?>"
                                                                    data-jr="<?php echo $data['jr_mmapel']; ?>"
                                                                    data-mp="<?php echo $data['mp_mmapel']; ?>"
                                                                    data-kl="<?php echo $data['kl_mmapel']; ?>"
                                                                    >Edit</a>
                                                                    <a href="#" class="dropdown-item btn-sm"  onClick="confirm_modal('del_data.php?idmp=<?php echo $data['id_mmapel'] ?>');">Hapus
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            </form>
                                            <?php
                                            if (isset($_POST['delet'])) {
                                            $jml = count($_POST['id_mmapel']);

                                            for ($i=0; $i<$jml; $i++) { 
                                            $id = $_POST['id_mmapel'][$i];
                                            $sql = mysqli_query($conn, "SELECT * FROM tb_mmapel WHERE id_mmapel = '".$id."'");
                                            $data = mysqli_fetch_array($sql);

                                            $hapus = mysqli_query($conn, "DELETE FROM tb_mmapel WHERE id_mmapel = '".$id."' ");
                                                }
                                                if ($hapus) {
                                                echo '<script>window.location="pg_sekolah.php?toastr=warning_toast"</script>';
                                                }else{
                                                echo '<script>window.location="pg_sekolah.php?toastr=gagal_toast"</script>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!-- Modal Popup untuk delete -->
        <div class="modal fade" id="modal_delete">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
              <div class="modal-header">
                <h4 class="modal-title" style="text-align:center;">Anda yakin akan menghapus data ini.. ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
                        
              <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <a href="#" class="btn btn-danger btn-sm" id="delete_link">Siap, Hapus saja</a>
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        <section>
            <?php include 'modals/me_sekolah.php'; ?>
            <?php include 'modals/mt_kelas.php'; ?>
            <?php include 'modals/me_kelas.php'; ?>
            <?php include 'modals/mt_jurusan.php'; ?>
            <?php include 'modals/me_jurusan.php'; ?>
            <?php include 'modals/me_tahun.php'; ?>
            <?php include 'modals/mt_kelmapel.php'; ?>
            <?php include 'modals/me_kelmapel.php'; ?>
            <?php include 'modals/mt_mapel.php'; ?>
            <?php include 'modals/me_mapel.php'; ?>
            <?php include 'modals/mt_mmapel.php'; ?>
            <?php include 'modals/me_mmapel.php'; ?>
        </section>

<?php include 'pages/foot.php'; ?>
<script>
      $(document).on("click", "#te_sekolah", function(){
          var id = $(this).data('id');
          var nm = $(this).data('nm');
          var kp = $(this).data('kp');
          var nk = $(this).data('nk');
          var lg = $(this).data('lg');
          var ks = $(this).data('ks');

          $("#me_sekolah #id_sekolah").val(id);
          $("#me_sekolah #nm_sekolah").val(nm);
          $("#me_sekolah #kp_sekolah").val(kp);
          $("#me_sekolah #nk_sekolah").val(nk);
          $("#me_sekolah #lg_sekolah").attr("src", "../assets/file/profile/"+lg);
          $("#me_sekolah #ks_sekolah").attr("src", "../assets/file/profile/"+ks);
        })

     $(document).ready(function(e){
        $('#form').on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url : 'ae_sekolah.php',
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
      
      $(document).on("click", "#te_jurusan", function(){
          var id = $(this).data('id');
          var nm = $(this).data('nm');
          var si = $(this).data('si');

          $("#me_jurusan #id_jurusan").val(id);
          $("#me_jurusan #nm_jurusan").val(nm);
          $("#me_jurusan #si_jurusan").val(si);
        })

      $(document).ready(function(e){
        $('#form').on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url : 'ae_jurusan.php',
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

      $(document).on("click", "#te_tahun", function(){
          var id = $(this).data('id');
          var nm = $(this).data('nm');
          var sm = $(this).data('sm');
          var st = $(this).data('st');

          $("#me_tahun #id_tahun").val(id);
          $("#me_tahun #nm_tahun").val(nm);
          $("#me_tahun #sm_tahun").val(sm);
          $("#me_tahun #st_tahun").val(st);
        })

      $(document).ready(function(e){
        $('#form').on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url : 'ae_tahun.php',
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

      $(document).on("click", "#te_kelas", function(){
          var id = $(this).data('id');
          var nm = $(this).data('nm');
          var jr = $(this).data('jr');
          var st = $(this).data('st');

          $("#me_kelas #id_kelas").val(id);
          $("#me_kelas #nm_kelas").val(nm);
          $("#me_kelas #jr_kelas").val(jr);
          $("#me_kelas #st_kelas").val(st);
        })

      $(document).ready(function(e){
        $('#form').on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url : 'ae_kelas.php',
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
      
      $(document).on("click", "#te_kelmapel", function(){
          var id = $(this).data('id');
          var nm = $(this).data('nm');

          $("#me_kelmapel #id_kelmapel").val(id);
          $("#me_kelmapel #nm_kelmapel").val(nm);
        })

      $(document).ready(function(e){
        $('#form').on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url : 'ae_kelmapel.php',
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

      $(document).on("click", "#te_mapel", function(){
          var id = $(this).data('id');
          var nm = $(this).data('nm');

          $("#me_mapel #id_mapel").val(id);
          $("#me_mapel #nm_mapel").val(nm);
        })

      $(document).ready(function(e){
        $('#form').on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url : 'ae_mapel.php',
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

      $(document).on("click", "#te_mmapel", function(){
          var id = $(this).data('id');
          var jr = $(this).data('jr');
          var mp = $(this).data('mp');
          var kl = $(this).data('kl');

          $("#me_mmapel #id_mmapel").val(id);
          $("#me_mmapel #jr_mmapel").val(jr);
          $("#me_mmapel #mp_mmapel").val(mp);
          $("#me_mmapel #kl_mmapel").val(kl);
        })

      $(document).ready(function(e){
        $('#form').on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url : 'ae_mmapel.php',
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

      function confirm_modal(delete_url)
      {
        $('#modal_delete').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
      }
</script>