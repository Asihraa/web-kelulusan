<div class="modal fade" id="me_tahun">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="me_tahun">
            <div class="modal-header">
                <h5 class="modal-title">Edit Tahun Ajaran</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="ae_tahun.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="nm_tahun">Nama Tahun</label>
                        <input type="hidden" name="id_tahun" id="id_tahun">
                        <input type="text" class="form-control" name="nm_tahun" id="nm_tahun">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="sm_tahun">Semester</label>
                        <select name="sm_tahun" class="form-control" id="sm_tahun">
                            <option value="">...</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                        <input type="hidden" name="st_tahun" id="st_tahun">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="edit" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>