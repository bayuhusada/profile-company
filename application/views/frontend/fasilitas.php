<section class="sub-hero">
  <div class="container">
    <p class="breadcrumb"><a href="<?php echo site_url(); ?>">Beranda</a> / Fasilitas</p>
    <h1>Fasilitas</h1>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-header fade-in">
      <span class="section-label">Sarana & Prasarana</span>
      <h2>Fasilitas Sekolah</h2>
      <p>Berbagai fasilitas lengkap untuk mendukung proses belajar mengajar</p>
    </div>

    <?php if ($fasilitas): ?>
      <?php
      $kategori_list = array_unique(array_filter(array_map(function($f) { return $f->kategori; }, $fasilitas)));
      $grouped = [];
      foreach ($fasilitas as $f) {
        $grouped[$f->kategori ?? 'Lainnya'][] = $f;
      }
      ?>

      <?php $first = true; foreach ($grouped as $kategori => $items): ?>
      <div style="margin-bottom:var(--space-xl)" class="fade-in">
        <h3 style="font-size:var(--text-md);color:var(--primary);margin-bottom:var(--space-sm);text-transform:uppercase;letter-spacing:0.05em"><?php echo $kategori; ?></h3>
        <div class="fasilitas-grid">
          <?php foreach ($items as $i => $f): ?>
          <div class="fasilitas-card fade-in" style="transition-delay:<?php echo $i * 0.05; ?>s">
            <?php if ($f->foto): ?>
            <img src="<?php echo base_url($f->foto); ?>" alt="<?php echo $f->nama; ?>" class="fasilitas-img">
            <?php else: ?>
            <div class="fasilitas-img" style="background:var(--primary-light);display:flex;align-items:center;justify-content:center">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
            </div>
            <?php endif; ?>
            <div class="fasilitas-body">
              <h3><?php echo $f->nama; ?></h3>
              <p><?php echo $f->deskripsi ?? '-'; ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php $first = false; endforeach; ?>
    <?php else: ?>
      <p style="text-align:center;padding:var(--space-xl) 0">Belum ada data fasilitas.</p>
    <?php endif; ?>
  </div>
</section>
