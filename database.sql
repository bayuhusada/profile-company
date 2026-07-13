-- SMP Negeri Sadi — Database Schema
-- Import ke phpMyAdmin atau MySQL CLI sebelum menggunakan admin panel

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(200) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `maps` text DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `sejarah` text DEFAULT NULL,
  `sambutan` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `profil` (`id`, `nama_sekolah`) VALUES (1, 'SMP Negeri Sadi');

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kategori` (`nama`, `slug`) VALUES
('Kegiatan', 'kegiatan'),
('Prestasi', 'prestasi'),
('Pengumuman', 'pengumuman');

CREATE TABLE IF NOT EXISTS `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_id` int(11) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `isi` longtext DEFAULT NULL,
  `status` enum('publish','draft') DEFAULT 'draft',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `kategori_id` (`kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `jabatan` varchar(150) DEFAULT NULL,
  `mapel` varchar(150) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `prestasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` enum('sekolah','guru','siswa') DEFAULT 'siswa',
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tahun` year DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `ppdb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `isi` longtext DEFAULT NULL,
  `brosur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `ppdb` (`id`, `judul`) VALUES (1, 'PPDB 2026');

CREATE TABLE IF NOT EXISTS `kontak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `whatsapp` varchar(30) DEFAULT NULL,
  `maps` text DEFAULT NULL,
  `jam_operasional` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kontak` (`id`) VALUES (1);

CREATE TABLE IF NOT EXISTS `pengaturan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_website` varchar(200) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `copyright` varchar(200) DEFAULT NULL,
  `jumlah_siswa` int(11) DEFAULT 520,
  `jumlah_guru` int(11) DEFAULT 32,
  `tahun_berdiri` int(11) DEFAULT 2010,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pengaturan` (`id`, `nama_website`, `meta_description`, `meta_keyword`, `copyright`, `jumlah_siswa`, `jumlah_guru`, `tahun_berdiri`) VALUES
(1, 'SMP Negeri Sadi', NULL, NULL, 'SMP Negeri Sadi', 520, 32, 2010);

CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `urutan` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `fasilitas` (`nama`, `deskripsi`, `kategori`, `urutan`) VALUES
('Ruang Kelas', 'Ruang belajar yang nyaman dan representatif dengan fasilitas LCD proyektor, AC, dan lemari buku.', 'Ruang Kelas', 1),
('Perpustakaan', 'Perpustakaan sekolah dengan koleksi buku pelajaran, buku bacaan, dan akses internet.', 'Perpustakaan', 2),
('Laboratorium IPA', 'Laboratorium lengkap untuk praktikum Fisika, Kimia, dan Biologi.', 'Laboratorium', 3),
('Laboratorium Komputer', 'Lab komputer dengan 30 unit PC dan koneksi internet cepat untuk pembelajaran TIK.', 'Laboratorium', 4),
('Lapangan Olahraga', 'Lapangan serbaguna untuk sepak bola, basket, voli, dan atletik.', 'Olahraga', 5),
('Mushola', 'Tempat ibadah yang bersih dan nyaman untuk kegiatan keagamaan siswa.', 'Ibadah', 6);

CREATE TABLE IF NOT EXISTS `ekstrakurikuler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `urutan` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `ekstrakurikuler` (`nama`, `deskripsi`, `urutan`) VALUES
('Pramuka', 'Kegiatan kepramukaan yang membentuk karakter disiplin, mandiri, dan peduli sesama.', 1),
('Paskibra', 'Pasukan pengibar bendera yang melatih kedisiplinan, kekompakan, dan cinta tanah air.', 2),
('Futsal', 'Ekstrakurikuler olahraga futsal untuk mengembangkan bakat dan kebugaran siswa.', 3),
('Basket', 'Latihan basket rutin yang mengasah keterampilan dan kerja sama tim.', 4),
('Seni Tari', 'Belajar dan mengembangkan bakat tari tradisional maupun modern.', 5),
('Paduan Suara', 'Mengembangkan bakat vokal siswa dan tampil di berbagai acara sekolah.', 6);

CREATE TABLE IF NOT EXISTS `kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kelas` (`nama_kelas`) VALUES
('7A'),('7B'),('7C'),
('8A'),('8B'),('8C'),
('9A'),('9B'),('9C');

CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nisn` (`nisn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `mata_pelajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelajaran` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `mata_pelajaran` (`nama_pelajaran`) VALUES
('Matematika'),('Bahasa Indonesia'),('Bahasa Inggris'),
('IPA'),('IPS'),('Pendidikan Agama'),
('PPKn'),('Penjasorkes'),('Seni Budaya');
