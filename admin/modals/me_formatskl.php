<div class="modal fade" id="me_formatskl">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="me_formatskl">
            <div class="modal-header">
                <h5 class="modal-title">Edit Format SKL</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="ae_formatskl.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="tp_formatskl">Tempat Terbit</label>
                        <input type="hidden" class="form-control" placeholder="..." name="id_formatskl" id="id_formatskl">
                        <input type="text" class="form-control" placeholder="..." name="tp_formatskl" id="tp_formatskl">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tg_formatskl">Tanggal Terbit</label>
                        <input type="text" class="form-control datepicker" placeholder="..." name="tg_formatskl" id="tg_formatskl">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="fr_formatskl">Format No. SKL</label>
                        <input type="text" class="form-control" placeholder="..." name="fr_formatskl" id="fr_formatskl">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="bl_formatskl">Bulan Terbit</label>
                        <select name="bl_formatskl" class="form-control" id="bl_formatskl">
                            <option value="">...</option>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                            <option value="V">V</option>
                            <option value="VI">VI</option>
                            <option value="VII">VII</option>
                            <option value="VIII">VIII</option>
                            <option value="IX">IX</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="th_formatskl">Tahun Terbit</label>
                        <input type="text" class="form-control" name="th_formatskl" id="th_formatskl">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="st_formatskl">Status</label>
                        <select name="st_formatskl" class="form-control" id="st_formatskl">
                            <option value="">...</option>
                            <option value="Diterbitkan">Diterbitkan</option>
                            <option value="Belum Terbit">Belum Terbit</option>
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