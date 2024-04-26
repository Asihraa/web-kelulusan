<div class="modal fade" id="me_kelmapel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="me_kelmapel">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kelompok Mapel</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="ae_kelmapel.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="nm_kelmapel">Nama Kelompok</label>
                        <input type="hidden" name="id_kelmapel" id="id_kelmapel">
                        <input type="text" class="form-control" placeholder="..." name="nm_kelmapel" id="nm_kelmapel">
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