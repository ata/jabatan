-- MySQL dump 10.11
--
-- Host: localhost    Database: jabatan
-- ------------------------------------------------------
-- Server version	5.0.51a-24+lenny2+spu1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `butir_kegiatan`
--

DROP TABLE IF EXISTS `butir_kegiatan`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `butir_kegiatan` (
  `id` bigint(20) NOT NULL auto_increment,
  `nama` varchar(255) default NULL,
  `kegiatan_id` bigint(20) NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_butir_kegiatan_kegiatan1` (`kegiatan_id`),
  KEY `fk_butir_kegiatan_butir_kegiatan1` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `butir_kegiatan`
--

LOCK TABLES `butir_kegiatan` WRITE;
/*!40000 ALTER TABLE `butir_kegiatan` DISABLE KEYS */;
INSERT INTO `butir_kegiatan` VALUES (1,'Doktor (S 3)',1,0);
/*!40000 ALTER TABLE `butir_kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catatan_ketua_penilai`
--

DROP TABLE IF EXISTS `catatan_ketua_penilai`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `catatan_ketua_penilai` (
  `id` bigint(20) NOT NULL auto_increment,
  `deskripsi` varchar(255) default NULL,
  `dupak_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_catatan_ketua_penilai_dupak1` (`dupak_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `catatan_ketua_penilai`
--

LOCK TABLES `catatan_ketua_penilai` WRITE;
/*!40000 ALTER TABLE `catatan_ketua_penilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `catatan_ketua_penilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catatan_pengusul`
--

DROP TABLE IF EXISTS `catatan_pengusul`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `catatan_pengusul` (
  `id` bigint(20) NOT NULL auto_increment,
  `deskripsi` varchar(255) default NULL,
  `dupak_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_catatan_pengusul_dupak1` (`dupak_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `catatan_pengusul`
--

LOCK TABLES `catatan_pengusul` WRITE;
/*!40000 ALTER TABLE `catatan_pengusul` DISABLE KEYS */;
/*!40000 ALTER TABLE `catatan_pengusul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catatan_tim_penilai`
--

DROP TABLE IF EXISTS `catatan_tim_penilai`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `catatan_tim_penilai` (
  `id` bigint(20) NOT NULL auto_increment,
  `deskripsi` varchar(255) default NULL,
  `dupak_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_catatan_tim_penilai_dupak1` (`dupak_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `catatan_tim_penilai`
--

LOCK TABLES `catatan_tim_penilai` WRITE;
/*!40000 ALTER TABLE `catatan_tim_penilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `catatan_tim_penilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dupak`
--

DROP TABLE IF EXISTS `dupak`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `dupak` (
  `id` bigint(20) NOT NULL auto_increment,
  `nomor` varchar(255) default NULL,
  `mp_mulai` date default NULL,
  `mp_selesai` varchar(255) default NULL,
  `kenaikan_jabatan_id` bigint(20) NOT NULL,
  `jenis_dupak_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_dupak_kenaikan_jabatan1` (`kenaikan_jabatan_id`),
  KEY `fk_dupak_jenis_dupak1` (`jenis_dupak_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `dupak`
--

LOCK TABLES `dupak` WRITE;
/*!40000 ALTER TABLE `dupak` DISABLE KEYS */;
/*!40000 ALTER TABLE `dupak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `jabatan` (
  `id` bigint(20) NOT NULL auto_increment,
  `nama` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` VALUES (1,'Kepala negara');
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_dupak`
--

DROP TABLE IF EXISTS `jenis_dupak`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `jenis_dupak` (
  `id` bigint(20) NOT NULL auto_increment,
  `nama` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `jenis_dupak`
--

LOCK TABLES `jenis_dupak` WRITE;
/*!40000 ALTER TABLE `jenis_dupak` DISABLE KEYS */;
INSERT INTO `jenis_dupak` VALUES (1,'Madya'),(2,'Muda'),(3,'Pertama'),(4,'Utama');
/*!40000 ALTER TABLE `jenis_dupak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `karya_ilmiah`
--

DROP TABLE IF EXISTS `karya_ilmiah`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `karya_ilmiah` (
  `id` bigint(20) NOT NULL auto_increment,
  `judul` text,
  `p2jp_instansi` int(11) default NULL,
  `p2jp_lipi` int(11) default NULL,
  `keterangan` text,
  `kti_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_karya_ilmiah_kti1` (`kti_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `karya_ilmiah`
--

LOCK TABLES `karya_ilmiah` WRITE;
/*!40000 ALTER TABLE `karya_ilmiah` DISABLE KEYS */;
/*!40000 ALTER TABLE `karya_ilmiah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kegiatan`
--

DROP TABLE IF EXISTS `kegiatan`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `kegiatan` (
  `id` bigint(20) NOT NULL auto_increment,
  `nama` varchar(255) default NULL,
  `sub_unsur_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_kegiatan_subunsur1` (`sub_unsur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `kegiatan`
--

LOCK TABLES `kegiatan` WRITE;
/*!40000 ALTER TABLE `kegiatan` DISABLE KEYS */;
INSERT INTO `kegiatan` VALUES (1,'Pendidikan sekolah dan memperoleh ijazah/gelar',1);
/*!40000 ALTER TABLE `kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kenaikan_jabatan`
--

DROP TABLE IF EXISTS `kenaikan_jabatan`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `kenaikan_jabatan` (
  `id` bigint(20) NOT NULL auto_increment,
  `pegawai_id` bigint(20) NOT NULL,
  `jabatan_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_kenaikan_jabatan_pegawai` (`pegawai_id`),
  KEY `fk_kenaikan_jabatan_jabatan1` (`jabatan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `kenaikan_jabatan`
--

LOCK TABLES `kenaikan_jabatan` WRITE;
/*!40000 ALTER TABLE `kenaikan_jabatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kenaikan_jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kti`
--

DROP TABLE IF EXISTS `kti`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `kti` (
  `id` bigint(20) NOT NULL auto_increment,
  `nama` varchar(255) default NULL,
  `kenaikan_jabatan_id` bigint(20) NOT NULL,
  `dupak_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_kti_kenaikan_jabatan1` (`kenaikan_jabatan_id`),
  KEY `fk_kti_dupak1` (`dupak_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `kti`
--

LOCK TABLES `kti` WRITE;
/*!40000 ALTER TABLE `kti` DISABLE KEYS */;
/*!40000 ALTER TABLE `kti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lampiran`
--

DROP TABLE IF EXISTS `lampiran`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `lampiran` (
  `id` bigint(20) NOT NULL auto_increment,
  `deskripsi` varchar(255) default NULL,
  `dupak_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_lampiran_dupak1` (`dupak_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `lampiran`
--

LOCK TABLES `lampiran` WRITE;
/*!40000 ALTER TABLE `lampiran` DISABLE KEYS */;
/*!40000 ALTER TABLE `lampiran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nilai`
--

DROP TABLE IF EXISTS `nilai`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `nilai` (
  `id` bigint(20) NOT NULL auto_increment,
  `ip_lama` bigint(20) default NULL,
  `ip_baru` bigint(20) default NULL,
  `ip_jumlah` bigint(20) default NULL,
  `tp_lama` bigint(20) default NULL,
  `tp_baru` bigint(20) default NULL,
  `tp_jumlah` bigint(20) default NULL,
  `butir_kegiatan_id` bigint(20) NOT NULL,
  `dupak_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_nilai_butir_kegiatan1` (`butir_kegiatan_id`),
  KEY `fk_nilai_dupak1` (`dupak_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `nilai`
--

LOCK TABLES `nilai` WRITE;
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pegawai` (
  `id` bigint(20) NOT NULL auto_increment,
  `nip` varchar(255) default NULL,
  `nama` varchar(255) default NULL,
  `nskp` varchar(255) default NULL,
  `tempat_lahir` varchar(255) default NULL,
  `tanggal_lahir` date default NULL,
  `tmt` date default NULL,
  `bidang_kepakaran` varchar(255) default NULL,
  `jabatan_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_pegawai_jabatan1` (`jabatan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES (1,'','Ahmad Tanwir','','','0000-00-00','0000-00-00','',1);
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penilai`
--

DROP TABLE IF EXISTS `penilai`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `penilai` (
  `id` bigint(20) NOT NULL auto_increment,
  `ketua` tinyint(1) default NULL,
  `dupak_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_penilai_dupak1` (`dupak_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `penilai`
--

LOCK TABLES `penilai` WRITE;
/*!40000 ALTER TABLE `penilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `penilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_unsur`
--

DROP TABLE IF EXISTS `sub_unsur`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `sub_unsur` (
  `id` bigint(20) NOT NULL auto_increment,
  `nama` varchar(255) default NULL,
  `unsur_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_subunsur_unsur1` (`unsur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `sub_unsur`
--

LOCK TABLES `sub_unsur` WRITE;
/*!40000 ALTER TABLE `sub_unsur` DISABLE KEYS */;
INSERT INTO `sub_unsur` VALUES (1,'Pendidikan',1);
/*!40000 ALTER TABLE `sub_unsur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unsur`
--

DROP TABLE IF EXISTS `unsur`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `unsur` (
  `id` bigint(20) NOT NULL auto_increment,
  `nama` varchar(255) default NULL,
  `jenis_dupak_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_unsur_jenis_dupak1` (`jenis_dupak_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `unsur`
--

LOCK TABLES `unsur` WRITE;
/*!40000 ALTER TABLE `unsur` DISABLE KEYS */;
INSERT INTO `unsur` VALUES (1,'Unsur Utama',1),(2,'Unsur Utama',2),(3,'Unsur Utama',3),(4,'Unsur Utama',4);
/*!40000 ALTER TABLE `unsur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-04-08  4:05:25
