<div class="modal fade" id="me_sekolah">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="me_sekolah">
            <div class="modal-header">
                <h5 class="modal-title">Edit Sekolah</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="ae_sekolah.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="nm_sekolah">Nama Sekolah</label>
                        <input type="hidden" name="id_sekolah" id="id_sekolah">
                        <input type="text" class="form-control" placeholder="..." name="nm_sekolah" id="nm_sekolah">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="kp_sekolah">Kepala Sekolah</label>
                        <input type="text" class="form-control" placeholder="..." name="kp_sekolah" id="kp_sekolah">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="nk_sekolah">NIP Kepala</label>
                        <input type="text" class="form-control" placeholder="..." name="nk_sekolah" id="nk_sekolah">
                    </div>
                    <hr>
                    <p class="text-primary">
                        Format Logo Disarankan : PNG . Dimensi : 504 X 515 pixel <br>
                        Format Kop Disarankan : PNG . Dimensi : 665 X 109 pixel
                    </p>
                    <hr>
                    <div class="form-group">
                        <label class="control-label" for="lg_sekolah">Logo Sekolah</label>&nbsp;
                        <small>
                            <i class="text-info">Ceklis untuk ubah Logo</i>
                        </small>
                        &nbsp;-->>&nbsp;
                        <input type="checkbox" class="input-control" name="ubah_logo" value="true"><br>
                        <img class="img-thumbnail" src="" id="lg_sekolah" width="10%"><br><br>
                        <input type="file" style="border: none;" class="form-control-file" placeholder="..." name="lg_sekolah" id="lg_sekolah">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="ks_sekolah">Kop Sekolah</label>&nbsp;
                        <small>
                            <i class="text-danger">Ceklis untuk ubah Kop</i>
                        </small>
                        &nbsp;-->>&nbsp;
                        <input type="checkbox" class="input-control" name="ubah_kop" value="true"><br>
                        <img class="img-thumbnail" src="" id="ks_sekolah" width="50%"><br><br>
                        <input type="file" style="border: none;" class="form-control-file" placeholder="..." name="ks_sekolah" id="ks_sekolah">
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