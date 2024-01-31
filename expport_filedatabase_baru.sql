-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: siapgadai
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `id` int(14) NOT NULL AUTO_INCREMENT,
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
  `user_id` int(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES (1,1,'HP','HANDPHONE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,1,'12313asda','DRONEs',NULL,'ad','ad','ad','ada',NULL,NULL,NULL);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cabang`
--

DROP TABLE IF EXISTS `cabang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cabang` (
  `id` int(14) NOT NULL AUTO_INCREMENT,
  `nama_cabang` varchar(123) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `alamat_cabang` varchar(40) DEFAULT NULL,
  `jam_buka` varchar(23) DEFAULT NULL,
  `jam_tutup` varchar(23) DEFAULT NULL,
  `spv_cabang` varchar(14) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `user_id` int(14) DEFAULT NULL,
  `kode_cabang` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cabang`
--

LOCK TABLES `cabang` WRITE;
/*!40000 ALTER TABLE `cabang` DISABLE KEYS */;
INSERT INTO `cabang` VALUES (1,NULL,NULL,'Mampang Prapatanada',NULL,NULL,'1','2024-01-26','2024-01-30',NULL,NULL),(2,'dsadasd',NULL,'ada','2024-01-15','2024-01-26','ada','2024-01-30','2024-01-30',NULL,'dsadasdadsa');
/*!40000 ALTER TABLE `cabang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_barang`
--

DROP TABLE IF EXISTS `kategori_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kategori` varchar(50) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_barang`
--

LOCK TABLES `kategori_barang` WRITE;
/*!40000 ALTER TABLE `kategori_barang` DISABLE KEYS */;
INSERT INTO `kategori_barang` VALUES (1,'01','Elektronik',1),(2,'02','Kendaraan',1);
/*!40000 ALTER TABLE `kategori_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nasabah`
--

DROP TABLE IF EXISTS `nasabah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nasabah` (
  `id` int(14) NOT NULL AUTO_INCREMENT,
  `no_anggota` varchar(100) DEFAULT NULL,
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
  `foto_ktp` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nasabah`
--

LOCK TABLES `nasabah` WRITE;
/*!40000 ALTER TABLE `nasabah` DISABLE KEYS */;
INSERT INTO `nasabah` VALUES (10,'13123','0718381','1231132','RAHMED TTS','','L',NULL,'adsadad','01/123','adada','123123','Padang',NULL),(11,'NBCN','123','adsad','adad','','L',NULL,'1231','13','123','123','123',NULL),(12,'131','1032131','131231','RAHMAD','','L',NULL,'13123131','12/12','PANDAI SIKAT','SIAK','jaakarta',NULL),(13,'MNC','1312','1313','13','','L',NULL,'131','123','1313','13','1312',NULL),(14,'13','13','13','13','','P',NULL,'1313','13','1313','131','13',NULL),(15,'13','13','131','MASCOTA OBAROUCHIC','','L',NULL,'CAIRO , MESIR','13','131','13','13',NULL),(16,'012012','0971239183','1313','Rahmed','','L',NULL,'Testing alamat','01/02','Kelurahan Padang','Padang Sarai','123131',NULL),(19,'0101','086817161387','12345678901','Rahmed Ababil Sy','','L',NULL,'Jl . gelong baru utara no .12 Jakarta Barat','01/12','Grogol Petamburan','Grogol','Tanjung Duren',NULL);
/*!40000 ALTER TABLE `nasabah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelunasan`
--

DROP TABLE IF EXISTS `pelunasan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelunasan` (
  `id` int(14) NOT NULL AUTO_INCREMENT,
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
  `id_nasabah` int(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelunasan`
--

LOCK TABLES `pelunasan` WRITE;
/*!40000 ALTER TABLE `pelunasan` DISABLE KEYS */;
INSERT INTO `pelunasan` VALUES (6,15,0,'23_313','0','293-24-01-28.jpeg',NULL,0,1,'2024-01-28 00:00:00','2024-01-28',0,19),(7,15,0,'1_231_311_131','0','125-24-01-28.jpeg',NULL,0,1,'2024-01-28 00:00:00','2024-01-28',0,19),(8,15,0,'500_000','0','307-24-01-29.jpeg',NULL,0,1,'2024-01-29 00:00:00','2024-01-29',0,19),(9,12,0,'32_827_800','0','239-24-01-29.jpeg',NULL,0,1,'2024-01-29 00:00:00','2024-01-29',0,14),(10,13,0,'100_000','0','252-24-01-29.pdf',NULL,0,1,'2024-01-29 00:00:00','2024-01-29',0,15);
/*!40000 ALTER TABLE `pelunasan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendapatan`
--

DROP TABLE IF EXISTS `pendapatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pendapatan` (
  `id` int(14) NOT NULL AUTO_INCREMENT,
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
  `id_nasabah` int(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendapatan`
--

LOCK TABLES `pendapatan` WRITE;
/*!40000 ALTER TABLE `pendapatan` DISABLE KEYS */;
INSERT INTO `pendapatan` VALUES (2,15,6,0,'23_313','0',0,1,'2024-01-28 00:00:00','2024-01-28',0,19),(3,15,7,0,'1_231_311_131','0',0,1,'2024-01-28 00:00:00','2024-01-28',0,19),(4,15,8,0,'500_000','0',0,1,'2024-01-29 00:00:00','2024-01-29',0,19),(5,12,9,0,'32_827_800','0',0,1,'2024-01-29 00:00:00','2024-01-29',0,14),(6,13,10,0,'100_000','0',0,1,'2024-01-29 00:00:00','2024-01-29',0,15);
/*!40000 ALTER TABLE `pendapatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perhitungan_biaya`
--

DROP TABLE IF EXISTS `perhitungan_biaya`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perhitungan_biaya` (
  `id` int(14) NOT NULL,
  `kode` varchar(14) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `persentase` double NOT NULL,
  `user_id` int(14) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_transaksi` int(14) DEFAULT NULL,
  `status_bayar` int(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perhitungan_biaya`
--

LOCK TABLES `perhitungan_biaya` WRITE;
/*!40000 ALTER TABLE `perhitungan_biaya` DISABLE KEYS */;
INSERT INTO `perhitungan_biaya` VALUES (1,'H1-7','Pelunasan 1-7 hari',3.75,1,'2024-01-27 08:00:37','2024-01-27 08:00:37',NULL,NULL),(2,'H8-14','Pelunasan 1-7 hari',7.5,1,'2024-01-27 08:00:42','2024-01-27 08:00:42',NULL,NULL),(3,'H15-21','Pelunasan 1-7 hari',11.25,1,'2024-01-27 08:00:48','2024-01-27 08:00:48',NULL,NULL),(4,'H22-28','Pelunasan 1-7 hari',15,1,'2024-01-27 08:00:52','2024-01-27 08:00:52',NULL,NULL),(5,'Perpanjang','Perpanjangan',10,1,'2024-01-27 08:00:56','2024-01-27 08:00:56',NULL,NULL);
/*!40000 ALTER TABLE `perhitungan_biaya` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmlevel`
--

DROP TABLE IF EXISTS `tmlevel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmlevel` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `level_kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmlevel`
--

LOCK TABLES `tmlevel` WRITE;
/*!40000 ALTER TABLE `tmlevel` DISABLE KEYS */;
INSERT INTO `tmlevel` VALUES (1,'Aaa','Administrator','1','2021-03-25 08:36:57','2021-03-25 08:36:57'),(2,'OP1','Operator','1','2021-03-25 11:56:22','2021-03-25 11:56:22');
/*!40000 ALTER TABLE `tmlevel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi_gadai`
--

DROP TABLE IF EXISTS `transaksi_gadai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi_gadai` (
  `id` int(14) NOT NULL AUTO_INCREMENT,
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
  `taksiran_harga` double NOT NULL,
  `referal_code` varchar(35) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `merek_barang` varchar(20) DEFAULT NULL,
  `no_imei` varchar(20) DEFAULT NULL,
  `tujuan_gadai` text DEFAULT NULL,
  `user_id` int(14) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `persentase_pinjaman` double DEFAULT NULL,
  `kelengkapan` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi_gadai`
--

LOCK TABLES `transaksi_gadai` WRITE;
/*!40000 ALTER TABLE `transaksi_gadai` DISABLE KEYS */;
INSERT INTO `transaksi_gadai` VALUES (8,1,10,1,NULL,'304-24-01-26.jpeg','13123','13131','13123','1','2024-01-10',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'131',NULL,300000,'1313','RAM 8','IPHONE 16 XS 2019','1313','JAKARTA KEREN',NULL,'2024-01-26 19:20:43',NULL,2.5,'Lengkap semua barang'),(9,1,11,1,0,'190-24-01-26.jpeg','NBCB-123','13','NBCN','1','2024-01-19','3000.00','3.00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023',NULL,300000,'121','RAM 8','IPHONE 16 XS 2019','123','JAKARTA KEREN',NULL,'2024-01-26 21:15:50',NULL,2.5,'Lengkap semua barang'),(10,1,12,1,1,'234-24-01-26.jpeg','NM12','1213','131','1','2024-01-18','3500000.00','3.00',12.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2029',NULL,300000,'-','RAM 8','IPHONE 16 XS 2019','MNC.123','JAKARTA KEREN',NULL,'2024-01-26 21:23:38',NULL,2.5,'Lengkap semua barang'),(11,1,13,2,1,'165-24-01-26.jpeg','A12-MN12-2','01','MNC','1','2024-01-25','10000.00','10.00',123.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1321',NULL,300000,'1231','RAM 8','IPHONE 16 XS 2019','131','JAKARTA KEREN',NULL,'2024-01-26 21:49:17',NULL,2.5,'Lengkap semua barang'),(12,1,14,2,1,'228-24-01-26.jpeg','CBN-013','13','13','3','2024-01-24','328278.00','328.00',1.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021',NULL,300000,'132','RAM 8','IPHONE 16 XS 2019','231.131.3141.13','JAKARTA KEREN',NULL,'2024-01-26 21:50:41',NULL,2.5,'Lengkap semua barang'),(13,1,15,1,1,'228-24-01-26.jpeg','12313','132','13','3','2023-03-13','10000.00','9.00',13.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13',NULL,300000,'13123','RAM 8','IPHONE 16 XS 2019','123','JAKARTA KEREN',NULL,'2024-01-26 21:52:40',NULL,2.5,'Lengkap semua barang'),(14,1,16,1,1,'182-24-01-27.jpeg','AC-12-LNM-123FQC','087213','012012','1','2024-01-28','24000.00','24.00',12.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024',NULL,300000,'AC','RAM 8','IPHONE 16 XS 2019','112.41.1314','JAKARTA KEREN',NULL,'2024-01-27 14:01:55',NULL,2.5,'Lengkap semua barang'),(15,1,19,1,1,'246-24-01-28.jpeg','KWT-01-02-2024','01012-1','0101','3','2024-01-11','500000','500000',2.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022',NULL,2,'REF-01','RAM 8','HP XIAMI A1','812317831.7812313','Modal Buka Bengkel Gigi',NULL,'2024-01-28 08:02:49',NULL,25,'Kotak \r\nCasan\r\nFaktur Pembalian\r\nAsuransi Elektronik');
/*!40000 ALTER TABLE `transaksi_gadai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `id_user` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin',NULL,'$2y$10$VrvLNyjkuIDJX8u8PS5wOOWzw/FlnJDAp6yRJYtKyPW7glPITbdcK','',1,'1',NULL,'1','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3NpYWthZF9zZGl0XC9wdWJsaWNcL2FwaVwvdjFcL2xvZ2luIiwiaWF0IjoxNzAwNDk0MDIzLCJuYmYiOjE3MDA0OTQwMjMsImp0aSI6IjNWWXRwcE11RFp2YVY2NHciLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.pUN_ziub1GgOq-vkVy9_LXJIkRQzqDfQE8XgehPUE6E','2024-01-25 14:17:57',NULL),(16,1,'asd','ad','$2y$10$MGIZyL8rIIfKnQv/SrTtYu45RGotXbNvI5dBzOgi3NlHUKIRuoxcy','ads@asda.com',2,NULL,'2024-01-30 07:10:33',NULL,NULL,'2024-01-30 07:10:33',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-31 16:07:27
