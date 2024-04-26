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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Nilai</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Data Nilai</h6>
                                <hr>
                                <form action="" method="post">
                                <div class="table-responsive">
                                    <form action="" method="post" id="form1">

                                        <!--Kelas-->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text">Pilih Jurusan</label>
                                            </div>
                                            <select class="custom-select" name="pl_jurusan" id="pl_jurusan" 
                                            onchange=" if (this.selectedIndex!=0){ document.getElementById('tampil_select').style.display = 'inline' }else{ document.getElementById('tampil_select').style.display = 'none' };">
                                                <option value="">...</option>
                                                <?php
                                                $jurusan = mysqli_query($conn, "SELECT * FROM tb_jurusan");
                                                while ($data = mysqli_fetch_array($jurusan)){
                                                ?>
                                                <option value="<?php echo $data['si_jurusan']; ?>">
                                                    <?php echo $data['si_jurusan']; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <span id="tampil_select" style="display:none;">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text">Pilih Kelas</label>
                                                </div>
                                                <select class="custom-select" name="pl_kelas" id="pl_kelas">
                                                    <option value="">...</option>
                                                </select>
                                            </div>
                                            <!--Kelas-->
                                            
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text">Pilih Mapel</label>
                                                </div>
                                                <select class="custom-select" onchange="cek_database()" name="mp_mmapel" id="mp_mmapel" required="">
                                                    <option selected="selected">...</option>
                                                    <?php
                                                    $mmapel = mysqli_query($conn, "SELECT * FROM tb_mmapel");
                                                    while ($data = mysqli_fetch_array($mmapel)) {
                                                        
                                                    ?>
                                                    <option value="<?php echo $data['mp_mmapel']; ?>"><?php echo $data['mp_mmapel']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text">Kelompok</label>
                                                </div>
                                                <input type="text" class="form-control bg-light" name="kl_mmapel" id="kl_mmapel" readonly="readonly">
                                            </div>
                                            <div class="float-right">
                                                <input type="submit" name="pilihdatas" class="btn btn-sm btn-warning text-white" value="Pilih">
                                            </div>
                                        </span>

                                    </form>
                                    <?php
                                    if (@$_POST['pilihdatas']) {
                                        $jurusan = $_POST['pl_jurusan'];
                                        $kelas = $_POST['pl_kelas'];
                                        $mapel = $_POST['mp_mmapel'];
                                        $kelompok = $_POST['kl_mmapel'];
                                    ?>
                                    <input type="submit" name="delet" value="Hapus" class="btn btn-danger btn-sm btn-sm" onclick="return confirm('Data akan dihapus..')">
                                    <hr>
                                    <table>
                                        <tr>
                                            <td>Mapel</td>
                                            <td>&nbsp;&nbsp; : <?php echo $mapel; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kelompok</td>
                                            <td>&nbsp;&nbsp; : <?php echo $kelompok; ?></td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <table class="table table-hover table-bordered zero-configuration table-sm">
                                        <thead>
                                            <tr>
                                                <th class="bg-dark" width="3px" align="center"><center>No.</center></th>
                                                <th class="bg-dark" width="3px" align="center"><center>Cek</center></th>
                                                <th class="bg-dark">Nama</th>
                                                <th class="bg-dark">N. Raport</th>
                                                <th class="bg-dark">N. Ujian</th>
                                                <th class="bg-dark">Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=1;
                                            $ambilnilai = mysqli_query($conn,"SELECT * FROM tb_nilai WHERE jr_nilai='$jurusan'&&kl_nilai='$kelas'&&mp_nilai='$mapel'&&km_nilai='$kelompok' ORDER BY nm_nilai ASC");
                                            while($data=mysqli_fetch_array($ambilnilai)){
                                            ?>
                                            <tr>
                                                <td align="center" width="3px"><?php echo $no++; ?>.</td>
                                                <td align="center"><input type="checkbox" name="id_nilai[]" value="<?php echo $data['id_nilai']; ?>"></td>
                                                <td><?php echo $data['nm_nilai']; ?></td>
                                                <td align="center">
                                                    <?php
                                                    if (!empty($data['nr_nilai'])) {
                                                        echo $data['nr_nilai'];
                                                    }else{
                                                        ?>
                                                        <span class="badge badge-danger">0</span>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center">
                                                    <?php
                                                    if (!empty($data['nu_nilai'])) {
                                                        echo $data['nu_nilai'];
                                                    }else{
                                                        ?>
                                                        <span class="badge badge-danger">0</span>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center">
                                                    <a class="btn btn-success btn-xs text-white" id="te_nilai" href="#" data-toggle="modal" data-target="#me_nilai" 
                                                    data-id="<?php echo $data['id_nilai']; ?>" 
                                                    data-nm="<?php echo $data['nm_nilai']; ?>" 
                                                    data-kl="<?php echo $data['kl_nilai']; ?>" 
                                                    data-mp="<?php echo $data['mp_nilai']; ?>" 
                                                    data-km="<?php echo $data['km_nilai']; ?>" 
                                                    data-nr="<?php echo $data['nr_nilai']; ?>" 
                                                    data-nu="<?php echo $data['nu_nilai']; ?>">
                                                    <span class="icon-pencil"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <?php } ?>
                                </div>
                                <hr>
                                </form>
                                <?php
                                if (isset($_POST['delet'])) {
                                $jml = count($_POST['id_nilai']);

                                for ($i=0; $i<$jml; $i++) { 
                                $id = $_POST['id_nilai'][$i];
                                $sql = mysqli_query($conn, "SELECT * FROM tb_nilai WHERE id_nilai = '".$id."'");
                                $data = mysqli_fetch_array($sql);

                                $hapus = mysqli_query($conn, "DELETE FROM tb_nilai WHERE id_nilai = '".$id."' ");
                                    }
                                    if ($hapus) {
                                    echo '<script>window.location="pg_datanilai.php?toastr=warning_toast"</script>';
                                    }else{
                                    echo '<script>window.location="pg_datanilai.php?toastr=gagal_toast"</script>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
            <section>
                <?php include 'modals/me_nilai.php'; ?>
            </section>
        </div>

<?php include 'pages/foot.php'; ?>
<script>
    $(document).on("click", "#te_nilai", function(){
        var id = $(this).data('id');
        var nm = $(this).data('nm');
        var kl = $(this).data('kl');
        var mp = $(this).data('mp');
        var km = $(this).data('km');
        var nr = $(this).data('nr');
        var nu = $(this).data('nu');

        $("#me_nilai #id_nilai").val(id);
        $("#me_nilai #nm_nilai").val(nm);
        $("#me_nilai #kl_nilai").val(kl);
        $("#me_nilai #mp_nilai").val(mp);
        $("#me_nilai #km_nilai").val(km);
        $("#me_nilai #nr_nilai").val(nr);
        $("#me_nilai #nu_nilai").val(nu);
    })

    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'ae_nilai.php',
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

<script src="../assets/ajax/jquery.min.js"></script>
<script type="text/javascript">
    function cek_database(){
        var mp_mmapel = $("#mp_mmapel").val();
        $.ajax({
            url: 'ak_cekdata.php',
            data:"mp_mmapel="+mp_mmapel ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#kl_mmapel').val(obj.kl_mmapel);
        });
    }

</script>
<script>
    $("#pl_jurusan").change(function() {
        var postForm = {
                'si_jurusan': document.getElementById("pl_jurusan").value,
                'opsi': 1
        };
        $.ajax({
            type: "post",
            url: "ak_ambilkelas.php",
            data: postForm,
            success: function(data) {
                $("#pl_kelas").html(data);
            }
        });
    });
</script>