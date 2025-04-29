<?php
session_start();
ob_start();

require_once "../../config/database.php";
include "../../config/fungsi_tanggal.php";
include "../../config/fungsi_rupiah.php";
require_once('../../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$hari_ini = date("d-m-Y");

$tgl_awal = $_GET['tgl_awal'];
$explode = explode('-', $tgl_awal);
$tgl_awal = $explode[2]."-".$explode[1]."-".$explode[0];

$tgl_akhir = $_GET['tgl_akhir'];
$explode = explode("-", $_GET['tgl_akhir']);
$tgl_akhir = $explode[2]."-".$explode[1]."-".$explode[0];

if (isset($_GET['tgl_awal'])) {
    $no = 1;
    $query = mysqli_query($mysqli, "SELECT dk.kd_transaksi, dk.tanggal_keluar, s.nama_supplier, b.nama_barang, dk.jumlah_keluar, dk.harga, dk.sub_total FROM detail_keluar dk JOIN tb_barang b ON dk.kd_barang = b.kd_barang JOIN tb_supplier s ON b.kd_supplier = s.kd_supplier WHERE dk.tanggal_keluar BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY dk.kd_transaksi ASC") or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));
    $count = mysqli_num_rows($query);
}

// Excel Generation
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Kode Transaksi');
$sheet->setCellValue('B1', 'Tanggal');
$sheet->setCellValue('C1', 'Nama Supplier');
$sheet->setCellValue('D1', 'Nama Barang');
$sheet->setCellValue('E1', 'Jumlah Keluar');
$sheet->setCellValue('F1', 'Harga');
$sheet->setCellValue('G1', 'Total');

$row = 2;

while ($data = mysqli_fetch_assoc($query)) {
    $sheet->setCellValue('A' . $row, $data['kd_transaksi']);
    $sheet->setCellValue('B' . $row, $data['tanggal_keluar']);
    $sheet->setCellValue('C' . $row, $data['nama_supplier']);
    $sheet->setCellValue('D' . $row, $data['nama_barang']);
    $sheet->setCellValue('E' . $row, $data['jumlah_keluar']);
    $sheet->setCellValue('F' . $row, $data['harga']);
    $sheet->setCellValue('G' . $row, $data['sub_total']);
    $row++;
}

$writer = new Xlsx($spreadsheet);
$excelFileName = "laporan_barang_keluar.xlsx";
$writer->save($excelFileName);

// Download Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $excelFileName . '"');
header('Cache-Control: max-age=0');
$writer->save('php://output');

?>
