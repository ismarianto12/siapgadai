-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 13, 2024 at 09:22 PM
-- Server version: 10.6.16-MariaDB-cll-lve
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u6061289_siapgadai`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(14) NOT NULL,
  `kategori_barang_id` int(14) DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `no_imei` varchar(20) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `keluaran` varchar(140) DEFAULT NULL,
  `Kelengkapan` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `user_id` int(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kategori_barang_id`, `kode`, `nama_barang`, `no_imei`, `merk`, `type`, `keluaran`, `Kelengkapan`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 1, 'HP', 'HANDPHONE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 1, 'DRONE', 'DRONE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 1, 'TV', 'TV', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 1, 'SMARTWATCH', 'SMARTWATCH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id` int(14) NOT NULL,
  `nama_cabang` varchar(123) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `alamat_cabang` varchar(40) DEFAULT NULL,
  `jam_buka` varchar(23) DEFAULT NULL,
  `jam_tutup` varchar(23) DEFAULT NULL,
  `spv_cabang` varchar(14) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `user_id` int(14) DEFAULT NULL,
  `kode_cabang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id`, `nama_cabang`, `no_telp`, `alamat_cabang`, `jam_buka`, `jam_tutup`, `spv_cabang`, `created_at`, `updated_at`, `user_id`, `kode_cabang`) VALUES
(1, 'GUDANG SIAP GADAI', NULL, 'GUDANG SGI DIAMOND GOLDEN', NULL, NULL, '1', '2024-01-26', '2024-02-02', 1, 'GUDANG'),
(2, 'Outlet Tanah Baru', NULL, 'Tanah Baru Depok', '2024-01-30', '2046-12-29', NULL, '2024-01-30', '2024-01-30', 1, '02'),
(3, 'Outlet Krukut', NULL, 'Jl Raya Kalikrukut', NULL, NULL, NULL, '2024-01-30', '2024-01-30', 1, '01');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id` int(11) NOT NULL,
  `kode_kategori` varchar(50) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id`, `kode_kategori`, `nama_kategori`, `user_id`) VALUES
(1, '01', 'Elektronik', 1),
(2, '02', 'Kendaraan', 1),
(3, '03', 'Emas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id` int(14) NOT NULL,
  `no_anggota` varchar(100) DEFAULT NULL,
  `foto_ktp` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `nik` varchar(15) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `foto` varchar(40) NOT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `tttl` varchar(14) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `rt_rw` varchar(20) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kab_kota` varchar(50) DEFAULT NULL,
  `cabang_id` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id`, `no_anggota`, `foto_ktp`, `no_hp`, `nik`, `nama`, `foto`, `jk`, `tttl`, `alamat`, `rt_rw`, `kelurahan`, `kecamatan`, `kab_kota`, `cabang_id`) VALUES
