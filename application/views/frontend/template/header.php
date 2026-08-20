<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($title) ? $title . ' | ' : ''; ?>SMP Negeri Sadi</title>
  <meta name="description" content="SMP Negeri Sadi — Mencetak Generasi Berprestasi. Website resmi sekolah dengan informasi profil, berita, prestasi, PPDB, dan galeri kegiatan.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/style.css?v=2'); ?>">
  <link rel="shortcut icon" href="<?php echo base_url('assets/frontend/img/logo-smp.png'); ?>" type="image/png">
</head>
<body>

  <!-- Navigation -->
  <nav class="nav">
    <div class="container">
      <a href="<?php echo site_url(); ?>" class="nav-logo">
        <img src="<?php echo base_url('assets/frontend/img/logo-smp.png'); ?>" alt="SMP Negeri Sadi">
        <span>SMP<br>Negeri Sadi</span>
      </a>

      <ul class="nav-list">
        <li><a href="<?php echo site_url(); ?>" class="<?php echo (empty($active_nav) || $active_nav === 'beranda') ? 'active' : ''; ?>">Beranda</a></li>
        <li><a href="<?php echo site_url('tentang'); ?>" class="<?php echo $active_nav === 'tentang' ? 'active' : ''; ?>">Tentang</a></li>
        <li><a href="<?php echo site_url('guru'); ?>" class="<?php echo $active_nav === 'guru' ? 'active' : ''; ?>">Guru & Staff</a></li>
        <li><a href="<?php echo site_url('prestasi'); ?>" class="<?php echo $active_nav === 'prestasi' ? 'active' : ''; ?>">Prestasi</a></li>
        <li><a href="<?php echo site_url('berita'); ?>" class="<?php echo $active_nav === 'berita' ? 'active' : ''; ?>">Berita</a></li>
        <li><a href="<?php echo site_url('galeri'); ?>" class="<?php echo $active_nav === 'galeri' ? 'active' : ''; ?>">Galeri</a></li>
        <li><a href="<?php echo site_url('fasilitas'); ?>" class="<?php echo $active_nav === 'fasilitas' ? 'active' : ''; ?>">Fasilitas</a></li>
        <li><a href="<?php echo site_url('siswa'); ?>" class="<?php echo $active_nav === 'siswa' ? 'active' : ''; ?>">Siswa</a></li>
        <li><a href="<?php echo site_url('mata-pelajaran'); ?>" class="<?php echo $active_nav === 'mata_pelajaran' ? 'active' : ''; ?>">Mapel</a></li>
        <li><a href="<?php echo site_url('ekstrakurikuler'); ?>" class="<?php echo $active_nav === 'ekstrakurikuler' ? 'active' : ''; ?>">Ekskul</a></li>
        <li><a href="<?php echo site_url('ppdb'); ?>" class="<?php echo $active_nav === 'ppdb' ? 'active' : ''; ?>">PPDB</a></li>
        <li><a href="<?php echo site_url('kontak'); ?>" class="<?php echo $active_nav === 'kontak' ? 'active' : ''; ?>">Kontak</a></li>
      </ul>

      <button class="nav-hamburger" aria-label="Toggle menu">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </nav>

  <main>
