<?php
session_start();
ob_start();

require_once "../../config/database.php";
include "../../config/fungsi_tanggal.php";
require_once('../../vendor/autoload.php');

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
$mpdf->Cell(0, 10, 'LAPORAN BARANG KELUAR', 0, 1, 'C');
$mpdf->Ln(5);

if (isset($_GET['tgl_awal'])) {
    $tgl_awal = $_GET['tgl_awal'];
    $tgl_akhir = $_GET['tgl_akhir'];

    $tgl_awal = date("Y-m-d", strtotime($tgl_awal));
    $tgl_akhir = date("Y-m-d", strtotime($tgl_akhir));
    $query = mysqli_query($mysqli, "SELECT dk.kd_transaksi, dk.tanggal_keluar, s.nama_supplier, b.nama_barang, dk.jumlah_keluar, dk.harga, dk.sub_total FROM detail_keluar dk JOIN tb_barang b ON dk.kd_barang = b.kd_barang JOIN tb_supplier s ON b.kd_supplier = s.kd_supplier WHERE dk.tanggal_keluar BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY dk.kd_transaksi ASC") or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));
    $count = mysqli_num_rows($query);

    $mpdf->SetFont('Arial', 'B', 12);
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
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)) {
            $tanggal_keluar = date("d-m-Y", strtotime($data['tanggal_keluar']));
            $mpdf->Cell(10, 10, $no, 1, 0, 'C');
            $mpdf->Cell(36, 10, $data['kd_transaksi'], 1, 0, 'C');
            $mpdf->Cell(30, 10, $tanggal_keluar, 1, 0, 'C');
            $mpdf->Cell(50, 10, $data['nama_supplier'], 1, 0, 'L');
            $mpdf->Cell(40, 10, $data['nama_barang'], 1, 0, 'L');
            $mpdf->Cell(20, 10, $data['jumlah_keluar'], 1, 0, 'C');
            $mpdf->Cell(40, 10, $data['harga'], 1, 0, 'L');
            $mpdf->Cell(40, 10, $data['sub_total'], 1, 0, 'L');
            $mpdf->Ln();
            $no++;
        }
    }
}

$mpdf->Ln(10);
$hari_ini = date("d-m-Y");
$mpdf->Cell(0, 10, 'Sidoarjo, ' . tgl_eng_to_ind($hari_ini), 0, 1, 'R');
$mpdf->Cell(0, 10, 'Manajer', 0, 1, 'R');
$mpdf->Cell(0, 10, 'Pak Mahendra', 0, 1, 'R');

$filename = "laporan_barang_keluar.pdf";
$mpdf->Output($filename, 'D');
?>
