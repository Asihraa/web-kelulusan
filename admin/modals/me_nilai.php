<div class="modal fade" id="me_nilai">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="me_nilai">
            <div class="modal-header">
                <h5 class="modal-title">Edit Nilai Siswa</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="ae_nilai.php" method="post">
                <div class="modal-body">
                    <center>
                    <div class="form-group">
                        <label class="control-label" for="nm_nilai"><b>Nama Siswa</b></label>
                        <input type="hidden" class="form-control" name="id_nilai" id="id_nilai" readonly="">
                        <input type="text" class="form-control text-center" name="nm_nilai" id="nm_nilai" readonly="">
                        <input type="hidden" class="form-control" name="kl_nilai" id="kl_nilai" readonly="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="mp_nilai"><b>Mata Pelajaran</b></label>
                        <input type="text" class="form-control text-center" name="mp_nilai" id="mp_nilai" readonly="">
                        <input type="hidden" class="form-control" name="km_nilai" id="km_nilai" readonly="">
                    </div>
                    </center>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">Nilai Rapor</label>
                        </div>
                        <input type="number" class="form-control" name="nr_nilai" id="nr_nilai">
                        <div class="input-group-prepend">
                            <label class="input-group-text">Nilai Ujian</label>
                        </div>
                        <input type="number" class="form-control" name="nu_nilai" id="nu_nilai">
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