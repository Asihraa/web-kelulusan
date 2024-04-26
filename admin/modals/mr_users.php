 <div class="modal fade modal-dismissible" id="mr_users" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <div class="modal-title text-white">Reset User Siswa</div>
          <div class="modal-tool">
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
        </div>
        <div class="modal-body">
            <center>
                <h4 class="text-white"><b>PERHATIAN..!!</b></h4>
                <h5 class="text-white"><b>JIKA ANDA MERESET DATA USER, MAKA SELURUH DATA USER SISWA AKAN TERHAPUS</b></h5>
                <h6 class="text-white"><b>APAKAH ANDA YAKIN AKAN TETAP MERESET USER ...??</b></h6>
            </center>
        </div>
        <div class="modal-footer">
            <form action="reset_users.php" method="post">
                <input type="submit" name="reset" class="btn btn-sm btn-light mr-3" value="Tetap Reset">
                <button class="btn btn-sm btn-dark text-white" data-dismiss="modal">Tutup</button>
            </form>
        </div>
      </div>
    </div>
</div>
