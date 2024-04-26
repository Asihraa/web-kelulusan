<div class="modal fade" id="me_umum">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="me_umum">
            <div class="modal-header">
                <h5 class="modal-title">Status Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="ae_umum.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_pengumuman" id="id_pengumuman">
                        <select type="text" name="st_pengumuman" id="st_pengumuman" class="form-control">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="ps_pengumuman" class="form-control" id="ps_pengumuman"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" name="edit" class="btn btn-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>