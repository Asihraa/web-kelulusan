<?php
include "../config/koneksi.php";

require '../assets/PHPExcel/PHPExcel2/PHPExcel.php';

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Kang Mahmud')
					   ->setLastModifiedBy('Kang Mahmud')
					   ->setTitle("Template User")
					   ->setSubject("User Siswa")
					   ->setDescription("Data User Siswa")
					   ->setKeywords("Data User Siswa");

require '../assets/PHPExcel/PHPExcel2/FungsiWarna2.php';

$style_col = array(
	'font' => array('bold' => true),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
	)
);

$style_row = array(
	'alignment' => array(
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
	)
);

$excel->setActiveSheetIndex(0)->setCellValue('A1', "NAMA SISWA"); 
$excel->setActiveSheetIndex(0)->setCellValue('B1', "USERNAME");
$excel->setActiveSheetIndex(0)->setCellValue('C1', "PASSWORD");
$excel->setActiveSheetIndex(0)->setCellValue('D1', "ROLE");

$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);

$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);

$jurusan=$_POST['pl_jurusan'];
$kelas=$_POST['pl_kelas'];
$sql = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE jr_siswa='$jurusan'&&kl_siswa='$kelas' ORDER BY nm_siswa ASC");

$numrow = 2;
while($data = mysqli_fetch_array($sql)){
	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['nm_siswa']);
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, 'Isikan username');	
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, 'Isikan password');
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, 'Siswa');
	
	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	
	$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
	
	$numrow++;
}
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);

$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

$excel->getActiveSheet(0)->setTitle("Tmp_Nilai");
$excel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Tmp_User_'.$_POST['pl_kelas'].'.xlsx"');
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>
