<?php
error_reporting(0);
include '../config/koneksi.php';
if(isset($_POST['import'])){
    $file=$_FILES['doc']['tmp_name'];
    
    $ext=pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
    if($ext=='xlsx'){
        require('../assets/PHPExcel/PHPExcel.php');
        require('../assets/PHPExcel/PHPExcel/IOFactory.php');
        
        $obj=PHPExcel_IOFactory::load($file);
        foreach($obj->getWorksheetIterator() as $sheet){
            $getHighestRow=$sheet->getHighestRow();
            for($i=2;$i<=$getHighestRow;$i++){
                $jr_nilai=$sheet->getCellByColumnAndRow(0,$i)->getValue();
                $kl_nilai=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                $mp_nilai=$sheet->getCellByColumnAndRow(2,$i)->getValue();
                $km_nilai=$sheet->getCellByColumnAndRow(3,$i)->getValue();
                $nm_nilai=$sheet->getCellByColumnAndRow(4,$i)->getValue();
                $nr_nilai=$sheet->getCellByColumnAndRow(5,$i)->getValue();
                $nu_nilai=$sheet->getCellByColumnAndRow(6,$i)->getValue();
                if($kl_nilai!=''&&$mp_nilai!=''){
                    mysqli_query($conn,"insert into tb_nilai(
                    jr_nilai,
                    kl_nilai,
                    mp_nilai,
                    km_nilai,
                    nm_nilai,
                    nr_nilai,
                    nu_nilai
                    ) values(
                    '$jr_nilai',
                    '$kl_nilai',
                    '$mp_nilai',
                    '$km_nilai',
                    '$nm_nilai',
                    '$nr_nilai',
                    '$nu_nilai'
                    )");
                }
            }
            if ($obj) {
                echo "<script>window.location='pg_nilai.php?toastr=success_toast';</script>";
            }else{
                echo "<script>window.location='pg_nilai.php?toastr=error_toast';</script>";
            }
        }
    }else{
        echo "Invalid file format";
    }
}
?>