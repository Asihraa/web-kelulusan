<div class="modal fade" id="mt_admin">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User Admin</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="at_admin.php" method="post">
                <div class="modal-body">
                    <center>
                        <i class="text-danger">
                            <b>PERHATIAN..!!</b><br>
                            Jangan menggunakan karakter <b>@#$%^&*';"</b> untuk menghindari error <br> pada aplikasi
                        </i>
                    </center>
                    <hr>
                    <div class="form-group">
                        <label class="control-label" for="nm_admin">Nama Admin</label>
                        <input type="text" class="form-control" name="nm_admin" id="nm_admin">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="us_admin">Username</label>
                        <input type="text" class="form-control" name="us_admin" id="us_admin">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="ps_admin">Password</label>
                        <input type="text" class="form-control" name="ps_admin" id="ps_admin">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="rl_admin">Role</label>
                        <input type="text" class="form-control" name="rl_admin" id="rl_admin" value="Admin" readonly="">
                        </select>
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