<div class="modal fade" id="me_mapel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="me_mapel">
            <div class="modal-header">
                <h5 class="modal-title">Edit Mapel</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="ae_mapel.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="id_mapel">Kode Mapel</label>
                        <input type="text" class="form-control" name="id_mapel" id="id_mapel" readonly="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="nm_mapel">Nama Mapel</label>
                        <input type="text" class="form-control" placeholder="..." name="nm_mapel" id="nm_mapel">
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