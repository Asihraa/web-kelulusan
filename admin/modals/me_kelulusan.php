<div class="modal fade" id="me_kelulusan">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="me_kelulusan">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kelulusan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="ae_kelulusan.php" method="post">
                <div class="modal-body">
                    <hr><h5><b><p>Rapat Kelulusan</p></b></h5><hr>
                    <div class="form-group">
                        <label class="control-label" for="tg_kelulusan">Tanggal Rapat</label>
                        <input type="hidden" name="id_kelulusan" id="id_kelulusan">
                        <input type="text" class="form-control datepicker" placeholder="..." name="tg_kelulusan" id="tg_kelulusan">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tp_kelulusan">Tempat Rapat</label>
                        <input type="text" class="form-control" placeholder="..." name="tp_kelulusan" id="tp_kelulusan">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="wm_kelulusan">Waktu Mulai Rapat</label>
                        <input type="time" class="form-control" placeholder="..." name="wm_kelulusan" id="wm_kelulusan">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="ws_kelulusan">Waktu Selesai Rapat</label>
                        <input type="time" class="form-control" name="ws_kelulusan" id="ws_kelulusan">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="zw_kelulusan">Zona Waktu</label>
                        <select name="zw_kelulusan" class="form-control" id="zw_kelulusan">
                            <option value="">...</option>
                            <option value="WIB">WIB</option>
                            <option value="WITA">WITA</option>
                            <option value="WIT">WIT</option>
                        </select>
                    </div>
                    <hr><h5><b><p>Pengumuman Kelulusan</p></b></h5><hr>
                    <div class="form-group">
                        <label class="control-label" for="ns_kelulusan">No. SK Kelulusan</label>
                        <input type="text" class="form-control" placeholder="..." name="ns_kelulusan" id="ns_kelulusan">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tb_kelulusan">Tanggal Pengumuman</label>
                        <input type="text" class="form-control" name="tb_kelulusan" id="tb_kelulusan">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="st_kelulusan">Status Pengumuman</label>
                        <select name="st_kelulusan" class="form-control" id="st_kelulusan">
                            <option value="">...</option>
                            <option value="Dibuka">Dibuka</option>
                            <option value="Belum Dibuka">Belum Dibuka</option>
                        </select>
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