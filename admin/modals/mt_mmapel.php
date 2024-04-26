<div class="modal fade" id="mt_mmapel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kelompok Mapel</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="at_mmapel.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="jr_mmapel">Jurusan</label>
                        <select name="jr_mmapel" class="form-control" id="jr_mmapel">
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
                        <label class="control-label" for="mp_mmapel">Nama Mapel</label>
                        <select name="mp_mmapel" class="form-control" id="mp_mmapel">
                            <option value="">...</option>
                            <?php
                            $jurusan = mysqli_query($conn, "SELECT * FROM tb_mapel");
                            while ($data = mysqli_fetch_array($jurusan)) {
                                
                            ?>
                            <option value="<?php echo $data['nm_mapel']; ?>"><?php echo $data['nm_mapel']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="kl_mmapel">Kelompok</label>
                        <select name="kl_mmapel" class="form-control" id="kl_mmapel">
                            <option value="">...</option>
                            <?php
                            $jurusan = mysqli_query($conn, "SELECT * FROM tb_kelmapel");
                            while ($data = mysqli_fetch_array($jurusan)) {
                                
                            ?>
                            <option value="<?php echo $data['nm_kelmapel']; ?>"><?php echo $data['nm_kelmapel']; ?></option>
                            <?php } ?>
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