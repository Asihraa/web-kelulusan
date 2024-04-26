<div class="modal fade" id="me_users">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="me_users">
            <div class="modal-header">
                <h5 class="modal-title">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="ae_users.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="nm_user">Nama User</label>
                        <input type="hidden" name="id_user" id="id_user">
                        <input type="text" class="form-control" name="nm_user" id="nm_user" readonly="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="us_user">Username</label>
                        <input type="text" class="form-control" name="us_user" id="us_user" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="ps_user">Password</label>
                        <input type="text" class="form-control" name="ps_user" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="rl_user">Role</label>
                        <input type="text" class="form-control" name="rl_user" id="rl_user" value="Siswa" readonly="">
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