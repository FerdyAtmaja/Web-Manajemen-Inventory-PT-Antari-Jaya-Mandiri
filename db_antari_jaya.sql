-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2022 pada 15.24
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_antari_jaya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_keluar`
--

CREATE TABLE `detail_keluar` (
  `kd_transaksi` char(15) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `kd_barang` char(9) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_keluar`
--

INSERT INTO `detail_keluar` (`kd_transaksi`, `tanggal_keluar`, `kd_barang`, `jumlah_keluar`, `harga`, `sub_total`) VALUES
('TK-2022-0000001', '2022-12-27', 'PRD000095', 2, 23000, 46000),
('TK-2022-0000002', '2022-12-27', 'PRD000086', 2, 35000, 70000),
('TK-2022-0000003', '2022-12-27', 'PRD000092', 2, 55000, 110000),
('TK-2022-0000004', '2022-12-27', 'PRD000094', 2, 25000, 50000),
('TK-2022-0000005', '2022-12-27', 'PRD000093', 3, 140000, 420000),
('TK-2022-0000006', '2022-12-27', 'PRD000090', 11, 30000, 330000),
('TK-2022-0000007', '2022-12-27', 'PRD000087', 2, 40000, 80000),
('TK-2022-0000008', '2022-12-27', 'PRD000089', 15, 35000, 525000),
('TK-2022-0000009', '2022-12-27', 'PRD000094', 1, 25000, 25000),
('TK-2022-0000010', '2022-12-27', 'PRD000089', 5, 35000, 175000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_masuk`
--

CREATE TABLE `detail_masuk` (
  `kd_transaksi` char(15) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `kd_barang` char(9) NOT NULL,
  `kd_supplier` char(9) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_masuk`
--

INSERT INTO `detail_masuk` (`kd_transaksi`, `tanggal_masuk`, `kd_barang`, `kd_supplier`, `jumlah_masuk`, `harga`, `sub_total`) VALUES
('TM-2022-0000001', '2022-12-27', 'PRD000095', 'SUP000018', 10, 20000, 200000),
('TM-2022-0000002', '2022-12-27', 'PRD000001', 'SUP000001', 1, 21850, 21850),
('TM-2022-0000003', '2022-12-27', 'PRD000094', 'SUP000018', 10, 23000, 230000),
('TM-2022-0000004', '2022-12-27', 'PRD000093', 'SUP000018', 15, 136000, 2040000),
('TM-2022-0000005', '2022-12-27', 'PRD000092', 'SUP000018', 16, 50000, 800000),
('TM-2022-0000006', '2022-12-27', 'PRD000091', 'SUP000018', 5, 25000, 125000),
('TM-2022-0000007', '2022-12-27', 'PRD000090', 'SUP000017', 10, 28000, 280000),
('TM-2022-0000008', '2022-12-27', 'PRD000090', 'SUP000017', 10, 28000, 280000),
('TM-2022-0000009', '2022-12-27', 'PRD000089', 'SUP000017', 38, 32000, 1216000),
('TM-2022-0000010', '2022-12-27', 'PRD000088', 'SUP000017', 30, 23000, 690000),
('TM-2022-0000011', '2022-12-27', 'PRD000087', 'SUP000017', 15, 35000, 525000),
('TM-2022-0000012', '2022-12-27', 'PRD000086', 'SUP000016', 5, 30000, 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_keluar`
--

CREATE TABLE `keranjang_keluar` (
  `id_keranjang` int(11) NOT NULL,
  `kd_transaksi` char(15) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `kd_barang` char(9) NOT NULL,
  `kd_supplier` char(9) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_masuk`
--

CREATE TABLE `keranjang_masuk` (
  `id_keranjang` int(11) NOT NULL,
  `kd_transaksi` char(15) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `kd_barang` char(9) NOT NULL,
  `kd_supplier` char(9) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `kd_transaksi` char(15) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_user` int(2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`kd_transaksi`, `tanggal_keluar`, `sub_total`, `created_user`, `created_date`) VALUES
('TK-2022-0000001', '2022-12-27', 46000, 0, '2022-12-27 06:13:25'),
('TK-2022-0000002', '2022-12-27', 70000, 0, '2022-12-27 12:45:41'),
('TK-2022-0000003', '2022-12-27', 110000, 0, '2022-12-27 12:46:18'),
('TK-2022-0000004', '2022-12-27', 50000, 0, '2022-12-27 12:46:34'),
('TK-2022-0000005', '2022-12-27', 420000, 0, '2022-12-27 12:46:58'),
('TK-2022-0000006', '2022-12-27', 330000, 0, '2022-12-27 12:47:25'),
('TK-2022-0000007', '2022-12-27', 80000, 0, '2022-12-27 12:47:53'),
('TK-2022-0000008', '2022-12-27', 525000, 0, '2022-12-27 12:48:19'),
('TK-2022-0000009', '2022-12-27', 25000, 0, '2022-12-27 12:52:09'),
('TK-2022-0000010', '2022-12-27', 175000, 0, '2022-12-27 12:52:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `kd_transaksi` char(15) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_user` int(2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`kd_transaksi`, `tanggal_masuk`, `sub_total`, `created_user`, `created_date`) VALUES
('TM-2022-0000001', '2022-12-27', 200000, 0, '2022-12-27 06:12:43'),
('TM-2022-0000002', '2022-12-27', 21850, 0, '2022-12-27 09:20:46'),
('TM-2022-0000003', '2022-12-27', 230000, 0, '2022-12-27 12:05:15'),
('TM-2022-0000004', '2022-12-27', 2040000, 0, '2022-12-27 12:06:38'),
('TM-2022-0000005', '2022-12-27', 800000, 0, '2022-12-27 12:12:08'),
('TM-2022-0000006', '2022-12-27', 125000, 0, '2022-12-27 12:12:38'),
('TM-2022-0000007', '2022-12-27', 280000, 0, '2022-12-27 12:13:17'),
('TM-2022-0000008', '2022-12-27', 280000, 0, '2022-12-27 12:40:12'),
('TM-2022-0000009', '2022-12-27', 1216000, 0, '2022-12-27 12:40:43'),
('TM-2022-0000010', '2022-12-27', 690000, 0, '2022-12-27 12:41:09'),
('TM-2022-0000011', '2022-12-27', 525000, 0, '2022-12-27 12:41:50'),
('TM-2022-0000012', '2022-12-27', 150000, 0, '2022-12-27 12:42:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kd_barang` char(9) NOT NULL DEFAULT '',
  `kd_supplier` char(9) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(5) NOT NULL,
  `created_user` int(2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` int(2) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kd_barang`, `kd_supplier`, `nama_barang`, `harga_beli`, `harga_jual`, `stok`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
('PRD000001', 'SUP000001', 'BEAUTY CASE BIRU', 21850, 20000, 1, 4, '2022-12-26 20:19:37', 4, '2022-12-27 09:20:46'),
('PRD000002', 'SUP000002', 'BEAUTY CASE UNGU', 21850, 23000, 0, 4, '2022-12-26 20:23:20', 4, '2022-12-26 20:23:40'),
('PRD000003', 'SUP000002', 'DOMPET WANITA IMITASI COKLAT', 0, 0, 0, 4, '2022-12-26 20:27:20', 4, '2022-12-26 20:27:20'),
('PRD000004', 'SUP000002', 'DOMPET WANITA IMITASI BIRU', 0, 0, 0, 4, '2022-12-26 20:27:35', 4, '2022-12-26 20:27:35'),
('PRD000005', 'SUP000002', 'TAS KERJA COKLAT', 0, 0, 0, 4, '2022-12-26 20:27:56', 4, '2022-12-26 20:27:56'),
('PRD000006', 'SUP000002', 'TAS KERJA HITAM', 0, 0, 0, 4, '2022-12-26 20:28:09', 4, '2022-12-26 20:28:09'),
('PRD000007', 'SUP000002', 'TAS SEKOLAH BIRU', 0, 0, 0, 4, '2022-12-26 20:29:02', 4, '2022-12-26 20:29:02'),
('PRD000008', 'SUP000002', 'TAS SEKOLAH HITAM', 0, 0, 0, 4, '2022-12-26 20:29:18', 4, '2022-12-26 20:29:18'),
('PRD000009', 'SUP000002', 'TAS WANITA PINK', 0, 0, 0, 4, '2022-12-26 20:29:35', 4, '2022-12-26 20:29:35'),
('PRD000010', 'SUP000002', 'TAS WANITA HITAM', 0, 0, 0, 4, '2022-12-26 20:29:45', 4, '2022-12-26 20:29:45'),
('PRD000011', 'SUP000002', 'TAS WANITA COKLAT', 0, 0, 0, 4, '2022-12-26 20:30:12', 4, '2022-12-26 20:30:12'),
('PRD000012', 'SUP000003', 'DOMPET PESTA PINK', 0, 0, 0, 4, '2022-12-26 20:30:44', 4, '2022-12-26 20:30:44'),
('PRD000013', 'SUP000003', 'DOMPET PESTA MERAH', 0, 0, 0, 4, '2022-12-26 20:31:03', 4, '2022-12-26 20:31:03'),
('PRD000014', 'SUP000004', 'SANDAL GADIS ABU', 0, 0, 0, 4, '2022-12-26 20:32:21', 4, '2022-12-26 20:32:21'),
('PRD000015', 'SUP000004', 'SANDAL GADIS COKLAT', 0, 0, 0, 4, '2022-12-26 20:32:36', 4, '2022-12-26 20:32:36'),
('PRD000016', 'SUP000004', 'SANDAL GADIS CREAM', 0, 0, 0, 4, '2022-12-26 20:32:55', 4, '2022-12-26 20:32:55'),
('PRD000017', 'SUP000004', 'SANDAL GADIS HITAM', 0, 0, 0, 4, '2022-12-26 20:33:16', 4, '2022-12-26 20:33:16'),
('PRD000018', 'SUP000004', 'SANDAL GADIS KUNING', 0, 0, 0, 4, '2022-12-26 20:33:44', 4, '2022-12-26 20:33:44'),
('PRD000019', 'SUP000004', 'SANDAL GADIS UNGU', 0, 0, 0, 4, '2022-12-26 20:34:05', 4, '2022-12-26 20:34:05'),
('PRD000020', 'SUP000004', 'SANDAL GADIS HIJAU', 0, 0, 0, 4, '2022-12-26 20:34:33', 4, '2022-12-26 20:34:33'),
('PRD000021', 'SUP000004', 'SANDAL GADIS MERAH', 0, 0, 0, 4, '2022-12-26 20:34:55', 4, '2022-12-26 20:34:55'),
('PRD000022', 'SUP000005', 'DOMPET WANITA IMITASI PINK', 0, 0, 0, 4, '2022-12-26 20:35:13', 4, '2022-12-26 20:35:13'),
('PRD000023', 'SUP000005', 'DOMPET PESTA MERAH', 0, 0, 0, 4, '2022-12-26 20:35:25', 4, '2022-12-26 20:35:25'),
('PRD000024', 'SUP000005', 'DOMPET PESTA GOLD', 0, 0, 0, 4, '2022-12-26 20:35:35', 4, '2022-12-26 20:35:35'),
('PRD000025', 'SUP000005', 'DOMPET PESTA PINK', 0, 0, 0, 4, '2022-12-26 20:35:54', 4, '2022-12-26 20:35:54'),
('PRD000026', 'SUP000005', 'IKAT PINGGANG HITAM', 0, 0, 0, 4, '2022-12-26 20:36:16', 4, '2022-12-26 20:36:16'),
('PRD000027', 'SUP000005', 'SANDAL GADIS UNGU', 0, 0, 0, 4, '2022-12-26 20:36:38', 4, '2022-12-26 20:36:38'),
('PRD000028', 'SUP000005', 'TAS SEKOLAH PINK', 0, 0, 0, 4, '2022-12-26 20:36:52', 4, '2022-12-26 20:36:52'),
('PRD000029', 'SUP000005', 'TAS SEKOLAH HITAM', 0, 0, 0, 4, '2022-12-26 20:37:05', 4, '2022-12-26 20:37:05'),
('PRD000030', 'SUP000006', 'DOMPET PESTA MERAH', 0, 0, 0, 4, '2022-12-26 20:37:43', 4, '2022-12-26 20:37:43'),
('PRD000031', 'SUP000006', 'SANDAL GADIS KUNING', 0, 0, 0, 4, '2022-12-26 20:38:11', 4, '2022-12-26 20:38:11'),
('PRD000032', 'SUP000007', 'DOMPET LAKI IMITASI COKLAT', 0, 0, 0, 4, '2022-12-26 20:38:27', 4, '2022-12-26 20:38:27'),
('PRD000033', 'SUP000007', 'DOMPET LAKI IMITASI HITAM', 0, 0, 0, 4, '2022-12-26 20:38:50', 4, '2022-12-26 20:38:50'),
('PRD000034', 'SUP000007', 'TAS PINGGANG COKLAT', 0, 0, 0, 4, '2022-12-26 20:39:12', 4, '2022-12-26 20:39:12'),
('PRD000035', 'SUP000007', 'TAS PINGGANG ABU', 0, 0, 0, 4, '2022-12-26 20:39:35', 4, '2022-12-26 20:39:35'),
('PRD000036', 'SUP000007', 'TAS KERJA HITAM', 0, 0, 0, 4, '2022-12-26 20:40:01', 4, '2022-12-26 20:40:01'),
('PRD000037', 'SUP000007', 'TAS PAKAIAN HITAM', 0, 0, 0, 4, '2022-12-26 20:40:26', 4, '2022-12-26 20:40:26'),
('PRD000038', 'SUP000007', 'TAS TROLLY BIRU', 0, 0, 0, 4, '2022-12-26 20:40:46', 4, '2022-12-26 20:40:46'),
('PRD000039', 'SUP000007', 'TAS TROLLY HITAM', 0, 0, 0, 4, '2022-12-26 20:41:00', 4, '2022-12-26 20:41:00'),
('PRD000040', 'SUP000007', 'TAS TROLLY COKLAT', 0, 0, 0, 4, '2022-12-26 20:41:20', 4, '2022-12-26 20:41:20'),
('PRD000041', 'SUP000007', 'TAS TROLLY PINK', 0, 0, 0, 4, '2022-12-26 20:41:47', 4, '2022-12-26 20:41:47'),
('PRD000042', 'SUP000008', 'TAS SEKOLAH PINK', 0, 0, 0, 4, '2022-12-26 20:42:13', 4, '2022-12-26 20:42:13'),
('PRD000043', 'SUP000009', 'DOMPET WANITA IMITASI BIRU', 0, 0, 0, 4, '2022-12-26 20:42:29', 4, '2022-12-26 20:42:29'),
('PRD000044', 'SUP000009', 'DOMPET WANITA IMITASI PINK', 0, 0, 0, 4, '2022-12-26 20:42:44', 4, '2022-12-26 20:42:44'),
('PRD000045', 'SUP000009', 'DOMPET WANITA IMITASI HITAM', 0, 0, 0, 4, '2022-12-26 20:42:59', 4, '2022-12-26 20:42:59'),
('PRD000046', 'SUP000009', 'DOMPET WANITA IMITASI ABU', 0, 0, 0, 4, '2022-12-26 20:43:14', 4, '2022-12-26 20:43:14'),
('PRD000047', 'SUP000009', 'DOMPET WANITA IMITASI COKLAT', 0, 0, 0, 4, '2022-12-26 20:43:41', 4, '2022-12-26 20:43:41'),
('PRD000048', 'SUP000009', 'DOMPET KARTU HITAM', 0, 0, 0, 4, '2022-12-26 20:43:54', 4, '2022-12-26 20:43:54'),
('PRD000049', 'SUP000009', 'DOMPET KARTU BIRU', 0, 0, 0, 4, '2022-12-26 20:44:07', 4, '2022-12-26 20:44:07'),
('PRD000050', 'SUP000009', 'DOMPET KARTU COKLAT', 0, 0, 0, 4, '2022-12-26 20:44:22', 4, '2022-12-26 20:44:22'),
('PRD000051', 'SUP000009', 'GANTUNGAN KUNCI UNGU', 0, 0, 0, 4, '2022-12-26 20:45:22', 4, '2022-12-26 20:45:22'),
('PRD000052', 'SUP000009', 'GANTUNGAN KUNCI HIJAU', 0, 0, 0, 4, '2022-12-26 20:45:36', 4, '2022-12-26 20:45:36'),
('PRD000053', 'SUP000009', 'GANTUNGAN KUNCI COKLAT', 0, 0, 0, 4, '2022-12-26 20:45:52', 4, '2022-12-26 20:45:52'),
('PRD000054', 'SUP000010', 'DOMPET WANITA IMITASI  MERAH', 0, 0, 0, 4, '2022-12-26 20:47:42', 4, '2022-12-26 20:47:42'),
('PRD000055', 'SUP000011', 'TAS WANITA PINK', 0, 0, 0, 4, '2022-12-26 20:48:06', 4, '2022-12-26 20:48:06'),
('PRD000056', 'SUP000012', 'BEAUTY CASE PUTIH', 0, 0, 0, 4, '2022-12-26 20:48:51', 4, '2022-12-26 20:48:51'),
('PRD000057', 'SUP000012', 'BEAUTY CASE HITAM', 0, 0, 0, 4, '2022-12-26 20:49:11', 4, '2022-12-26 20:49:11'),
('PRD000058', 'SUP000012', 'DOMPET KARTU BIRU', 0, 0, 0, 4, '2022-12-26 20:49:28', 4, '2022-12-26 20:49:28'),
('PRD000059', 'SUP000012', 'DOMPET LAKI IMITASI COKLAT TUA', 0, 0, 0, 4, '2022-12-26 20:49:57', 4, '2022-12-26 20:49:57'),
('PRD000060', 'SUP000012', 'DOMPET LAKI IMITASI HITAM', 0, 0, 0, 4, '2022-12-26 20:50:12', 4, '2022-12-26 20:50:12'),
('PRD000061', 'SUP000012', 'DOMPET WANITA IMITASI HITAM', 0, 0, 0, 4, '2022-12-26 20:50:32', 4, '2022-12-26 20:50:32'),
('PRD000062', 'SUP000012', 'DOMPET WANITA IMITASI MERAH', 0, 0, 0, 4, '2022-12-26 20:50:57', 4, '2022-12-26 20:50:57'),
('PRD000063', 'SUP000012', 'GANTUNGAN KUNCI COKLAT', 0, 0, 0, 4, '2022-12-26 20:52:01', 4, '2022-12-26 20:52:01'),
('PRD000064', 'SUP000012', 'GANTUNGAN KUNCI KUNING', 0, 0, 0, 4, '2022-12-26 20:52:57', 4, '2022-12-26 20:52:57'),
('PRD000065', 'SUP000012', 'IKAT PINGGANG HITAM', 0, 0, 0, 4, '2022-12-26 20:53:12', 4, '2022-12-26 20:53:12'),
('PRD000066', 'SUP000012', 'IKAT PINGGANG COKLAT', 0, 0, 0, 4, '2022-12-26 20:53:31', 4, '2022-12-26 20:53:31'),
('PRD000067', 'SUP000013', 'DOMPET LAKI IMITASI HITAM', 0, 0, 0, 4, '2022-12-26 20:54:13', 4, '2022-12-26 20:54:13'),
('PRD000068', 'SUP000013', 'IKAT PINGGANG COKLAT', 0, 0, 0, 4, '2022-12-26 20:54:31', 4, '2022-12-26 20:54:31'),
('PRD000069', 'SUP000013', 'IKAT PINGGANG HIJAU', 0, 0, 0, 4, '2022-12-26 20:54:46', 4, '2022-12-26 20:54:46'),
('PRD000070', 'SUP000013', 'IKAT PINGGANG BIRU', 0, 0, 0, 4, '2022-12-26 20:55:07', 4, '2022-12-26 20:55:07'),
('PRD000071', 'SUP000013', 'IKAT PINGGANG HITAM', 0, 0, 0, 4, '2022-12-26 20:55:54', 4, '2022-12-26 20:55:54'),
('PRD000072', 'SUP000014', 'DOMPET WANITA IMITASI  HITAM', 0, 0, 0, 4, '2022-12-26 20:56:49', 4, '2022-12-26 20:56:49'),
('PRD000073', 'SUP000014', 'DOMPET WANITA BIRU', 0, 0, 0, 4, '2022-12-26 20:57:16', 4, '2022-12-26 20:57:16'),
('PRD000074', 'SUP000014', 'DOMPET WANITA IMITASI COKLAT', 0, 0, 0, 4, '2022-12-26 20:57:32', 4, '2022-12-26 20:57:32'),
('PRD000075', 'SUP000014', 'TEMPAT HP COKLAT', 0, 0, 0, 4, '2022-12-26 20:57:49', 4, '2022-12-26 20:57:49'),
('PRD000076', 'SUP000014', 'TEMPAT HP UNGU', 0, 0, 0, 4, '2022-12-26 20:58:07', 4, '2022-12-26 20:58:07'),
('PRD000077', 'SUP000014', 'DOMPET LAKI IMITASI HITAM', 0, 0, 0, 4, '2022-12-26 20:58:27', 4, '2022-12-26 20:58:27'),
('PRD000078', 'SUP000014', 'DOMPET LAKI IMITASI COKLAT', 0, 0, 0, 4, '2022-12-26 20:59:09', 4, '2022-12-26 20:59:09'),
('PRD000079', 'SUP000014', 'DOMPET WANITA IMITAS HIJAU', 0, 0, 0, 4, '2022-12-26 21:00:06', 4, '2022-12-26 21:00:06'),
('PRD000080', 'SUP000014', 'IKAT PINGGANG HITAM', 0, 0, 0, 4, '2022-12-26 21:00:52', 4, '2022-12-26 21:00:52'),
('PRD000081', 'SUP000014', 'SANDAL GADIS COKLAT', 0, 0, 0, 4, '2022-12-26 21:01:41', 4, '2022-12-26 21:01:41'),
('PRD000082', 'SUP000014', 'SANDAL GADIS MERAH', 0, 0, 0, 4, '2022-12-26 21:02:10', 4, '2022-12-26 21:02:10'),
('PRD000083', 'SUP000014', 'TAS KERJA ABU', 0, 0, 0, 4, '2022-12-26 21:03:05', 4, '2022-12-26 21:03:05'),
('PRD000084', 'SUP000015', 'TAS WANITA MERAH', 32000, 35000, 0, 4, '2022-12-26 21:03:32', 4, '2022-12-27 10:12:10'),
('PRD000085', 'SUP000016', 'BEAUTY CASE UNGU',  30000, 33000, 0, 4, '2022-12-26 21:03:48', 4, '2022-12-27 10:11:38'),
('PRD000086', 'SUP000016', 'BEAUTY CASE BIRU',  30000, 35000, 3, 4, '2022-12-26 21:04:09', 4, '2022-12-27 12:45:41'),
('PRD000087', 'SUP000017', 'DOMPET WANITA IMITASI HITAM', 35000, 40000, 13, 4, '2022-12-26 21:04:34', 4, '2022-12-27 12:47:53'),
('PRD000088', 'SUP000017', 'DOMPET PESTA GOLD', 23000, 25000, 30, 4, '2022-12-26 21:04:49', 4, '2022-12-27 12:41:09'),
('PRD000089', 'SUP000017', 'TAS SEKOLAH PINK', 32000, 35000, 18, 4, '2022-12-26 21:05:17', 4, '2022-12-27 12:52:27'),
('PRD000090', 'SUP000017', 'TAS WANITA BIRU', 28000, 30000, 9, 4, '2022-12-26 21:05:37', 4, '2022-12-27 12:47:25'),
('PRD000091', 'SUP000018', 'BEAUTY CASE HIJAU',  25000, 30000, 5, 4, '2022-12-26 21:06:02', 4, '2022-12-27 12:12:38'),
('PRD000092', 'SUP000018', 'DOMPET PESTA MERAH', 50000, 55000, 14, 4, '2022-12-26 21:06:17', 4, '2022-12-27 12:46:18'),
('PRD000093', 'SUP000018', 'DOMPET PESTA PINK', 136000, 140000, 12, 4, '2022-12-26 21:06:30', 4, '2022-12-27 12:46:58'),
('PRD000094', 'SUP000018', 'TAS WANITA MERAH DARAH', 23000, 25000, 7, 4, '2022-12-26 21:06:54', 4, '2022-12-27 12:52:09'),
('PRD000095', 'SUP000018', 'TAS WANITA COKLAT', 20000, 23000, 8, 4, '2022-12-26 21:07:09', 4, '2022-12-27 06:13:25');

-- --------------------------------------------------------


--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kd_supplier` char(9) NOT NULL DEFAULT '',
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(50) NOT NULL,
  `no_hp` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`kd_supplier`, `nama_supplier`, `alamat_supplier`, `no_hp`) VALUES
('SUP000001', 'Aris', '', ''),
('SUP000002', 'Basor', '', ''),
('SUP000003', 'Choiron', '', ''),
('SUP000004', 'Fikri', '', ''),
('SUP000005', 'Hanim', '', ''),
('SUP000006', 'Huda', '', ''),
('SUP000007', 'Ismail Syarief', '', ''),
('SUP000008', 'Joyo', '', ''),
('SUP000009', 'Karomah', '', ''),
('SUP000010', 'Minarsih', '', ''),
('SUP000011', 'Nur Afifa', '', ''),
('SUP000012', 'Nurul Anita', '', ''),
('SUP000013', 'Orizaki', '', ''),
('SUP000014', 'Rodhi', '', ''),
('SUP000015', 'Sunaiyah', '', ''),
('SUP000016', 'Udin', '', ''),
('SUP000017', 'Zakki Nurudin', '', ''),
('SUP000018', 'Zubaidatul', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `telepon` char(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('operasional','administrator','','') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_user`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(3, 'administrator', '69b731ea8f289cf16a192ce78a37b4f0', 'MFatih', '085865524558', 'user-ikon.png', 'administrator', 'aktif', '2019-03-24 03:27:25', '2022-12-27 13:01:28'),
(4, 'Operator', '21232f297a57a5a743894a0e4a801fc3', 'Operator', '08531420000', 'user-ikon.png', 'operasional', 'aktif', '2019-03-24 03:27:25', '2022-12-27 06:27:51'),
(5, 'pemilik', '58399557dae3c60e23c78606771dfa3d', 'pemilik', '08191290920', 'user-ikon.png', 'administrator', 'aktif', '2019-04-05 02:07:56', '2022-12-27 13:01:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kd_supplier`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
