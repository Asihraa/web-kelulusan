<div class="modal fade" id="me_psusers">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="me_psusers">
            <div class="modal-header">
                <h5 class="modal-title">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="ae_psusers.php" method="post">
                <div class="modal-body">
                    <center>
                        <input type="hidden" name="id_user" id="id_user">
                        <input type="text" class="text-center" name="nm_user" id="nm_user" style="border: none; background: white;" readonly="">
                        <input type="hidden" name="us_user" id="us_user">
                        <input type="hidden" name="ps_user" value="123456">
                        <input type="hidden" name="rl_user" id="rl_user" value="Siswa" readonly="">
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-warning text-white" name="edit" value="Reset Password">
                </div>
            </form>
        </div>
    </div>
</div>