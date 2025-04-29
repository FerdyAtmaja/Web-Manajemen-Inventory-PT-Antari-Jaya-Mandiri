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
    $query = mysqli_query($mysqli, "SELECT dm.kd_transaksi, dm.tanggal_masuk, s.nama_supplier, b.nama_barang, dm.jumlah_masuk, dm.harga, dm.sub_total FROM detail_masuk dm JOIN tb_barang b ON dm.kd_barang = b.kd_barang JOIN tb_supplier s ON b.kd_supplier = s.kd_supplier WHERE dm.tanggal_masuk BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY dm.kd_transaksi ASC") or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));
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
$mpdf->Cell(0, 10, 'LAPORAN BARANG MASUK', 0, 1, 'C');
$mpdf->Ln(5);

$mpdf->SetFont('Arial', 'B', 10);
$mpdf->SetFillColor(200, 220, 255);
$mpdf->Cell(10, 10, 'No.', 1, 0, 'C', true);
$mpdf->Cell(36, 10, 'Kode Transaksi', 1, 0, 'C', true);
$mpdf->Cell(30, 10, 'Tanggal', 1, 0, 'C', true);
$mpdf->Cell(50, 10, 'Nama Supplier', 1, 0, 'C', true);
$mpdf->Cell(40, 10, 'Nama Barang', 1, 0, 'C', true);
$mpdf->Cell(20, 10, 'Jumlah', 1, 0, 'C', true);
$mpdf->Cell(40, 10, 'Harga', 1, 0, 'C', true);
$mpdf->Cell(40, 10, 'Total', 1, 1, 'C', true);

$mpdf->SetFont('Arial', '', 10);

if ($count == 0) {
    $mpdf->Cell(720, 10, 'Data tidak ditemukan', 1, 1, 'C');
} else {
    while ($data = mysqli_fetch_assoc($query)) {
        $tanggal  = $data['tanggal_masuk'];
        $exp      = explode('-', $tanggal);
        $tanggal_masuk = $exp[2]."-".$exp[1]."-".$exp[0];

        $mpdf->Cell(10, 10, $no, 1, 0, 'C');
        $mpdf->Cell(36, 10, $data['kd_transaksi'], 1, 0, 'C');
        $mpdf->Cell(30, 10, $tanggal_masuk, 1, 0, 'C');
        $mpdf->Cell(50, 10, $data['nama_supplier'], 1, 0, 'L');
        $mpdf->Cell(40, 10, $data['nama_barang'], 1, 0, 'L');
        $mpdf->Cell(20, 10, $data['jumlah_masuk'], 1, 0, 'C');
        $mpdf->Cell(40, 10, $data['harga'], 1, 0, 'L');
        $mpdf->Cell(40, 10, $data['sub_total'], 1, 0, 'L');
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
