<?php
error_reporting(0);
include "../config/koneksi.php";

require '../assets/PHPExcel/PHPExcel2/PHPExcel.php';

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Kang Mahmud')
					   ->setLastModifiedBy('Kang Mahmud')
					   ->setTitle("Leger Nilai")
					   ->setSubject("Nilai Siswa")
					   ->setDescription("Data Nilai Siswa")
					   ->setKeywords("Data Nilai Siswa");

require '../assets/PHPExcel/PHPExcel2/FungsiWarna3.php';

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

$style_col2 = array(
	'font' => array('bold' => true),
	'alignment' => array(
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
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

$style_row2 = array(
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

$excel->setActiveSheetIndex(0)->setCellValue('A1', "LEGER NILAI".' : '.$_POST['kelas']); 

$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col2);
 
$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO.");
$excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA SISWA"); 
$excel->setActiveSheetIndex(0)->setCellValue('C3', "MAPEL");
$excel->setActiveSheetIndex(0)->setCellValue('D3', "KELOMPOK"); 
$excel->setActiveSheetIndex(0)->setCellValue('E3', "N. RAPOR");
$excel->setActiveSheetIndex(0)->setCellValue('F3', "N. UJIAN");

$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);

$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('6')->setRowHeight(20);

$no=1;
$sql = mysqli_query($conn, "SELECT * FROM tb_nilai WHERE jr_nilai='".$_POST['jurusan']."'&&kl_nilai='".$_POST['kelas']."' ORDER BY nm_nilai ASC");
$numrow = 4;
while($data = mysqli_fetch_array($sql)){
	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no++);
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['nm_nilai']);
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['mp_nilai']);
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['km_nilai']);
	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['nr_nilai']);
	$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['nu_nilai']);
	
	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row2);
	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row2);
	$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row2);
	
	$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
	
	$numrow++;
}
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);

$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

$excel->getActiveSheet(0)->setTitle("Tmp_Nilai");
$excel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Leger_Nilai_Kelas_'.$_POST['kelas'].'.xlsx"');
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>
