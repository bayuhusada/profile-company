    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <?php $is_kepsek = $this->session->userdata('admin_role') === 'kepsek'; ?>
          <div class="app-brand demo">
            <a href="<?php echo site_url($is_kepsek ? 'kepsek' : 'dashboard'); ?>" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bolder ms-2"><?php echo isset($nama_sekolah) ? $nama_sekolah : 'SMP Negeri Sadi'; ?></span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <?php if ($is_kepsek): ?>

          <ul class="menu-inner py-1">
            <li class="menu-item <?php echo ($active_menu ?? 'dashboard') == 'dashboard' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('kepsek'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Lihat Data</span>
            </li>

            <?php
              $kepsek_menu = [
                'siswa' => ['url' => 'kepsek/lihat/siswa', 'icon' => 'bx-user', 'label' => 'Data Siswa'],
                'guru' => ['url' => 'kepsek/lihat/guru', 'icon' => 'bx-group', 'label' => 'Data Guru'],
                'ekstrakurikuler' => ['url' => 'kepsek/lihat/ekstrakurikuler', 'icon' => 'bx-calendar-star', 'label' => 'Ekstrakurikuler'],
                'fasilitas' => ['url' => 'kepsek/lihat/fasilitas', 'icon' => 'bx-building-house', 'label' => 'Fasilitas'],
                'prestasi' => ['url' => 'kepsek/lihat/prestasi', 'icon' => 'bx-trophy', 'label' => 'Prestasi'],
                'kelas' => ['url' => 'kepsek/lihat/kelas', 'icon' => 'bx-grid', 'label' => 'Kelas'],
                'mata_pelajaran' => ['url' => 'kepsek/lihat/mata_pelajaran', 'icon' => 'bx-book', 'label' => 'Mata Pelajaran'],
              ];
              foreach ($kepsek_menu as $key => $m):
            ?>
            <li class="menu-item <?php echo $active_menu == $key ? 'active' : ''; ?>">
              <a href="<?php echo site_url($m['url']); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx <?php echo $m['icon']; ?>"></i>
                <div data-i18n="<?php echo $m['label']; ?>"><?php echo $m['label']; ?></div>
              </a>
            </li>
            <?php endforeach; ?>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Akun</span>
            </li>

            <li class="menu-item <?php echo $active_menu == 'data_diri' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('kepsek/data_diri'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Data Diri">Data Diri Kepala Sekolah</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="<?php echo site_url('auth/logout'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Logout">Logout</div>
              </a>
            </li>
          </ul>

          <?php else: ?>

          <ul class="menu-inner py-1">
            <li class="menu-item <?php echo ($active_menu ?? 'dashboard') == 'dashboard' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('dashboard'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Konten</span>
            </li>

            <li class="menu-item <?php echo $active_menu == 'profil' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('admin_profil'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-building"></i>
                <div data-i18n="Profil">Profil Sekolah</div>
              </a>
            </li>

            <li class="menu-item <?php echo $active_menu == 'berita' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('admin_berita'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="Berita">Berita</div>
              </a>
            </li>

            <li class="menu-item <?php echo $active_menu == 'slider' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('admin_slider'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-slideshow"></i>
                <div data-i18n="Slider">Slider Beranda</div>
              </a>
            </li>

            <li class="menu-item <?php echo $active_menu == 'kategori' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('admin_kategori'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Kategori">Kategori Berita</div>
              </a>
            </li>

            <li class="menu-item <?php echo $active_menu == 'prestasi' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('admin_prestasi'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-trophy"></i>
                <div data-i18n="Prestasi">Prestasi</div>
              </a>
            </li>

            <li class="menu-item <?php echo $active_menu == 'guru' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('admin_guru'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Guru">Guru & Staff</div>
              </a>
            </li>

            <li class="menu-item <?php echo $active_menu == 'galeri' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('admin_galeri'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-images"></i>
                <div data-i18n="Galeri">Galeri</div>
              </a>
            </li>

            <li class="menu-item <?php echo $active_menu == 'ppdb' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('admin_ppdb'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="PPDB">PPDB</div>
              </a>
            </li>

            <li class="menu-item <?php echo $active_menu == 'kontak' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('admin_kontak'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-envelope"></i>
                <div data-i18n="Kontak">Kontak</div>
              </a>
            </li>

            <li class="menu-item <?php echo $active_menu == 'fasilitas' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('admin_fasilitas'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-building-house"></i>
                <div data-i18n="Fasilitas">Fasilitas</div>
              </a>
            </li>

            <li class="menu-item <?php echo $active_menu == 'ekstrakurikuler' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('admin_ekstrakurikuler'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-star"></i>
                <div data-i18n="Ekstrakurikuler">Ekstrakurikuler</div>
              </a>
            </li>

            <li class="menu-item <?php echo $active_menu == 'siswa' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('admin_siswa'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Siswa">Siswa</div>
              </a>
            </li>

            <li class="menu-item <?php echo $active_menu == 'kelas' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('admin_kelas'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-grid"></i>
                <div data-i18n="Kelas">Kelas</div>
              </a>
            </li>

            <li class="menu-item <?php echo $active_menu == 'mata_pelajaran' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('admin_mata_pelajaran'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Mapel">Mata Pelajaran</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pengaturan</span>
            </li>

            <li class="menu-item <?php echo $active_menu == 'pengaturan' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('admin_pengaturan'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Pengaturan">Pengaturan Website</div>
              </a>
            </li>

            <li class="menu-item <?php echo $active_menu == 'administrator' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('admin_administrator'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Administrator">Administrator</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="<?php echo site_url('auth/logout'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Logout">Logout</div>
              </a>
            </li>
          </ul>

          <?php endif; ?>

        </aside>

        <div class="layout-page">

          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="position-absolute start-50 translate-middle-x">
              <a href="<?php echo site_url($is_kepsek ? 'kepsek' : 'dashboard'); ?>" class="navbar-brand mb-0 h1 text-primary fw-bold"><?php echo isset($nama_sekolah) ? $nama_sekolah : 'SMP Negeri Sadi'; ?></a>
            </div>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <div class="navbar-nav ms-auto">
                <span class="nav-item nav-link text-muted small">
                  <?php if ($is_kepsek): ?>
                    <span class="badge bg-label-primary me-2">Kepala Sekolah</span>
                  <?php endif; ?>
                  <?php echo $this->session->userdata('admin_nama') ?? ''; ?>
                </span>
              </div>
            </div>
          </nav>

          <div class="content-wrapper">
