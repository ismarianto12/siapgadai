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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES (1,1,'HP','HANDPHONE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,NULL,'DRONE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,NULL,NULL,'TV',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,NULL,'SMARTWATCH',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cabang`
--

LOCK TABLES `cabang` WRITE;
/*!40000 ALTER TABLE `cabang` DISABLE KEYS */;
INSERT INTO `cabang` VALUES (1,'Mampang Prapatan','0801239','Mampang Prapatan','08.00','08.00','1','2024-01-26','2024-01-27',1,NULL);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nasabah`
--

LOCK TABLES `nasabah` WRITE;
/*!40000 ALTER TABLE `nasabah` DISABLE KEYS */;
INSERT INTO `nasabah` VALUES (10,'13123','0718381','1231132','RAHMED TTS','','L',NULL,'adsadad','01/123','adada','123123','Padang'),(11,'NBCN','123','adsad','adad','','L',NULL,'1231','13','123','123','123'),(12,'131','1032131','131231','RAHMAD','','L',NULL,'13123131','12/12','PANDAI SIKAT','SIAK','jaakarta'),(13,'MNC','1312','1313','13','','L',NULL,'131','123','1313','13','1312'),(14,'13','13','13','13','','P',NULL,'1313','13','1313','131','13'),(15,'13','13','131','MASCOTA OBAROUCHIC','','L',NULL,'CAIRO , MESIR','13','131','13','13');
/*!40000 ALTER TABLE `nasabah` ENABLE KEYS */;
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
  `id_nasabah` int(14) DEFAULT NULL,
  `id_barang` int(30) DEFAULT NULL,
  `cabang_id` int(14) DEFAULT NULL,
  `foto_barang` varchar(30) NOT NULL,
  `no_kwitansi` varchar(40) DEFAULT NULL,
  `no_faktur` varchar(40) DEFAULT NULL,
  `no_anggota` varchar(40) DEFAULT NULL,
  `tujuan` varchar(100) NOT NULL,
  `tanggal_jatuh_tempo` date DEFAULT NULL,
  `maks_pinjaman` decimal(18,2) DEFAULT NULL,
  `jumlah_pinjaman` decimal(18,2) DEFAULT NULL,
  `administrasi` decimal(18,2) DEFAULT NULL,
  `jasa_titip` decimal(18,2) DEFAULT NULL,
  `total` decimal(18,2) DEFAULT NULL,
  `menyetujui_nasabah` varchar(255) DEFAULT NULL,
  `menyetujui_staff_sgi` varchar(255) DEFAULT NULL,
  `pelunasan` decimal(18,4) DEFAULT NULL,
  `perpajangan` decimal(18,4) DEFAULT NULL,
  `durasi_pelunasan` decimal(18,4) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `keluaran_tahun` varchar(100) DEFAULT NULL,
  `imei` varchar(100) DEFAULT NULL,
  `referal_code` varchar(35) DEFAULT NULL,
  `user_id` int(14) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `merek_barang` varchar(20) DEFAULT NULL,
  `no_imei` varchar(20) DEFAULT NULL,
  `kelengkapan` text DEFAULT NULL,
  `tujuan_gadai` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi_gadai`
--

LOCK TABLES `transaksi_gadai` WRITE;
/*!40000 ALTER TABLE `transaksi_gadai` DISABLE KEYS */;
INSERT INTO `transaksi_gadai` VALUES (8,10,1,NULL,'304-24-01-26.jpeg','13123','13131','13123','','2024-01-10',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'131',NULL,'1313',NULL,'2024-01-26 19:20:43','1313','13123','1313','1313',NULL),(9,11,1,0,'190-24-01-26.jpeg','NBCB-123','13','NBCN','','2024-01-19',3000.00,3.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023',NULL,'121',NULL,'2024-01-26 21:15:50','1231','1313','123','1312',NULL),(10,12,1,1,'234-24-01-26.jpeg','NM12','1213','131','','2024-01-18',3500000.00,3.00,12.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2029',NULL,'-',NULL,'2024-01-26 21:23:38','MCN','IPHONE 19','MNC.123','LENGKAP',NULL),(11,13,2,1,'165-24-01-26.jpeg','A12-MN12-2','01','MNC','','2024-01-25',10000.00,10.00,123.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1321',NULL,'1231',NULL,'2024-01-26 21:49:17','13','132','131','131','131231'),(12,14,2,1,'228-24-01-26.jpeg','CBN-013','13','13','','2024-01-24',328278.00,328.00,1.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021',NULL,'132',NULL,'2024-01-26 21:50:41','13','13','231.131.3141.13','1313','Bayar Kosan'),(13,15,1,1,'228-24-01-26.jpeg','12313','132','13','','2023-03-13',10000.00,9.00,13.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13',NULL,'13123',NULL,'2024-01-26 21:52:40','132','131','123','123','131313');
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin',NULL,'$2y$10$VrvLNyjkuIDJX8u8PS5wOOWzw/FlnJDAp6yRJYtKyPW7glPITbdcK','',1,'1',NULL,'1','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3NpYWthZF9zZGl0XC9wdWJsaWNcL2FwaVwvdjFcL2xvZ2luIiwiaWF0IjoxNzAwNDk0MDIzLCJuYmYiOjE3MDA0OTQwMjMsImp0aSI6IjNWWXRwcE11RFp2YVY2NHciLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.pUN_ziub1GgOq-vkVy9_LXJIkRQzqDfQE8XgehPUE6E','2024-01-25 14:17:57',NULL),(3,0,'936205',NULL,'$2y$10$VrvLNyjkuIDJX8u8PS5wOOWzw/FlnJDAp6yRJYtKyPW7glPITbdcK','adsad',2,NULL,NULL,NULL,NULL,NULL,NULL),(4,0,'417803',NULL,'$2y$10$VrvLNyjkuIDJX8u8PS5wOOWzw/FlnJDAp6yRJYtKyPW7glPITbdcK','adsad',2,NULL,NULL,NULL,NULL,NULL,NULL),(5,0,'682149',NULL,'$2y$10$VrvLNyjkuIDJX8u8PS5wOOWzw/FlnJDAp6yRJYtKyPW7glPITbdcK','adsad',2,NULL,NULL,NULL,NULL,NULL,NULL),(6,0,'309572',NULL,'$2y$10$VrvLNyjkuIDJX8u8PS5wOOWzw/FlnJDAp6yRJYtKyPW7glPITbdcK','adsad',2,NULL,NULL,NULL,NULL,NULL,NULL),(7,0,'874036',NULL,'$2y$10$VrvLNyjkuIDJX8u8PS5wOOWzw/FlnJDAp6yRJYtKyPW7glPITbdcK','adsad',2,NULL,NULL,NULL,NULL,NULL,NULL),(8,0,'125498',NULL,'$2y$10$VrvLNyjkuIDJX8u8PS5wOOWzw/FlnJDAp6yRJYtKyPW7glPITbdcK','adsad',2,NULL,NULL,NULL,NULL,NULL,NULL),(9,0,'703816',NULL,'$2y$10$VrvLNyjkuIDJX8u8PS5wOOWzw/FlnJDAp6yRJYtKyPW7glPITbdcK','adsad',2,NULL,NULL,NULL,NULL,NULL,NULL),(10,0,'482573',NULL,'$2y$10$VrvLNyjkuIDJX8u8PS5wOOWzw/FlnJDAp6yRJYtKyPW7glPITbdcK','adsad',2,NULL,NULL,NULL,NULL,NULL,NULL),(11,0,'695317',NULL,'$2y$10$VrvLNyjkuIDJX8u8PS5wOOWzw/FlnJDAp6yRJYtKyPW7glPITbdcK','adsad',2,NULL,NULL,NULL,NULL,NULL,NULL),(12,0,'230948',NULL,'$2y$10$VrvLNyjkuIDJX8u8PS5wOOWzw/FlnJDAp6yRJYtKyPW7glPITbdcK','adsad',2,NULL,NULL,NULL,NULL,NULL,NULL),(13,0,'571034',NULL,'$2y$10$VrvLNyjkuIDJX8u8PS5wOOWzw/FlnJDAp6yRJYtKyPW7glPITbdcK','adsad',2,NULL,NULL,NULL,NULL,NULL,NULL),(14,0,'864192',NULL,'$2y$10$VrvLNyjkuIDJX8u8PS5wOOWzw/FlnJDAp6yRJYtKyPW7glPITbdcK','adsad',2,NULL,NULL,NULL,NULL,NULL,NULL),(15,0,'149287',NULL,'$2y$10$VrvLNyjkuIDJX8u8PS5wOOWzw/FlnJDAp6yRJYtKyPW7glPITbdcK','adsad',2,NULL,NULL,NULL,NULL,NULL,NULL);
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

-- Dump completed on 2024-01-27  4:56:53
