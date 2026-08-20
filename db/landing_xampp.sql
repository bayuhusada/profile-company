-- Export compatible XAMPP/MariaDB (dikonversi dari MySQL 8.0.30, utf8mb4_general_ci)
--
-- Host: localhost    Database: landing
-- ------------------------------------------------------
-- Server source: MySQL 8.0.30 (Laragon) -> target: MariaDB (XAMPP)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `landing`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `landing` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `landing`;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `role` enum('admin','kepsek') NOT NULL DEFAULT 'admin',
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `pangkat` varchar(100) DEFAULT NULL,
  `ttd` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Administrator','admin','admin','$2y$10$kJoa3ukKrhdCTiB2ShzKgeLhyL.TsxfBOwUPiCF5Cl9K2ESM9mz2.',NULL,NULL,NULL,NULL,'2026-07-13 16:56:29'),(2,'Kepala Sekolah','kepsek','kepsek','$2y$10$SIt6AI56/5apCaGz.JrNtuo1OQSuD5doQKAXyTZq8F9Hpkt3Dbwze',NULL,NULL,NULL,NULL,'2026-08-18 19:23:23');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `berita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kategori_id` int DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `isi` longtext,
  `status` enum('publish','draft') DEFAULT 'draft',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `kategori_id` (`kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ekstrakurikuler`
--

DROP TABLE IF EXISTS `ekstrakurikuler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ekstrakurikuler` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `id_guru` int DEFAULT NULL,
  `urutan` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ekstrakurikuler`
--

LOCK TABLES `ekstrakurikuler` WRITE;
/*!40000 ALTER TABLE `ekstrakurikuler` DISABLE KEYS */;
INSERT INTO `ekstrakurikuler` VALUES (1,'Pramuka',NULL,'Kegiatan kepramukaan yang membentuk karakter disiplin, mandiri, dan peduli sesama.',NULL,1),(2,'Paskibra',NULL,'Pasukan pengibar bendera yang melatih kedisiplinan, kekompakan, dan cinta tanah air.',NULL,2),(3,'Futsal',NULL,'Ekstrakurikuler olahraga futsal untuk mengembangkan bakat dan kebugaran siswa.',NULL,3),(4,'Basket',NULL,'Latihan basket rutin yang mengasah keterampilan dan kerja sama tim.',NULL,4),(5,'Seni Tari',NULL,'Belajar dan mengembangkan bakat tari tradisional maupun modern.',NULL,5),(6,'Paduan Suara',NULL,'Mengembangkan bakat vokal siswa dan tampil di berbagai acara sekolah.',NULL,6);
/*!40000 ALTER TABLE `ekstrakurikuler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fasilitas`
--

DROP TABLE IF EXISTS `fasilitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fasilitas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `kategori` varchar(100) DEFAULT NULL,
  `urutan` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fasilitas`
--

LOCK TABLES `fasilitas` WRITE;
/*!40000 ALTER TABLE `fasilitas` DISABLE KEYS */;
INSERT INTO `fasilitas` VALUES (1,'Ruang Kelas',NULL,'Ruang belajar yang nyaman dan representatif dengan fasilitas LCD proyektor, AC, dan lemari buku.','Ruang Kelas',1),(2,'Perpustakaan',NULL,'Perpustakaan sekolah dengan koleksi buku pelajaran, buku bacaan, dan akses internet.','Perpustakaan',2),(3,'Laboratorium IPA',NULL,'Laboratorium lengkap untuk praktikum Fisika, Kimia, dan Biologi.','Laboratorium',3),(4,'Laboratorium Komputer',NULL,'Lab komputer dengan 30 unit PC dan koneksi internet cepat untuk pembelajaran TIK.','Laboratorium',4),(5,'Lapangan Olahraga',NULL,'Lapangan serbaguna untuk sepak bola, basket, voli, dan atletik.','Olahraga',5),(6,'Mushola',NULL,'Tempat ibadah yang bersih dan nyaman untuk kegiatan keagamaan siswa.','Ibadah',6);
/*!40000 ALTER TABLE `fasilitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foto_situs`
--

DROP TABLE IF EXISTS `foto_situs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `foto_situs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kunci` varchar(50) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kunci` (`kunci`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto_situs`
--

LOCK TABLES `foto_situs` WRITE;
/*!40000 ALTER TABLE `foto_situs` DISABLE KEYS */;
INSERT INTO `foto_situs` VALUES (1,'gedung',NULL),(2,'kepsek',NULL),(3,'kegiatan',NULL);
/*!40000 ALTER TABLE `foto_situs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galeri` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri`
--

LOCK TABLES `galeri` WRITE;
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guru` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `jabatan` varchar(150) DEFAULT NULL,
  `mapel` varchar(150) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guru`
--

LOCK TABLES `guru` WRITE;
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
INSERT INTO `guru` VALUES (16,'Siti Rahmawati, S.Pd.','Kepala Sekolah',NULL,NULL),(17,'Drs. Ahmad Syarif','Wakil Kepala Sekolah',NULL,NULL),(18,'Rina Marlina, S.Pd.','Guru Matematika','Matematika',NULL),(19,'Bambang Setiawan, S.Pd.','Guru Bahasa Indonesia','Bahasa Indonesia',NULL),(20,'Dewi Sartika, S.S.','Guru Bahasa Inggris','Bahasa Inggris',NULL),(21,'Ir. Hadi Prayitno','Guru IPA','IPA',NULL),(22,'Nurul Hidayah, S.Pd.','Guru IPS','IPS',NULL),(23,'M. Rizki Fauzi, S.Ag.','Guru Pendidikan Agama','Pendidikan Agama',NULL),(24,'Fitriani, S.Pd.','Guru PPKn','PPKn',NULL),(25,'Agus Wibowo, S.Pd.','Guru Penjasorkes','Penjasorkes',NULL),(26,'Lestari Dewi, S.Pd.','Guru Seni Budaya','Seni Budaya',NULL),(27,'Hendra Gunawan, S.Kom.','Guru TIK','TIK',NULL),(28,'Anisa Putri, S.Pd.','Guru BK',NULL,NULL),(29,'Yudi Prasetyo, S.Pd.','Staff TU',NULL,NULL),(30,'Mega Sari, A.Md.','Staff TU',NULL,NULL);
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'Kegiatan','kegiatan'),(2,'Prestasi','prestasi'),(3,'Pengumuman','pengumuman');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES (1,'7A'),(2,'7B'),(3,'7C'),(4,'8A'),(5,'8B'),(6,'8C'),(7,'9A'),(8,'9B'),(9,'9C');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kontak`
--

DROP TABLE IF EXISTS `kontak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kontak` (
  `id` int NOT NULL AUTO_INCREMENT,
  `alamat` text,
  `telepon` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `whatsapp` varchar(30) DEFAULT NULL,
  `maps` text,
  `jam_operasional` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontak`
--

LOCK TABLES `kontak` WRITE;
/*!40000 ALTER TABLE `kontak` DISABLE KEYS */;
INSERT INTO `kontak` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `kontak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mata_pelajaran`
--

DROP TABLE IF EXISTS `mata_pelajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mata_pelajaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_pelajaran` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mata_pelajaran`
--

LOCK TABLES `mata_pelajaran` WRITE;
/*!40000 ALTER TABLE `mata_pelajaran` DISABLE KEYS */;
INSERT INTO `mata_pelajaran` VALUES (1,'Matematika'),(2,'Bahasa Indonesia'),(3,'Bahasa Inggris'),(4,'IPA'),(5,'IPS'),(6,'Pendidikan Agama'),(7,'PPKn'),(8,'Penjasorkes'),(9,'Seni Budaya');
/*!40000 ALTER TABLE `mata_pelajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengaturan`
--

DROP TABLE IF EXISTS `pengaturan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengaturan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_website` varchar(200) DEFAULT NULL,
  `meta_description` text,
  `meta_keyword` text,
  `copyright` varchar(200) DEFAULT NULL,
  `jumlah_siswa` int DEFAULT '520',
  `jumlah_guru` int DEFAULT '32',
  `tahun_berdiri` int DEFAULT '2010',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengaturan`
--

LOCK TABLES `pengaturan` WRITE;
/*!40000 ALTER TABLE `pengaturan` DISABLE KEYS */;
INSERT INTO `pengaturan` VALUES (1,'SMP Negeri Sadi','','','SMP Negeri Sadi',520,32,2010);
/*!40000 ALTER TABLE `pengaturan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ppdb`
--

DROP TABLE IF EXISTS `ppdb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ppdb` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `isi` longtext,
  `brosur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ppdb`
--

LOCK TABLES `ppdb` WRITE;
/*!40000 ALTER TABLE `ppdb` DISABLE KEYS */;
INSERT INTO `ppdb` VALUES (1,'PPDB 2026',NULL,NULL);
/*!40000 ALTER TABLE `ppdb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestasi`
--

DROP TABLE IF EXISTS `prestasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prestasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kategori` enum('sekolah','guru','siswa') DEFAULT 'siswa',
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tahun` year DEFAULT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestasi`
--

LOCK TABLES `prestasi` WRITE;
/*!40000 ALTER TABLE `prestasi` DISABLE KEYS */;
INSERT INTO `prestasi` VALUES (11,'sekolah','Juara Umum Lomba Sekolah Sehat Tingkat Kabupaten',NULL,2024,'Meraih predikat sekolah sehat terbaik se-Kabupaten'),(12,'sekolah','Akreditasi A (Unggul)',NULL,2023,'Mempertahankan akreditasi unggul dari BAN-S/M'),(13,'guru','Juara 1 Guru Berprestasi Tingkat Provinsi',NULL,2024,'Dewi Sartika, S.S. meraih juara 1 guru berprestasi tingkat provinsi'),(14,'guru','Juara 2 Inovasi Pembelajaran Digital',NULL,2023,'Hendra Gunawan, S.Kom. meraih juara 2 inovasi pembelajaran digital'),(15,'siswa','Juara 1 Olimpiade Matematika Tingkat Kabupaten',NULL,2024,'Ani Rahmawati meraih medali emas Olimpiade Matematika'),(16,'siswa','Juara 2 Olimpiade Sains Nasional (OSN) IPA',NULL,2024,'Budi Santoso meraih medali perak OSN IPA tingkat kabupaten'),(17,'siswa','Juara 3 Lomba Pidato Bahasa Inggris',NULL,2023,'Citra Dewi meraih juara 3 lomba pidato Bahasa Inggris se-Kabupaten'),(18,'siswa','Juara 1 Turnamen Futsal Pelajar',NULL,2024,'Tim futsal SMP Negeri Sadi meraih juara 1 turnamen futsal pelajar'),(19,'sekolah','Sekolah Adiwiyata Tingkat Provinsi',NULL,2023,'Penghargaan sekolah peduli lingkungan dari pemerintah provinsi'),(20,'siswa','Juara 2 Paskibra Tingkat Kabupaten',NULL,2024,'Tim paskibra meraih juara 2 lomba Paskibra tingkat kabupaten');
/*!40000 ALTER TABLE `prestasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(200) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `alamat` text,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `maps` text,
  `visi` text,
  `misi` text,
  `sejarah` text,
  `sambutan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil`
--

LOCK TABLES `profil` WRITE;
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` VALUES (1,'SMP Negeri sadi',NULL,NULL,'','','','','','','','');
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nisn` (`nisn`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES (1,'12345670001','Ahmad Fauzi','Islam','L',1),(2,'12345670002','Budi Santoso','Islam','L',2),(3,'12345670003','Citra Lianto','Islam','L',3),(4,'12345670004','Dodi Hermawan','Islam','L',4),(5,'12345670005','Eko Prasetyo','Kristen','L',5),(6,'12345670006','Fajar Nugroho','Islam','L',6),(7,'12345670007','Gilang Ramadhan','Islam','L',7),(8,'12345670008','Hendra Kurniawan','Islam','L',8),(9,'12345670009','Irfan Maulana','Islam','L',9),(10,'12345670010','Joko Susilo','Islam','L',1),(11,'12345670011','Kevin Pratama','Kristen','L',2),(12,'12345670012','Lutfi Hakim','Islam','L',3),(13,'12345670013','M. Rizki','Islam','L',4),(14,'12345670014','Nanda Akbar','Katolik','L',5),(15,'12345670015','Oky Permana','Islam','L',6),(16,'12345670016','Ani Rahmawati','Islam','P',4),(17,'12345670017','Bella Safitri','Islam','P',5),(18,'12345670018','Citra Dewi','Islam','P',6),(19,'12345670019','Dian Permata','Islam','P',7),(20,'12345670020','Eva Marlina','Islam','P',8),(21,'12345670021','Fitri Handayani','Kristen','P',9),(22,'12345670022','Gita Pramesti','Islam','P',1),(23,'12345670023','Hani Nurjanah','Islam','P',2),(24,'12345670024','Indah Lestari','Katolik','P',3),(25,'12345670025','Jihan Azizah','Islam','P',4),(26,'12345670026','Kartika Sari','Islam','P',5),(27,'12345670027','Lilis Suryani','Islam','P',6),(28,'12345670028','Mega Utami','Islam','P',7),(29,'12345670029','Nina Amelia','Islam','P',8),(30,'12345670030','Oktavia Sari','Kristen','P',9);
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slider` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(150) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `urutan` int DEFAULT '0',
  `status` tinyint DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` VALUES (1,'SMP NEGERI Sadi','Sekolah Berprestasi',NULL,1,1),(2,'Selamat Datang','Mencetak Generasi Berprestasi',NULL,2,1),(3,'PPDB Tahun Ini','Daftarkan Putra-Putri Anda',NULL,3,1);
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'landing'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-20 12:44:59
