<div class="modal fade" id="mt_mapel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Mapel</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="at_mapel.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <center class="text-danger">
                        <b>PERHATIAN..!!</b>
                        <p>
                            Kode Mapel Tidak Boleh Sama...<br>
                            <i>Jangan menggunakan karakter <b>@#$%^&*';"</b> untuk menghindari error <br> pada aplikasi</i>
                        </p>
                    </center>
                    <hr>
                    <div class="form-group">
                        <label class="control-label" for="id_mapel">Kode Mapel</label>
                        <input type="text" class="form-control" placeholder="..." name="id_mapel" id="id_mapel">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="nm_mapel">Nama Mapel</label>
                        <input type="text" class="form-control" placeholder="..." name="nm_mapel" id="nm_mapel">
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