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
    $query = mysqli_query($mysqli, "SELECT dm.kd_transaksi, dm.tanggal_masuk, s.nama_supplier, b.nama_barang, dm.jumlah_masuk, dm.harga, dm.sub_total FROM detail_masuk dm JOIN tb_barang b ON dm.kd_barang = b.kd_barang JOIN tb_supplier s ON b.kd_supplier = s.kd_supplier WHERE dm.tanggal_masuk BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY dm.kd_transaksi ASC") or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));
    $count = mysqli_num_rows($query);
}

// Excel Generation
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Kode Barang');
$sheet->setCellValue('B1', 'Nama Barang');
$sheet->setCellValue('C1', 'Harga Beli');
$sheet->setCellValue('D1', 'Harga Jual');
$sheet->setCellValue('E1', 'Stok');

$row = 2;

while ($data = mysqli_fetch_assoc($query)) {
    $sheet->setCellValue('A' . $row, $data['kd_barang']);
    $sheet->setCellValue('B' . $row, $data['nama_barang']);
    $sheet->setCellValue('C' . $row, $data['harga_beli']);
    $sheet->setCellValue('D' . $row, $data['harga_jual']);
    $sheet->setCellValue('E' . $row, $data['stok']);
    $row++;
}

$writer = new Xlsx($spreadsheet);
$excelFileName = "laporan_barang_masuk.xlsx";
$writer->save($excelFileName);

// Download Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $excelFileName . '"');
header('Cache-Control: max-age=0');
$writer->save('php://output');

?>
