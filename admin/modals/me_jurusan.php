<div class="modal fade" id="me_jurusan">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="me_jurusan">
            <div class="modal-header">
                <h5 class="modal-title">Edit Jurusan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="ae_jurusan.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="nm_jurusan">Nama jurusan</label>
                        <input type="hidden" name="id_jurusan" id="id_jurusan">
                        <input type="text" class="form-control" placeholder="..." name="nm_jurusan" id="nm_jurusan">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="si_jurusan">Singkatan</label>
                        <input type="text" class="form-control" placeholder="..." name="si_jurusan" id="si_jurusan">
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