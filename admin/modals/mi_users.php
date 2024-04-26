<?php
error_reporting(0);
include '../config/koneksi.php';
?> 
<div class="modal fade modal-dismissible" id="mi_users" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title">Import Data User</div>
          <div class="modal-tool">
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
        </div>
        <div class="modal-body">
            <center>
                <p>
                <b>Pastikan Data Siswa Sudah Diinput</b><br>
                <b>Username tidak boleh sama</b><br>
                Silahkan download template user
                </p>
            </center>
            <form action="temp_users.php" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text">Pilih Jurusan</label>
                    </div>
                    <select class="custom-select" name="pl_jurusan" id="pl_jurusan" 
                    onchange=" if (this.selectedIndex!=0){ document.getElementById('tampilkan').style.display = 'inline' }else{ document.getElementById('tampilkan').style.display = 'none' };">
                        <option value="">...</option>
                        <?php
                        $jurusan = mysqli_query($conn, "SELECT * FROM tb_jurusan");
                        while ($data = mysqli_fetch_array($jurusan)) {
                            
                        ?>
                        <option value="<?php echo $data['si_jurusan']; ?>"><?php echo $data['si_jurusan']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <span id="tampilkan" style="display:none;">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">Pilih Kelas</label>
                        </div>
                        <select class="custom-select" name="pl_kelas" required="">
                            <option value="">...</option>
                            <?php
                            $kelas = mysqli_query($conn, "SELECT * FROM tb_kelas");
                            while ($data = mysqli_fetch_array($kelas)) {
                                
                            ?>
                            <option value="<?php echo $data['nm_kelas']; ?>"><?php echo $data['nm_kelas']; ?></option>
                            <?php } ?>
                        </select>
                        <input type="submit" name="pilihdata" class="btn btn-sm btn-info text-white " value="Download">
                    </div>
                    <p><i class="text-danger">Untuk Mendownload Template, Pastikan Data Siswa Sudah Diinput</i></p>
                </span>
            </form>
            <hr>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" name="doc"/>
                    <input type="submit" name="submit" value="Import" class="btn btn-success btn-sm text-white" />
                </div>
            </form>
        </div>
        <?php
        if(isset($_POST['submit'])){
            $file=$_FILES['doc']['tmp_name'];
            
            $ext=pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
            if($ext=='xlsx'){
                require('../assets/PHPExcel/PHPExcel.php');
                require('../assets/PHPExcel/PHPExcel/IOFactory.php');
                
                $obj=PHPExcel_IOFactory::load($file);
                foreach($obj->getWorksheetIterator() as $sheet){
                    $getHighestRow=$sheet->getHighestRow();
                    for($i=2;$i<=$getHighestRow;$i++){
                        $nm_user=$sheet->getCellByColumnAndRow(0,$i)->getValue();
                        $us_user=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        $ps_user=$sheet->getCellByColumnAndRow(2,$i)->getValue();
                        $rl_user=$sheet->getCellByColumnAndRow(3,$i)->getValue();
                        if($nm_user!=''){
                            mysqli_query($conn,"insert into tb_user(
                            nm_user,
                            us_user,
                            ps_user,
                            rl_user
                            ) values(
                            '$nm_user',
                            '$us_user',
                            '".md5($ps_user)."',
                            '$rl_user'
                            )");
                        }
                    }
                    if ($obj) {
                        echo "<script>window.location='pg_users.php?toastr=success_toast';</script>";
                    }else{
                        echo "<script>window.location='pg_users.php?toastr=error_toast';</script>";
                    }
                }
            }else{
                echo "Invalid file format";
            }
        }
        ?>
        <div class="modal-footer">
            <button class="btn btn-sm btn-danger text-white" data-dismiss="modal">Tutup</button>
        </div>
    </div>
</div>
