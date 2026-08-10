-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 10, 2026 at 08:38 AM
-- Server version: 8.0.30
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `landing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `foto`, `created_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$kJoa3ukKrhdCTiB2ShzKgeLhyL.TsxfBOwUPiCF5Cl9K2ESM9mz2.', NULL, '2026-07-13 16:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int NOT NULL,
  `kategori_id` int DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `isi` longtext,
  `status` enum('publish','draft') DEFAULT 'draft',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id` int NOT NULL,
  `nama` varchar(150) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `id_guru` int DEFAULT NULL,
  `urutan` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id`, `nama`, `foto`, `deskripsi`, `id_guru`, `urutan`) VALUES
(1, 'Pramuka', NULL, 'Kegiatan kepramukaan yang membentuk karakter disiplin, mandiri, dan peduli sesama.', NULL, 1),
(2, 'Paskibra', NULL, 'Pasukan pengibar bendera yang melatih kedisiplinan, kekompakan, dan cinta tanah air.', NULL, 2),
(3, 'Futsal', NULL, 'Ekstrakurikuler olahraga futsal untuk mengembangkan bakat dan kebugaran siswa.', NULL, 3),
(4, 'Basket', NULL, 'Latihan basket rutin yang mengasah keterampilan dan kerja sama tim.', NULL, 4),
(5, 'Seni Tari', NULL, 'Belajar dan mengembangkan bakat tari tradisional maupun modern.', NULL, 5),
(6, 'Paduan Suara', NULL, 'Mengembangkan bakat vokal siswa dan tampil di berbagai acara sekolah.', NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int NOT NULL,
  `nama` varchar(150) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `kategori` varchar(100) DEFAULT NULL,
  `urutan` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `foto`, `deskripsi`, `kategori`, `urutan`) VALUES
(1, 'Ruang Kelas', NULL, 'Ruang belajar yang nyaman dan representatif dengan fasilitas LCD proyektor, AC, dan lemari buku.', 'Ruang Kelas', 1),
(2, 'Perpustakaan', NULL, 'Perpustakaan sekolah dengan koleksi buku pelajaran, buku bacaan, dan akses internet.', 'Perpustakaan', 2),
(3, 'Laboratorium IPA', NULL, 'Laboratorium lengkap untuk praktikum Fisika, Kimia, dan Biologi.', 'Laboratorium', 3),
(4, 'Laboratorium Komputer', NULL, 'Lab komputer dengan 30 unit PC dan koneksi internet cepat untuk pembelajaran TIK.', 'Laboratorium', 4),
(5, 'Lapangan Olahraga', NULL, 'Lapangan serbaguna untuk sepak bola, basket, voli, dan atletik.', 'Olahraga', 5),
(6, 'Mushola', NULL, 'Tempat ibadah yang bersih dan nyaman untuk kegiatan keagamaan siswa.', 'Ibadah', 6);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jabatan` varchar(150) DEFAULT NULL,
  `mapel` varchar(150) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `jabatan`, `mapel`, `foto`) VALUES
(16, 'Siti Rahmawati, S.Pd.', 'Kepala Sekolah', NULL, NULL),
(17, 'Drs. Ahmad Syarif', 'Wakil Kepala Sekolah', NULL, NULL),
(18, 'Rina Marlina, S.Pd.', 'Guru Matematika', 'Matematika', NULL),
(19, 'Bambang Setiawan, S.Pd.', 'Guru Bahasa Indonesia', 'Bahasa Indonesia', NULL),
(20, 'Dewi Sartika, S.S.', 'Guru Bahasa Inggris', 'Bahasa Inggris', NULL),
(21, 'Ir. Hadi Prayitno', 'Guru IPA', 'IPA', NULL),
(22, 'Nurul Hidayah, S.Pd.', 'Guru IPS', 'IPS', NULL),
(23, 'M. Rizki Fauzi, S.Ag.', 'Guru Pendidikan Agama', 'Pendidikan Agama', NULL),
(24, 'Fitriani, S.Pd.', 'Guru PPKn', 'PPKn', NULL),
(25, 'Agus Wibowo, S.Pd.', 'Guru Penjasorkes', 'Penjasorkes', NULL),
(26, 'Lestari Dewi, S.Pd.', 'Guru Seni Budaya', 'Seni Budaya', NULL),
(27, 'Hendra Gunawan, S.Kom.', 'Guru TIK', 'TIK', NULL),
(28, 'Anisa Putri, S.Pd.', 'Guru BK', NULL, NULL),
(29, 'Yudi Prasetyo, S.Pd.', 'Staff TU', NULL, NULL),
(30, 'Mega Sari, A.Md.', 'Staff TU', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `slug`) VALUES
(1, 'Kegiatan', 'kegiatan'),
(2, 'Prestasi', 'prestasi'),
(3, 'Pengumuman', 'pengumuman');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`) VALUES
(1, '7A'),
(2, '7B'),
(3, '7C'),
(4, '8A'),
(5, '8B'),
(6, '8C'),
(7, '9A'),
(8, '9B'),
(9, '9C');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int NOT NULL,
  `alamat` text,
  `telepon` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `whatsapp` varchar(30) DEFAULT NULL,
  `maps` text,
  `jam_operasional` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `alamat`, `telepon`, `email`, `whatsapp`, `maps`, `jam_operasional`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int NOT NULL,
  `nama_pelajaran` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `nama_pelajaran`) VALUES
