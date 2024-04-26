<?php
error_reporting(0);
?> 
<div class="modal fade modal-dismissible" id="mi_siswa" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title">Import Data Siswa</div>
          <div class="modal-tool">
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
        </div>
        <div class="modal-body">
            <b>Perhatian..!!</b><br>
            Maksimal import hanya bisa 50 siswa per template<br>
            Pastikan nama kelas sudah sesuai dengan data kelas<br>
            Setelah import data siswa silahkan perbaiki data siswa...</p>
            <hr>
        <?php
        include '../config/koneksi.php';
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
                        $kl_siswa=$sheet->getCellByColumnAndRow(0,$i)->getValue();
                        $nm_siswa=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        $jr_siswa=$sheet->getCellByColumnAndRow(2,$i)->getValue();
                        $tm_siswa=$sheet->getCellByColumnAndRow(3,$i)->getValue();
                        $tg_siswa=$sheet->getCellByColumnAndRow(4,$i)->getValue();
                        $ni_siswa=$sheet->getCellByColumnAndRow(5,$i)->getValue();
                        $ns_siswa=$sheet->getCellByColumnAndRow(6,$i)->getValue();
                        $np_siswa=$sheet->getCellByColumnAndRow(7,$i)->getValue();
                        $ft_siswa=$sheet->getCellByColumnAndRow(8,$i)->getValue();
                        $nu_siswa=$sheet->getCellByColumnAndRow(9,$i)->getValue();
                        $st_siswa=$sheet->getCellByColumnAndRow(10,$i)->getValue();
                        if($nm_siswa!=''&&$kl_siswa!=''){
                            mysqli_query($conn,"insert into tb_siswa(
                            kl_siswa,
                            nm_siswa,
                            jr_siswa,
                            tm_siswa,
                            tg_siswa,
                            ni_siswa,
                            ns_siswa,
                            np_siswa,
                            ft_siswa,
                            nu_siswa,
                            st_siswa) 
                            values(
                            '$kl_siswa',
                            '$nm_siswa',
                            '$jr_siswa',
                            '$tm_siswa',
                            '$tg_siswa',
                            '$ni_siswa',
                            '$ns_siswa',
                            '$np_siswa',
                            '$ft_siswa',
                            '$nu_siswa',
                            '$st_siswa')");
                        }
                    }
                    if ($obj) {
                        echo "<script>window.location='pg_siswa.php?toastr=success_toast';</script>";
                    }else{
                        echo "<script>window.location='pg_siswa.php?toastr=error_toast';</script>";
                    }
                }
            }else{
                echo "Invalid file format";
            }
        }
        ?>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" name="doc"/>
                <input type="submit" name="submit" value="Import" class="btn btn-success btn-sm" />
            </div>
        </form>
            <hr>
            <i>Silahkan download</i> <b>Template_Siswa</b> 
            <a class="btn btn-xs btn-danger" href="../assets/file/template/template_siswa.xlsx"><i>Di Sini</i></a>
        </div>
      </div>
    </div>
</div>
