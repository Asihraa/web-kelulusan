<div class="modal fade" id="mt_siswa">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="at_siswa.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <center>
                        <i class="text-danger">
                            <b>PERHATIAN..!!</b><br>
                            Jangan menggunakan karakter <b>@#$%^&*';"</b> untuk menghindari error <br> pada aplikasi
                        </i>
                    </center>
                    <hr>
                    <div class="form-group">
                        <label class="control-label" for="kl_siswa">Pilih Kelas</label>
                        <select name="kl_siswa" class="form-control" id="kl_siswa">
                            <option value="">...</option>
                            <?php
                            $kelas = mysqli_query($conn, "SELECT * FROM tb_kelas WHERE st_kelas='Aktif'");
                            while ($data = mysqli_fetch_array($kelas)) {
                                
                            ?>
                            <option value="<?php echo $data['nm_kelas']; ?>"><?php echo $data['nm_kelas']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="nm_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" placeholder="..." name="nm_siswa" id="nm_siswa">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="jr_siswa">Jurusan</label>
                        <select name="jr_siswa" class="form-control" id="jr_siswa">
                            <option value="">...</option>
                            <?php
                            $jurusan = mysqli_query($conn, "SELECT * FROM tb_jurusan");
                            while ($data = mysqli_fetch_array($jurusan)) {
                                
                            ?>
                            <option value="<?php echo $data['nm_jurusan']; ?>"><?php echo $data['nm_jurusan']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tm_siswa">Tempat Lahir</label>
                        <input type="text" class="form-control" placeholder="..." name="tm_siswa" id="tm_siswa">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tg_siswa">Tanggal Lahir</label>
                        <input type="text" class="form-control datepicker" placeholder="..." name="tg_siswa" id="tg_siswa">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="ni_siswa">NIS</label>
                        <input type="text" class="form-control" placeholder="..." name="ni_siswa" id="ni_siswa">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="ns_siswa">NISN</label>
                        <input type="text" class="form-control" placeholder="..." name="ns_siswa" id="ns_siswa">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="np_siswa">No. Peserta Ujian</label>
                        <input type="text" class="form-control" placeholder="..." name="np_siswa" id="np_siswa">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="ft_siswa">Foto</label>
                        <input type="file" class="form-control-file" name="ft_siswa" id="ft_siswa">
                    </div>
                    <?php
                        $ambil = mysqli_query($conn, "SELECT MAX(nu_siswa) AS maxKode FROM tb_siswa");
                        $hasil  = mysqli_fetch_array($ambil);
                        $kodeSKL = $hasil['maxKode'];
                        $newID = sprintf("%03s", $kodeSKL+1);
                    ?>
                    <div class="form-group">
                        <label class="control-label" for="np_siswa">No. SKL</label>
                        <input type="text" class="form-control" name="nu_siswa" value="<?php echo $newID; ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="st_siswa">Status</label>
                        <select name="st_siswa" class="form-control" id="st_siswa">
                            <option value="">...</option>
                            <option value="Lulus">Lulus</option>
                            <option value="Tidak Lulus">Tidak Lulus</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>