 <div class="modal fade modal-dismissible" id="mi_nilai" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title">Pilih Data</div>
          <div class="modal-tool">
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
        </div>
        <div class="modal-body">
            <form action="temp_nilai.php" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text">Pilih Jurusan</label>
                    </div>
                    <select class="custom-select" name="pl_jurusan" id="pl_jurusan" 
                    onchange=" if (this.selectedIndex!=0){ document.getElementById('tampilkan').style.display = 'inline' }else{ document.getElementById('tampilkan').style.display = 'none' };">
                        <option value="">...</option>
                        <?php
                        $jurusan = mysqli_query($conn, "SELECT * FROM tb_jurusan");
                        while ($data = mysqli_fetch_array($jurusan)) {
                            
                        ?>
                        <option value="<?php echo $data['si_jurusan']; ?>"><?php echo $data['si_jurusan']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <span id="tampilkan" style="display:none;">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">Pilih Kelas</label>
                        </div>
                        <select class="custom-select" name="pl_kelas" required="">
                            <option value="">...</option>
                            <?php
                            $kelas = mysqli_query($conn, "SELECT * FROM tb_kelas");
                            while ($data = mysqli_fetch_array($kelas)) {
                                
                            ?>
                            <option value="<?php echo $data['nm_kelas']; ?>"><?php echo $data['nm_kelas']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">Pilih Mapel</label>
                        </div>
                        <select class="custom-select" name="mp_mmapel" id="mp_mmapel" required="">
                            <option value="">...</option>
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
                        <select class="custom-select" name="kl_mmapel" id="kl_mmapel" required="">
                            <option selected="selected">...</option>
                            <?php
                            $mmapel = mysqli_query($conn, "SELECT DISTINCT kl_mmapel FROM tb_mmapel");
                            while ($data = mysqli_fetch_array($mmapel)) {
                                
                            ?>
                            <option value="<?php echo $data['kl_mmapel']; ?>"><?php echo $data['kl_mmapel']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </span>
        </div>
        <div class="modal-footer">
            <input type="submit" name="pilihdata" class="btn btn-sm btn-warning text-white mr-3" value="Pilih">
            <button class="btn btn-sm btn-danger text-white" data-dismiss="modal">Tutup</button>
            </form>
        </div>
      </div>
    </div>
</div>
