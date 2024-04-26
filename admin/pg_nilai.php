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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Input Nilai</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Import Nilai Excel</h6>
                                <button type="button" class="btn btn-xs btn-primary text-white" data-toggle="modal" data-target="#mi_nilai">Download Template</button>
                                <button type="button" class="btn btn-xs btn-warning text-white" onclick="window.location='pg_nilai.php'">Refresh</button><br><br>
                                <form action="ak_imnilai.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="file" class="form-control-input" name="doc"/>
                                        <input type="submit" name="import" value="Import" class="btn btn-success btn-sm text-white" />
                                    </div>
                                </form>
                                <hr>
                                <h6 class="card-title">Input Nilai Manual</h6>
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
                                </div>
                            </div>
                            <div class="card-footer">
                                <?php
                                if (@$_POST['pilihdatas']) {
                                $mmapel = mysqli_query($conn, "SELECT * FROM tb_mmapel WHERE mp_mmapel='".$_POST['mp_mmapel']."'&&kl_mmapel='".$_POST['kl_mmapel']."'");
                                $mp = mysqli_fetch_array($mmapel);
                                ?>
                                <div class="container">
                                    <h6>
                                        <table>
                                            <tr>
                                                <td>Mapel &nbsp;</td>
                                                <td>: <?php echo $mp['mp_mmapel']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kelompok &nbsp;</td>
                                                <td>: <?php echo $mp['kl_mmapel']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jurusan &nbsp;</td>
                                                <td>: <?php echo $_POST['pl_jurusan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kelas &nbsp;</td>
                                                <td>: <?php echo $_POST['pl_kelas']; ?></td>
                                            </tr>
                                        </table>
                                    </h6>
                                </div>
                                <hr>
                                <form action="at_nilai.php" method="post">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th width="15px" class="bg bg-dark text-center"><center>No.</center></th>
                                                <th class="bg bg-dark text-center">Nama Siswa</th>
                                                <th class="bg bg-dark text-center">Nilai Raport</th>
                                                <th class="bg bg-dark text-center">Nilai Ujian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $mapel = $mp['mp_mmapel'];
                                            $kel = $mp['kl_mmapel'];
                                            $no=1;
                                            $pilihdata = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE jr_siswa='".$_POST['pl_jurusan']."'&&kl_siswa='".$_POST['pl_kelas']."' ORDER BY nm_siswa ASC");
                                            while ($data = mysqli_fetch_array($pilihdata)) {
                                            ?>
                                            <tr>
                                                <td align="center" width="15px"><?php echo $no++; ?></td>
                                                <td>
                                                    <input type="hidden" name="id_nilai[]" readonly style="border: none;">
                                                    <input type="hidden" name="jr_nilai[]" value="<?php echo $data['jr_siswa']; ?>" readonly style="border: none;">
                                                    <input type="hidden" name="kl_nilai[]" value="<?php echo $data['kl_siswa']; ?>" readonly style="border: none;">
                                                    <input type="hidden" name="mp_nilai[]" value="<?php echo $mapel; ?>" readonly style="border: none;">
                                                    <input type="hidden" name="km_nilai[]" value="<?php echo $kel; ?>" readonly style="border: none;">
                                                    <input type="text" name="nm_nilai[]" value="<?php echo $data['nm_siswa']; ?>" readonly style="border: none; width: 550px;">
                                                </td>
                                                <td width="3px">
                                                    <input type="number" name="nr_nilai[]">
                                                </td>
                                                <td width="3px">
                                                    <input type="number" name="nu_nilai[]">
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <input type="submit" name="inputnilai" class="btn btn-sm btn-primary text-white float-right" value="Simpan">
                                <?php } ?>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
            <section>
                <?php include 'modals/mi_nilai.php'; ?>

            </section>
        </div>

<?php include 'pages/foot.php'; ?>
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