(1, 'Matematika'),
(2, 'Bahasa Indonesia'),
(3, 'Bahasa Inggris'),
(4, 'IPA'),
(5, 'IPS'),
(6, 'Pendidikan Agama'),
(7, 'PPKn'),
(8, 'Penjasorkes'),
(9, 'Seni Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int NOT NULL,
  `nama_website` varchar(200) DEFAULT NULL,
  `meta_description` text,
  `meta_keyword` text,
  `copyright` varchar(200) DEFAULT NULL,
  `jumlah_siswa` int DEFAULT '520',
  `jumlah_guru` int DEFAULT '32',
  `tahun_berdiri` int DEFAULT '2010'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_website`, `meta_description`, `meta_keyword`, `copyright`, `jumlah_siswa`, `jumlah_guru`, `tahun_berdiri`) VALUES
(1, 'SMP Negeri Sadi', NULL, NULL, 'SMP Negeri Sadi', 520, 32, 2010);

-- --------------------------------------------------------

--
-- Table structure for table `ppdb`
--

CREATE TABLE `ppdb` (
  `id` int NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` longtext,
  `brosur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ppdb`
--

INSERT INTO `ppdb` (`id`, `judul`, `isi`, `brosur`) VALUES
(1, 'PPDB 2026', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int NOT NULL,
  `kategori` enum('sekolah','guru','siswa') DEFAULT 'siswa',
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tahun` year DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `kategori`, `judul`, `foto`, `tahun`, `deskripsi`) VALUES
(11, 'sekolah', 'Juara Umum Lomba Sekolah Sehat Tingkat Kabupaten', NULL, 2024, 'Meraih predikat sekolah sehat terbaik se-Kabupaten'),
(12, 'sekolah', 'Akreditasi A (Unggul)', NULL, 2023, 'Mempertahankan akreditasi unggul dari BAN-S/M'),
(13, 'guru', 'Juara 1 Guru Berprestasi Tingkat Provinsi', NULL, 2024, 'Dewi Sartika, S.S. meraih juara 1 guru berprestasi tingkat provinsi'),
(14, 'guru', 'Juara 2 Inovasi Pembelajaran Digital', NULL, 2023, 'Hendra Gunawan, S.Kom. meraih juara 2 inovasi pembelajaran digital'),
(15, 'siswa', 'Juara 1 Olimpiade Matematika Tingkat Kabupaten', NULL, 2024, 'Ani Rahmawati meraih medali emas Olimpiade Matematika'),
(16, 'siswa', 'Juara 2 Olimpiade Sains Nasional (OSN) IPA', NULL, 2024, 'Budi Santoso meraih medali perak OSN IPA tingkat kabupaten'),
(17, 'siswa', 'Juara 3 Lomba Pidato Bahasa Inggris', NULL, 2023, 'Citra Dewi meraih juara 3 lomba pidato Bahasa Inggris se-Kabupaten'),
(18, 'siswa', 'Juara 1 Turnamen Futsal Pelajar', NULL, 2024, 'Tim futsal SMP Negeri Sadi meraih juara 1 turnamen futsal pelajar'),
(19, 'sekolah', 'Sekolah Adiwiyata Tingkat Provinsi', NULL, 2023, 'Penghargaan sekolah peduli lingkungan dari pemerintah provinsi'),
(20, 'siswa', 'Juara 2 Paskibra Tingkat Kabupaten', NULL, 2024, 'Tim paskibra meraih juara 2 lomba Paskibra tingkat kabupaten');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int NOT NULL,
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
  `sambutan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama_sekolah`, `logo`, `favicon`, `alamat`, `email`, `telepon`, `maps`, `visi`, `misi`, `sejarah`, `sambutan`) VALUES
(1, 'SMP Negeri sadi', NULL, NULL, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `id_kelas` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama`, `agama`, `jenis_kelamin`, `id_kelas`) VALUES
(1, '12345670001', 'Ahmad Fauzi', 'Islam', 'L', 1),
(2, '12345670002', 'Budi Santoso', 'Islam', 'L', 2),
(3, '12345670003', 'Citra Lianto', 'Islam', 'L', 3),
(4, '12345670004', 'Dodi Hermawan', 'Islam', 'L', 4),
(5, '12345670005', 'Eko Prasetyo', 'Kristen', 'L', 5),
(6, '12345670006', 'Fajar Nugroho', 'Islam', 'L', 6),
(7, '12345670007', 'Gilang Ramadhan', 'Islam', 'L', 7),
(8, '12345670008', 'Hendra Kurniawan', 'Islam', 'L', 8),
(9, '12345670009', 'Irfan Maulana', 'Islam', 'L', 9),
(10, '12345670010', 'Joko Susilo', 'Islam', 'L', 1),
(11, '12345670011', 'Kevin Pratama', 'Kristen', 'L', 2),
(12, '12345670012', 'Lutfi Hakim', 'Islam', 'L', 3),
(13, '12345670013', 'M. Rizki', 'Islam', 'L', 4),
(14, '12345670014', 'Nanda Akbar', 'Katolik', 'L', 5),
(15, '12345670015', 'Oky Permana', 'Islam', 'L', 6),
(16, '12345670016', 'Ani Rahmawati', 'Islam', 'P', 4),
(17, '12345670017', 'Bella Safitri', 'Islam', 'P', 5),
(18, '12345670018', 'Citra Dewi', 'Islam', 'P', 6),
(19, '12345670019', 'Dian Permata', 'Islam', 'P', 7),
(20, '12345670020', 'Eva Marlina', 'Islam', 'P', 8),
(21, '12345670021', 'Fitri Handayani', 'Kristen', 'P', 9),
(22, '12345670022', 'Gita Pramesti', 'Islam', 'P', 1),
(23, '12345670023', 'Hani Nurjanah', 'Islam', 'P', 2),
(24, '12345670024', 'Indah Lestari', 'Katolik', 'P', 3),
(25, '12345670025', 'Jihan Azizah', 'Islam', 'P', 4),
(26, '12345670026', 'Kartika Sari', 'Islam', 'P', 5),
(27, '12345670027', 'Lilis Suryani', 'Islam', 'P', 6),
(28, '12345670028', 'Mega Utami', 'Islam', 'P', 7),
(29, '12345670029', 'Nina Amelia', 'Islam', 'P', 8),
(30, '12345670030', 'Oktavia Sari', 'Kristen', 'P', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppdb`
--
ALTER TABLE `ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ppdb`
--
ALTER TABLE `ppdb`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
