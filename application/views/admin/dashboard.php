<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Dashboard</h4>

  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-muted mb-1">Total Berita</p>
              <h3 class="mb-0"><?php echo $total_berita; ?></h3>
            </div>
            <div class="text-primary">
              <i class="bx bx-news" style="font-size:2.5rem"></i>
            </div>
          </div>
          <a href="<?php echo site_url('admin_berita'); ?>" class="small text-muted mt-2 d-block">Kelola Berita</a>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-muted mb-1">Total Guru</p>
              <h3 class="mb-0"><?php echo $total_guru; ?></h3>
            </div>
            <div class="text-success">
              <i class="bx bx-group" style="font-size:2.5rem"></i>
            </div>
          </div>
          <a href="<?php echo site_url('admin_guru'); ?>" class="small text-muted mt-2 d-block">Kelola Guru</a>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-muted mb-1">Total Prestasi</p>
              <h3 class="mb-0"><?php echo $total_prestasi; ?></h3>
            </div>
            <div class="text-warning">
              <i class="bx bx-trophy" style="font-size:2.5rem"></i>
            </div>
          </div>
          <a href="<?php echo site_url('admin_prestasi'); ?>" class="small text-muted mt-2 d-block">Kelola Prestasi</a>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-muted mb-1">Total Foto</p>
              <h3 class="mb-0"><?php echo $total_galeri; ?></h3>
            </div>
            <div class="text-info">
              <i class="bx bx-images" style="font-size:2.5rem"></i>
            </div>
          </div>
          <a href="<?php echo site_url('admin_galeri'); ?>" class="small text-muted mt-2 d-block">Kelola Galeri</a>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Berita Terbaru</h5>
          <a href="<?php echo site_url('admin_berita'); ?>" class="small">Lihat Semua</a>
        </div>
        <div class="card-body">
          <?php if ($recent_berita): ?>
            <ul class="list-unstyled mb-0">
              <?php foreach ($recent_berita as $b): ?>
                <li class="d-flex justify-content-between align-items-center py-2 border-bottom">
                  <span><?php echo character_limiter($b->judul, 40); ?></span>
                  <small class="text-muted"><?php echo date('d/m/Y', strtotime($b->created_at)); ?></small>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php else: ?>
            <p class="text-muted mb-0">Belum ada berita.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="col-md-6 mb-4">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Shortcut Menu</h5>
        </div>
        <div class="card-body">
          <div class="row g-2">
            <div class="col-6">
              <a href="<?php echo site_url('admin_profil'); ?>" class="btn btn-outline-primary w-100">Profil Sekolah</a>
            </div>
            <div class="col-6">
              <a href="<?php echo site_url('admin_berita'); ?>" class="btn btn-outline-primary w-100">Berita</a>
            </div>
            <div class="col-6">
              <a href="<?php echo site_url('admin_prestasi'); ?>" class="btn btn-outline-primary w-100">Prestasi</a>
            </div>
            <div class="col-6">
              <a href="<?php echo site_url('admin_guru'); ?>" class="btn btn-outline-primary w-100">Guru</a>
            </div>
            <div class="col-6">
              <a href="<?php echo site_url('admin_galeri'); ?>" class="btn btn-outline-primary w-100">Galeri</a>
            </div>
            <div class="col-6">
              <a href="<?php echo site_url('admin_ppdb'); ?>" class="btn btn-outline-primary w-100">PPDB</a>
            </div>
            <div class="col-6">
              <a href="<?php echo site_url('admin_kontak'); ?>" class="btn btn-outline-primary w-100">Kontak</a>
            </div>
            <div class="col-6">
              <a href="<?php echo site_url('admin_pengaturan'); ?>" class="btn btn-outline-primary w-100">Pengaturan</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
