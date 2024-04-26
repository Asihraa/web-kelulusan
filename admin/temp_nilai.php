<?php
include "../config/koneksi.php";

require '../assets/PHPExcel/PHPExcel2/PHPExcel.php';

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Kang Mahmud')
					   ->setLastModifiedBy('Kang Mahmud')
					   ->setTitle("Template Nilai")
					   ->setSubject("Nilai Siswa")
					   ->setDescription("Data Nilai Siswa")
					   ->setKeywords("Data Nilai Siswa");

require '../assets/PHPExcel/PHPExcel2/FungsiWarna.php';

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

$excel->setActiveSheetIndex(0)->setCellValue('A1', "JURUSAN"); 
$excel->setActiveSheetIndex(0)->setCellValue('B1', "KELAS"); 
$excel->setActiveSheetIndex(0)->setCellValue('C1', "MAPEL"); 
$excel->setActiveSheetIndex(0)->setCellValue('D1', "KELOMPOK"); 
$excel->setActiveSheetIndex(0)->setCellValue('E1', "NAMA SISWA"); 
$excel->setActiveSheetIndex(0)->setCellValue('F1', "N. RAPOR");
$excel->setActiveSheetIndex(0)->setCellValue('G1', "N. UJIAN");

$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);

$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('6')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('7')->setRowHeight(20);

$sql = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE jr_siswa='".$_POST['pl_jurusan']."'&&kl_siswa='".$_POST['pl_kelas']."' ORDER BY nm_siswa ASC");

$mmapel = mysqli_query($conn, "SELECT * FROM tb_mmapel WHERE mp_mmapel='".$_POST['mp_mmapel']."'&&kl_mmapel='".$_POST['kl_mmapel']."'");
$mp = mysqli_fetch_array($mmapel);
$mapel = $mp['mp_mmapel'];
$kel = $mp['kl_mmapel'];
$numrow = 2;
while($data = mysqli_fetch_array($sql)){
	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['jr_siswa']);
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['kl_siswa']);

	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $mapel);
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $kel);	

	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['nm_siswa']);
	$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, '');
	$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, '');
	
	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	
	$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
	
	$numrow++;
}
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(35);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);

$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

$excel->getActiveSheet(0)->setTitle("Tmp_Nilai");
$excel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Tmp_Nilai_'.$_POST['mp_mmapel'].'_'.$_POST['pl_kelas'].'.xlsx"');
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>
