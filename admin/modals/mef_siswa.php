<div class="modal fade" id="mef_siswa">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="mef_siswa">
            <div class="modal-header">
                <h5 class="modal-title">Edit Foto</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="aef_siswa.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_siswa" id="id_siswa"><br>
                        <center><img class="img-thumbnail" src="" id="ft_siswa" width="200px"><hr></center>
                        <small>
                            <i class="text-danger">Ceklis untuk ubah Foto</i>
                        </small>
                        &nbsp;-->>&nbsp;
                        <input type="checkbox" class="input-control" name="ubah_foto" value="true"><br><br>
                        <input type="file" class="form-control-file" placeholder="..." name="ft_siswa" id="ft_siswa">
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