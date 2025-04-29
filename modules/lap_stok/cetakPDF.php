<?php
session_start();
ob_start();

require_once "../../config/database.php";
include "../../config/fungsi_tanggal.php";
include "../../config/fungsi_rupiah.php";
require_once('../../vendor/autoload.php');

$hari_ini = date("d-m-Y");

$tgl_awal = $_GET['tgl_awal'];
$explode = explode('-', $tgl_awal);
$tgl_awal = $explode[2]."-".$explode[1]."-".$explode[0];

$tgl_akhir = $_GET['tgl_akhir'];
$explode = explode("-", $_GET['tgl_akhir']);
$tgl_akhir = $explode[2]."-".$explode[1]."-".$explode[0];

if (isset($_GET['tgl_awal'])) {
    $no = 1;
    $query = mysqli_query($mysqli, "SELECT b.kd_barang, b.nama_barang, b.harga_beli, b.harga_jual, (COALESCE(SUM(dm.jumlah_masuk), 0) - COALESCE(SUM(dk.jumlah_keluar), 0)) AS stok FROM tb_barang b LEFT JOIN detail_masuk dm ON dm.kd_barang = b.kd_barang LEFT JOIN detail_keluar dk ON dk.kd_barang = b.kd_barang  WHERE dm.tanggal_masuk BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY b.kd_barang, b.nama_barang, b.harga_beli, b.harga_jual") or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));
    $count = mysqli_num_rows($query);
}

use Mpdf\Mpdf;

$mpdf = new Mpdf(['format' => 'A4-L']);

$mpdf->AddPage();

$mpdf->SetFont('Arial', 'B', 24);
$mpdf->Cell(0, 10, 'PT. ANTARI JAYA MANDIRI', 0, 1, 'C');
$mpdf->Ln(2);

$mpdf->SetFont('Arial', 'B', 14);
$mpdf->Cell(0, 10, 'General Supplier & Contractor, Perum Puri Indah CL 09 Sidoarjo, 61224', 0, 1, 'C');
$mpdf->Ln(3);
$mpdf->Cell(0, 10, '', 'T', 1, 'C');
$mpdf->Ln(2);

$mpdf->SetFont('Arial', 'B', 18);
$mpdf->Cell(0, 10, 'LAPORAN STOK', 0, 1, 'C');
$mpdf->Ln(5);

$mpdf->SetFont('Arial', 'B', 10);
$mpdf->SetFillColor(200, 220, 255);
$mpdf->Cell(10, 10, 'No.', 1, 0, 'C', true);
$mpdf->Cell(36, 10, 'Kode Barang', 1, 0, 'C', true);
$mpdf->Cell(40, 10, 'Nama Barang', 1, 0, 'L', true);
$mpdf->Cell(40, 10, 'Harga Beli', 1, 0, 'C', true);
$mpdf->Cell(40, 10, 'Harga Jual', 1, 0, 'C', true);
$mpdf->Cell(40, 10, 'Stok', 1, 1, 'C', true);

$mpdf->SetFont('Arial', '', 10);

if ($count == 0) {
    $mpdf->Cell(720, 10, 'Data tidak ditemukan', 1, 1, 'C');
} else {
    while ($data = mysqli_fetch_assoc($query)) {

        $mpdf->Cell(10, 10, $no, 1, 0, 'C');
        $mpdf->Cell(36, 10, $data['kd_barang'], 1, 0, 'C');
        $mpdf->Cell(40, 10, $data['nama_barang'], 1, 0, 'L');
        $mpdf->Cell(40, 10, $data['harga_beli'], 1, 0, 'L');
        $mpdf->Cell(40, 10, $data['harga_jual'], 1, 0, 'L');
        $mpdf->Cell(40, 10, $data['stok'], 1, 0, 'C');
        $mpdf->Ln();

        $no++;
    }
}

$mpdf->Ln(10);

$mpdf->Cell(0, 10, 'Sidoarjo, ' . tgl_eng_to_ind($hari_ini), 0, 1, 'R');
$mpdf->Cell(0, 10, 'Manajer', 0, 1, 'R');
$mpdf->Cell(0, 10, 'Pak Mahendra', 0, 1, 'R');

$filename = "laporan_barang_masuk.pdf";
$mpdf->Output($filename, 'D');
?>