(10, '13123', '', '0718381', '1231132', 'RAHMED TTS', '', 'L', NULL, 'adsadad', '01/123', 'adada', '123123', 'Padang', 1),
(11, 'NBCN', '', '123', 'adsad', 'adad', '', 'L', NULL, 'Jl Proklamator', '13', '123', '123', '123', 1),
(12, '131', '', '1032131', '131231', 'RAHMAD', '', 'L', NULL, '13123131', '12/12', 'PANDAI SIKAT', 'SIAK', 'jaakarta', 1),
(13, 'MNC', '', '1312', '1313', '13', '', 'L', NULL, '131', '123', '1313', '13', '1312', 1),
(14, '13', '', '13', '13', '13', '', 'P', NULL, 'Jl Melia Sehat sejahtera', '13', '1313', '131', '13', 1),
(15, '13', '', '+6285159736600', '131', 'MASCOTA OBAROUCHIC', '', 'L', NULL, 'CAIRO , MESIR', '13', '131', '13', '13', 1),
(16, '012012', '', '0971239183', '1313', 'Rahmed', '', 'L', NULL, 'Testing alamat', '01/02', 'Kelurahan Padang', 'Padang Sarai', '123131', 1),
(19, '0101', '', '086817161387', '12345678901', 'Rahmed Ababil Sy', '', 'L', NULL, 'Jl . gelong baru utara no .12 Jakarta Barat', '01/12', 'Grogol Petamburan', 'Grogol', 'Tanjung Duren', 1),
(20, 'O1-01', '285-24-01-30.jpg', '086780881708', '317404210199100', 'FIRLY', '', 'L', NULL, 'WISMA YAKYF 99', '03/04', 'Pejaten', 'Pasar Minggu', 'Jakarta Selatan', 1),
(21, '01', '205-24-01-30.jpg', '085780881708', '317404310198100', 'Alex', '', 'L', NULL, 'Wisma Yakyf No. 99', '03/04', 'Pejaten', 'Pasar Minggu', 'Jakarta Selatan', 1),
(22, 'MNC123', '250-24-01-31.png', '1313123', '1313131', 'rian', '', 'L', NULL, '13131', '1313', '13131', '1313', '13123', 1),
(23, 'A12B41', '273-24-01-31.png', '123131', '123123123213', 'Kim jong un', '', 'L', NULL, 'Jl.Transpile Undercover', '01/02', 'Korea Selatan', 'adas', '13213', 1),
(24, '8103910', '148-24-01-31.png', '009123781321', '123193013901', 'Sin Tae YOUNG', '', 'L', NULL, 'Jalan Perintis', '01/02', 'Pejaten Barang No.12 A, Jakarta Selatan', 'Jakarta Selatan', 'Jakarta Selatan', 2),
(25, '1', '325-24-02-01.pdf', '1', '317404010224100', 'SAMUEL CHRISTOPER', '', 'L', NULL, 'JL.KEMENYAN GG.KUNTI', '01/02', 'MAMPANG', 'KRUKUT', 'DEPOK', 2),
(26, '0978131', '309-24-02-02.png', '080123139012', '12413131', 'Nasabah', '', 'L', NULL, 'krukut', '01/02', 'Krukut', 'Krukut', 'Krukut', 3),
(27, '1231413', '253-24-02-02.png', '1321', '13213131', 'asdad', '', 'L', NULL, '13123', '132', '1231', '1321', '12313', 3),
(28, '123', '224-24-02-03.png', '1321', '123131', '12313', '', 'L', NULL, 'mldksmskalda', '1321231', '12313', '13213', '132123', 1),
(29, 'SGI0102-003', '248-24-02-05.jpg', '081213912167', '327607431087000', 'ANNISA YASIN', '', 'P', NULL, 'JEMBATTAN SERONG', '004/002', 'CIPAYUNG', 'CIPAYUNG', 'DEPOK', 1),
(30, 'SGI0102-003', '250-24-02-07.jpg', '088975133415', '327604600996000', 'ANITA SEPTIANY', '', 'P', NULL, 'KP. RAWA KALONG', 'RT.005 RW.007', 'GROGOL', 'LIMO', 'DEPOK', 1),
(31, 'SGI-102-002.RACHUL HF', '273-24-02-08.jpg', '085882323522', '320139101180001', 'EDI', '', 'L', NULL, 'kp.inpres.RT003/RW 001 KEL-DES.SADENG KOLOT.KEC.LEUWISADENG', '003/001', 'SADENG KOLOT', 'LEUWISADENG', 'BOGOR', 1),
(32, 'SGI-0102-001', '271-24-02-13.jpg', '089514707421', '327604610191000', 'SITI RAHAYU NINGSIH', '', 'L', NULL, 'JL.MASJID DARUTTAQWA AMBARA.', 'RT002/006', 'KRUKUT', 'LIMO', 'DEPOK', 1),
(33, 'SGI0102-003', '278-24-02-13.jpeg', '081213912167', '327604290393000', 'FAHROJI', '', 'L', NULL, 'RAWA KALONG', '005/010', 'GROGOL', 'LIMO', 'JAKARTA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelunasan`
--

CREATE TABLE `pelunasan` (
  `id` int(14) NOT NULL,
  `transaksi_id` int(14) NOT NULL,
  `perhitungan_biaya_id` int(14) NOT NULL,
  `pokok` varchar(30) NOT NULL,
  `bunga` varchar(30) NOT NULL,
  `bukti_bayar` varchar(30) DEFAULT NULL,
  `dibayarkan` varchar(30) DEFAULT NULL,
  `jasa_titip` int(14) NOT NULL,
  `user_id` int(14) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `id_transaksi` int(14) NOT NULL,
  `id_nasabah` int(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelunasan`
--

INSERT INTO `pelunasan` (`id`, `transaksi_id`, `perhitungan_biaya_id`, `pokok`, `bunga`, `bukti_bayar`, `dibayarkan`, `jasa_titip`, `user_id`, `created_at`, `updated_at`, `id_transaksi`, `id_nasabah`) VALUES
(15, 26, 1, '363125', '0', '207-24-02-05.jpg', NULL, 0, 16, '2024-02-05 00:00:00', '2024-02-05', 0, 29),
(16, 28, 1, '155625', '0', '191-24-02-12.jpg', NULL, 0, 16, '2024-02-12 00:00:00', '2024-02-12', 0, 30);

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id` int(14) NOT NULL,
  `transaksi_id` int(14) NOT NULL,
  `pelunasan_id` int(14) NOT NULL,
  `perhitungan_biaya_id` int(14) NOT NULL,
  `pokok` varchar(30) NOT NULL,
  `bunga` varchar(30) NOT NULL,
  `jasa_titip` int(14) NOT NULL,
  `user_id` int(14) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `id_transaksi` int(14) NOT NULL,
  `id_nasabah` int(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`id`, `transaksi_id`, `pelunasan_id`, `perhitungan_biaya_id`, `pokok`, `bunga`, `jasa_titip`, `user_id`, `created_at`, `updated_at`, `id_transaksi`, `id_nasabah`) VALUES
(11, 26, 15, 1, '363125', '0', 0, 16, '2024-02-05 00:00:00', '2024-02-05', 0, 29),
(12, 28, 16, 1, '155625', '0', 0, 16, '2024-02-12 00:00:00', '2024-02-12', 0, 30);

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan_biaya`
--

CREATE TABLE `perhitungan_biaya` (
  `id` int(14) NOT NULL,
  `kode` varchar(14) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `persentase` decimal(5,2) NOT NULL,
  `user_id` int(14) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_transaksi` int(14) DEFAULT NULL,
  `status_bayar` int(14) DEFAULT NULL,
  `batas_hari` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perhitungan_biaya`
--

INSERT INTO `perhitungan_biaya` (`id`, `kode`, `keterangan`, `persentase`, `user_id`, `created_at`, `updated_at`, `status_transaksi`, `status_bayar`, `batas_hari`) VALUES
(1, 'H1-7', 'Pelunasan 1-7 hari', 2.50, 1, '2024-01-27 08:00:37', '2024-02-12 18:23:24', NULL, NULL, 7),
(2, 'H8-14', 'Pelunasan 8-14 hari', 5.00, 1, '2024-01-27 08:00:42', '2024-02-12 18:23:53', NULL, NULL, 14),
(3, 'H15-21', 'Pelunasan 15-21 hari', 7.50, 1, '2024-01-27 08:00:48', '2024-02-12 18:24:14', NULL, NULL, 21),
(4, 'H22-28', 'Pelunasan22-28hari', 10.00, 1, '2024-01-27 08:00:52', '2024-02-12 18:25:14', NULL, NULL, 28),
(5, 'Perpanjang', 'Perpanjangan sampi 7 Hari dikenakan jasa titip', 10.00, 1, '2024-01-27 08:00:56', '2024-01-30 04:33:44', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmlevel`
--

CREATE TABLE `tmlevel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_kode` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tmlevel`
--

INSERT INTO `tmlevel` (`id`, `level_kode`, `level`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'ADM', 'Administrator', '1', '2021-03-25 08:36:57', '2021-03-25 08:36:57'),
(2, 'OP1', 'Operator', '1', '2021-03-25 11:56:22', '2021-03-25 11:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_gadai`
--

CREATE TABLE `transaksi_gadai` (
  `id` int(14) NOT NULL,
  `kategori_barang_id` int(14) DEFAULT NULL,
  `perhitungan_biaya_id` int(14) NOT NULL,
  `id_nasabah` int(14) DEFAULT NULL,
  `id_barang` int(30) DEFAULT NULL,
  `cabang_id` int(14) DEFAULT NULL,
  `foto_barang` varchar(30) NOT NULL,
  `no_kwitansi` varchar(40) DEFAULT NULL,
  `no_faktur` varchar(40) DEFAULT NULL,
  `no_anggota` varchar(40) DEFAULT NULL,
  `status_transaksi` enum('1','2','3') DEFAULT '1',
  `tanggal_jatuh_tempo` date DEFAULT NULL,
  `maks_pinjaman` varchar(30) DEFAULT NULL,
  `jumlah_pinjaman` varchar(30) DEFAULT NULL,
  `administrasi` decimal(18,2) DEFAULT NULL,
  `jasa_titip` decimal(18,2) DEFAULT NULL,
  `total` decimal(18,2) DEFAULT NULL,
  `menyetujui_nasabah` varchar(255) DEFAULT NULL,
  `menyetujui_staff_sgi` varchar(255) DEFAULT NULL,
  `pelunasan` decimal(18,4) DEFAULT NULL,
  `perpajangan` decimal(18,4) DEFAULT NULL,
  `durasi_pelunasan` decimal(18,4) DEFAULT NULL,
  `keluaran_tahun` varchar(100) DEFAULT NULL,
  `imei` varchar(100) DEFAULT NULL,
  `taksiran_harga` decimal(10,0) NOT NULL,
  `referal_code` varchar(35) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `merek_barang` varchar(20) DEFAULT NULL,
  `no_imei` varchar(20) DEFAULT NULL,
  `tujuan_gadai` text DEFAULT NULL,
  `user_id` int(14) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `persentase_pinjaman` double DEFAULT NULL,
  `kelengkapan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_gadai`
--

INSERT INTO `transaksi_gadai` (`id`, `kategori_barang_id`, `perhitungan_biaya_id`, `id_nasabah`, `id_barang`, `cabang_id`, `foto_barang`, `no_kwitansi`, `no_faktur`, `no_anggota`, `status_transaksi`, `tanggal_jatuh_tempo`, `maks_pinjaman`, `jumlah_pinjaman`, `administrasi`, `jasa_titip`, `total`, `menyetujui_nasabah`, `menyetujui_staff_sgi`, `pelunasan`, `perpajangan`, `durasi_pelunasan`, `keluaran_tahun`, `imei`, `taksiran_harga`, `referal_code`, `type`, `merek_barang`, `no_imei`, `tujuan_gadai`, `user_id`, `created_at`, `updated_at`, `persentase_pinjaman`, `kelengkapan`) VALUES
(26, 1, 1, 29, 1, 1, '206-24-02-05.jpg', 'K.02.00000000001', 'K.02.00000000001', 'SGI0102-003', '3', '2024-02-10', '360000', '350000', 10.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023', NULL, 1200000, NULL, 'Y17s', 'VIVO', '868536078427378', 'KEPERLUAN PRIBADI', 16, '2024-02-05 04:29:29', NULL, 30, 'Full Set'),
(28, 1, 1, 30, 1, 1, '171-24-02-07.jpg', 'K.02.00000000002', 'K.02.00000000002', 'SGI0102-003', '3', '2024-02-14', '150000', '150000', 10.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018', NULL, 500000, NULL, 'REDMI NOTE 6 PRO', 'XIAOMI', '866857048302422', 'KEPERLUAN PRIBADI', 16, '2024-02-07 08:26:09', NULL, 30, 'HP & CHARGER'),
(29, 1, 1, 31, 1, 1, '231-24-02-08.jpg', '01.00000000001', '01', 'SGI-102-002.RACHUL HF', '1', '2024-02-15', '1000000', '990000', 10.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023', NULL, 2000000, '1425', 'HP', 'VIVO Y17S', '861395066710858', 'BUTUH UANG', 16, '2024-02-09 09:01:32', NULL, 50, 'KARDUS+CHARGER ORI+HP'),
(30, 1, 1, 32, 1, 1, '214-24-02-13.jpg', '01.00000000004', '004', 'SGI-0102-001', '1', '2024-03-14', '800000', '800000', 10.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024', NULL, 1600000, '004', 'HP', 'TECNO SPARK 20', '353136650293942', 'BUTUH UANG', 16, '2024-02-13 10:27:01', NULL, 50, 'KARDUS+CHARGER ORI+HP'),
(31, 1, 3, 33, 1, 1, '177-24-02-13.jpeg', 'K.02.00000000003', 'K.02.00000000003', 'SGI0102-003', '1', '2024-02-28', '550000', '550000', 10.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020', NULL, 1100000, NULL, 'HOT 9 PLAY', 'INFINIX', '355808111292782', 'BUTUH UANG', 16, '2024-02-12 13:31:47', NULL, 50, 'FULLSET');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `cabang_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(15) NOT NULL,
  `tmlevel_id` bigint(20) NOT NULL,
  `role` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `statuslogin` varchar(10) DEFAULT NULL,
  `token` text DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_user` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `cabang_id`, `username`, `name`, `password`, `email`, `tmlevel_id`, `role`, `created_at`, `statuslogin`, `token`, `updated_at`, `id_user`) VALUES
(1, 1, 'admin', 'SuperUser', '$2y$10$A0K3rjS5GCkqqpvM8mIEye0oih/v.Auj7cy1lOjQ/zDfkU0htxajq', '', 1, '1', NULL, '1', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3NpYWthZF9zZGl0XC9wdWJsaWNcL2FwaVwvdjFcL2xvZ2luIiwiaWF0IjoxNzAwNDk0MDIzLCJuYmYiOjE3MDA0OTQwMjMsImp0aSI6IjNWWXRwcE11RFp2YVY2NHciLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.pUN_ziub1GgOq-vkVy9_LXJIkRQzqDfQE8XgehPUE6E', '2024-02-02 07:48:46', NULL),
(16, 1, 'operator', 'operator Cabang', '$2y$10$OTWajbRDQg3kJAGidntrYO4.klon.Y6tNHvFxduCZrcgm0auP6dT2', 'opeator@gmail.c', 2, NULL, '2024-01-30 07:12:06', NULL, NULL, '2024-01-30 07:12:06', NULL),
(18, 2, 'operator2', 'Outle Tanah Baru', '$2y$10$A0K3rjS5GCkqqpvM8mIEye0oih/v.Auj7cy1lOjQ/zDfkU0htxajq', 'depo@siapgadai.', 2, NULL, '2024-01-31 15:44:50', NULL, NULL, '2024-01-31 15:44:50', NULL),
(19, 3, 'operator1', 'Operator', '$2y$10$KotkoC6.zv6OOCWGgq3IJOVLicYw1RGlxIECTbPH94e8aOBAfHNMe', 'operator@bisaga', 2, NULL, '2024-02-02 07:48:26', NULL, NULL, '2024-02-02 07:48:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelunasan`
--
ALTER TABLE `pelunasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perhitungan_biaya`
--
ALTER TABLE `perhitungan_biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmlevel`
--
ALTER TABLE `tmlevel`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `transaksi_gadai`
--
ALTER TABLE `transaksi_gadai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pelunasan`
--
ALTER TABLE `pelunasan`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tmlevel`
--
ALTER TABLE `tmlevel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_gadai`
--
ALTER TABLE `transaksi_gadai`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
