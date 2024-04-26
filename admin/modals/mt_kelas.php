<div class="modal fade" id="mt_kelas">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kelas</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="at_kelas.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <center>
                        <i class="text-danger">
                            <b>PERHATIAN..!!</b><br>
                            Jangan menggunakan karakter <b>@#$%^&*';"</b> untuk menghindari error <br> pada aplikasi
                        </i>
                    </center>
                    <hr>
                    <div class="form-group">
                        <label class="control-label" for="nm_kelas">Nama Kelas</label>
                        <input type="text" class="form-control" placeholder="..." name="nm_kelas" id="nm_kelas">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="jr_kelas">Jurusan</label>
                        <select name="jr_kelas" class="form-control" id="jr_kelas">
                            <option value="">...</option>
                            <?php
                            $jurusan = mysqli_query($conn, "SELECT * FROM tb_jurusan");
                            while ($data = mysqli_fetch_array($jurusan)) {
                                
                            ?>
                            <option value="<?php echo $data['si_jurusan']; ?>"><?php echo $data['si_jurusan']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="st_kelas">Status</label>
                        <select name="st_kelas" class="form-control" id="st_kelas">
                            <option value="">...</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
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