<div class="modal fade" id="me_admin">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="me_admin">
            <div class="modal-header">
                <h5 class="modal-title">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="ae_admin.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="nm_tahun">Nama User</label>
                        <input type="hidden" name="id_admin" id="id_admin">
                        <input type="text" class="form-control" name="nm_admin" id="nm_admin">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="us_admin">Username</label>
                        <input type="text" class="form-control" name="us_admin" id="us_admin" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="ps_admin">Password</label>
                        <input type="text" class="form-control" name="ps_admin" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="rl_admin">Role</label>
                        <input type="text" class="form-control" name="rl_admin" id="rl_admin" value="Siswa" readonly="">
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-info text-white" name="edit" value="Edit">
                </div>
            </form>
        </div>
    </div>
</div>