<div class="modal fade" id="me_users">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="me_users">
            <div class="modal-header">
                <h5 class="modal-title">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="ae_users.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="nm_tahun">Nama User</label>
                        <input type="hidden" name="id_user" id="id_user">
                        <select name="nm_user" class="custom-select select2" id="nm_user">
                            <option selected="selected"></option>
                            <?php
                            $siswa = mysqli_query($conn, "SELECT * FROM tb_siswa");
                            while ($data = mysqli_fetch_array($siswa)) {
                                
                            ?>
                            <option value="<?php echo $data['nm_siswa']; ?>"><?php echo $data['nm_siswa']; ?></option>
                            <?php } ?>
                        </select>
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