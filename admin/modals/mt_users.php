<div class="modal fade" id="mt_users">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User Siswa</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="at_users.php" method="post">
                <div class="modal-body">
                    <center>
                        <i class="text-danger">
                            <b>PERHATIAN..!!</b><br>
                            Jangan menggunakan karakter <b>@#$%^&*';"</b> untuk menghindari error <br> pada aplikasi
                        </i>
                    </center>
                    <hr>
                    <div class="form-group">
                        <label class="control-label" for="nm_user">Nama Siswa</label>
                        <select name="nm_user" class="js-example-basic-single" style="height: 36px; width: 100%;" id="nm_user">
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
                        <input type="text" class="form-control" name="us_user" id="us_user">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="ps_user">Password</label>
                        <input type="text" class="form-control" name="ps_user" id="ps_user">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="rl_user">Role</label>
                        <input type="text" class="form-control" name="rl_user" id="rl_user" value="Siswa" readonly="">
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