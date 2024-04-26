<?php
require('../assets/fpdf/fpdf.php');
include '../config/koneksi.php';

function tgl_indo($tanggal){
    $bulan=array (
        1 =>   'Januari',
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

$pdf->SetFont('Times','B',18);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(190,10,'DAFTAR NILAI SISWA',0,0,'C');

$pdf->SetFont('Times','',14);
$pdf->SetTextColor(0, 0, 0);

$mutasi=mysqli_query($conn, "SELECT * FROM tb_siswa WHERE id_siswa='".$_GET['ids']."'");
$sis=mysqli_fetch_array($mutasi);
$amjur=mysqli_query($conn, "SELECT * FROM tb_jurusan WHERE si_jurusan='".$sis['jr_siswa']."'");
$jur=mysqli_fetch_array($amjur);

$pdf->MultiCell(15,6,'',0);
$pdf->Cell(190,10,'PROGRAM STUDI '.strtoupper($jur['nm_jurusan']),0,0,'C');

$tahun=mysqli_query($conn, "SELECT nm_tahun FROM tb_tahun");
$th=mysqli_fetch_array($tahun);
$pdf->MultiCell(15,6,'',0);
$pdf->Cell(190,10,'Tahun Ajaran '.$th['nm_tahun'],0,0,'C');

$pdf->SetFont('Times','',12);
$pdf->SetTextColor(0, 0, 0);

$plsiswa=mysqli_query($conn, "SELECT * FROM tb_siswa WHERE id_siswa='".$_GET['ids']."'");
while ($sis=mysqli_fetch_array($plsiswa)){

    $pdf->MultiCell(15,15,'',0);
    $nama_kecil=strtoupper($sis['nm_siswa']);

    $pdf->Cell(50,2,'        Nama',0,0,'L');
    $pdf->Cell(50,2,' : '.$nama_kecil,0,0);

    $pdf->MultiCell(15,6,'',0);
    $pdf->Cell(50,2,'        NIS',0,0,'L');
    $pdf->Cell(50,2,' : '.$sis['ni_siswa'],0,0);

    $pdf->MultiCell(15,6,'',0);
    $pdf->Cell(50,2,'        NISN',0,0,'L');
    $pdf->Cell(50,2,' : '.$sis['ns_siswa'],0,0);

    $pdf->MultiCell(15,6,'',0);
    $pdf->Cell(50,2,'        No. Peserta Ujian',0,0,'L');
    $pdf->Cell(45,2,' : '.$sis['np_siswa'],0,0);

    $pdf->SetFont('Times','B',12);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(6,7,' ',0,0,'C');
    $pdf->Cell(10,7,'No',1,0,'C');
    $pdf->Cell(100,7,'Mata Pelajaran',1,0,'C');
    $pdf->Cell(35,7,'Nilai Raport',1,0,'C');
    $pdf->Cell(35,7,'Nilai Ujian',1,0,'C');

    $pdf->SetFont('Times','',12);
    $pdf->SetTextColor(0, 0, 0);

    $no=1;
    $plkelompok=mysqli_query($conn, "SELECT DISTINCT kl_mmapel FROM tb_mmapel");
    while ($kl=mysqli_fetch_array($plkelompok)){

        $pdf->MultiCell(15,7,'',0);
        $pdf->Cell(6,7,' ',0,0,'C');
        $pdf->Cell(180,7,'  '.$kl['kl_mmapel'],1,0,'L');

        $plnilai=mysqli_query($conn, "SELECT * FROM tb_nilai WHERE nm_nilai='".$sis['nm_siswa']."'&&km_nilai='".$kl['kl_mmapel']."'");
        while ($nl=mysqli_fetch_array($plnilai)){

        $pdf->MultiCell(15,7,'',0);
        $pdf->Cell(6,7,' ',0,0,'C');
        $pdf->Cell(10,7,$no++,1,0,'C');
        $pdf->Cell(100,7,$nl['mp_nilai'],1,0,'L');
        $pdf->Cell(35,7,$nl['nr_nilai'],1,0,'C');
        $pdf->Cell(35,7,$nl['nu_nilai'],1,0,'C');

        }
    }
    $pdf->SetFont('Times','B',12);
    $pdf->SetTextColor(0, 0, 0);

    $reknilai=mysqli_query($conn, "SELECT SUM(nr_nilai) AS nr, SUM(nu_nilai) AS nu FROM tb_nilai WHERE nm_nilai='".$sis['nm_siswa']."'");
    $ntt=mysqli_fetch_array($reknilai);

    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(6,7,' ',0,0,'C');
    $pdf->Cell(110,7,'JUMLAH  ',1,0,'R');
    $pdf->Cell(35,7,$ntt['nr'],1,0,'C');
    $pdf->Cell(35,7,$ntt['nu'],1,0,'C');

    $reknilai=mysqli_query($conn, "SELECT AVG(nr_nilai) AS nr, AVG(nu_nilai) AS nu FROM tb_nilai WHERE nm_nilai='".$sis['nm_siswa']."'");
    $nrt=mysqli_fetch_array($reknilai);

    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(6,7,' ',0,0,'C');
    $pdf->Cell(110,7,'RATA-RATA  ',1,0,'R');
    $pdf->Cell(35,7,number_format($nrt['nr'],2),1,0,'C');
    $pdf->Cell(35,7,number_format($nrt['nu'],2),1,0,'C');

    $pdf->MultiCell(15,10,'',0);
}

    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(125,8,'',0);

    $pdf->MultiCell(15,7,'',0);
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

$nmtranskrip=mysqli_query($conn, "SELECT nm_siswa FROM tb_siswa WHERE id_siswa='".$_GET['ids']."'");
$nt=mysqli_fetch_array($nmtranskrip);

$pdf->Output('D','TRANSKRIP_'.strtolower($nt['nm_siswa']).'.pdf');

?>