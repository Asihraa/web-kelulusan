<?php
require('../assets/fpdf/fpdf.php');
include '../config/koneksi.php';

function tgl_indo($tanggal){
    $bulan=array (
        1=>'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan=explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();

$lembaga=mysqli_query($conn, "SELECT * FROM tb_sekolah");
$data=mysqli_fetch_array($lembaga);

$kop=$data['ks_sekolah'];
$folder='../assets/file/profile/'.$kop;
if (is_file($folder)) {
    $pdf->Image($folder,20,10);
}

$pdf->Cell(25,40,'',0,1);

$pdf->SetFont('Times','U',13);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(190,2,'SURAT KETERANGAN LULUS (SKL)',0,0,'C');

$mutasi=mysqli_query($conn, "SELECT * FROM tb_siswa WHERE id_siswa='".$_GET['ids']."'");
while ($sis=mysqli_fetch_array($mutasi)){

    $urut=$sis['nu_siswa'];
    $PilihFormat=mysqli_query($conn, "SELECT * FROM tb_formatskl");
    $format=mysqli_fetch_array($PilihFormat);

    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(15,5,'',0);
    $pdf->Cell(60,2,'',0,0,'C');
    $pdf->Cell(18,2,' Nomor : ',0,0,'R');
    $pdf->Cell(50,2,' '.$format['fr_formatskl'].'/'.$urut.'/'.$format['bl_formatskl'].'/'.$format['th_formatskl'],0,0,'C');

    $pdf->MultiCell(15,8,'',0);

    $nmsekolah=mysqli_query($conn, "SELECT nm_sekolah FROM tb_sekolah");
    $sek=mysqli_fetch_array($nmsekolah);
    $pdf->Cell(45,2,'       Yang bertanda tangan di bawah ini, Kepala '.$sek['nm_sekolah'].' menerangkan bahwa :',0,0,'L');

    $pdf->MultiCell(15,6,'',0);
    $pdf->Cell(50,6,'        Nama',0,0,'L');
    $pdf->Cell(50,6,' : '.strtoupper($sis['nm_siswa']),0,0);

    $pdf->MultiCell(15,6,'',0);
    $pdf->Cell(50,6,'        NIS',0,0,'L');
    $pdf->Cell(50,6,' : '.$sis['ni_siswa'],0,0);

    $pdf->MultiCell(15,6,'',0);
    $pdf->Cell(50,6,'        NISN',0,0,'L');
    $pdf->Cell(50,6,' : '.$sis['ns_siswa'],0,0);

    $pdf->MultiCell(15,6,'',0);
    $pdf->Cell(50,6,'        Tempat & tanggal lahir',0,0,'L');
    $pdf->Cell(40,6,' : '.$sis['tm_siswa'].', ',0,0);
    $pdf->Cell(30,6,tgl_indo($sis['tg_siswa']),0,0);

    $pdf->MultiCell(15,6,'',0);
    $pdf->Cell(50,6,'        No. Peserta Ujian',0,0,'L');
    $pdf->Cell(45,6,' : '.$sis['np_siswa'],0,0);

    $pdf->MultiCell(15,6,'',0);
    $pdf->MultiCell(15,2,'',0);

    $amjur=mysqli_query($conn, "SELECT * FROM tb_jurusan WHERE si_jurusan='".$sis['jr_siswa']."'");
    $jur=mysqli_fetch_array($amjur);

    $pdf->Cell(45,6,'        Telah mengikuti Ujian Akhir di '.$sek['nm_sekolah'].' Program Studi ',0,0,'L');
    
    $pdf->MultiCell(15,6,'',0);
    $pdf->Cell(45,6,'        '.$jur['nm_jurusan'].' dan dinyatakan :',0,0,'L');

    $pdf->SetFont('Times','B',18);
    $pdf->MultiCell(15,8,'',0);
    $pdf->Cell(185,8,$sis['st_siswa'],0,0,'C');

    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(15,6,'',0);
    $pdf->MultiCell(15,6,'',0);

    $tahun=mysqli_query($conn, "SELECT nm_tahun FROM tb_tahun");
    $th=mysqli_fetch_array($tahun);

    $pdf->Cell(45,5,'       SKL ini dapat digunakan untuk keperluan Penerimaan Siswa/Mahasiswa Baru atau keperluan lainnya',0,0,'L');
    $pdf->MultiCell(15,6,'',0);
    $pdf->Cell(45,5,'       sesuai kebutuhan, dan hanya berlaku sampai dengan diterbitkannya Ijazah Tahun Ajaran '.$th['nm_tahun'],0,0);

    $pdf->MultiCell(15,13,'',0);
}

    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(125,8,'',0);

    $pdf->MultiCell(15,7,'',0);

    $foto=mysqli_query($conn, "SELECT * FROM tb_siswa WHERE id_siswa='".$_GET['ids']."'");
    $ft=mysqli_fetch_array($foto);
    
    $file=$ft['ft_siswa'];
    $dir='../assets/file/foto/'.$file;
    if (is_file($dir)) {
        $pdf->Image($dir,93,163,28);
    }else{
       //.. 
    }

    $pdf->Cell(125,7,'',0);
    $pdf->SetFont('Times','',12);
    $pdf->SetTextColor(0, 0, 0);
    $PilihWaktu=mysqli_query($conn, "SELECT * FROM tb_formatskl");
    $wk=mysqli_fetch_array($PilihWaktu);
    $pdf->Cell(60,7,$wk['tp_formatskl'].', '.tgl_indo($wk['tg_formatskl']),0,0,'L');

    $pdf->SetFont('Times','',12);

    $sekolah=mysqli_query($conn, "SELECT nm_sekolah, kp_sekolah, nk_sekolah FROM tb_sekolah");
    $gr=mysqli_fetch_array($sekolah);

    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(125,7,'',0);
    $pdf->Cell(60,7,'Kepala ',0,0,'L');

    $pdf->MultiCell(15,6,'',0);
    $pdf->Cell(125,6,'',0);
    $pdf->Cell(60,6,$gr['nm_sekolah'].',',0,0,'L');

    $pdf->Cell(125,12,'',0);

    $pdf->SetFont('Times','U',12);
    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(125,55,'',0);
    $pdf->Cell(60,32,$gr['kp_sekolah'],0,0,'L');
    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(125,45,'',0);
    $pdf->Cell(60,28,'NIP. '.$gr['nk_sekolah'],0,0,'L');

$nmskl=mysqli_query($conn, "SELECT nm_siswa FROM tb_siswa WHERE id_siswa='".$_GET['ids']."'");
$ns=mysqli_fetch_array($nmskl);

$pdf->Output('D','SKL_'.strtolower($ns['nm_siswa']).'.pdf');

?>