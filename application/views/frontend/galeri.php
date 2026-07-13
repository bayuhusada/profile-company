<section class="sub-hero">
  <div class="container">
    <p class="breadcrumb"><a href="<?php echo site_url(); ?>">Beranda</a> / Galeri</p>
    <h1>Galeri</h1>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-header fade-in">
      <span class="section-label">Dokumentasi</span>
      <h2>Galeri Kegiatan</h2>
      <p>Dokumentasi momen-momen berharga di SMP Negeri Sadi</p>
    </div>

    <div class="galeri-grid">
      <?php if ($galeri): foreach ($galeri as $i => $g): ?>
      <div class="galeri-item fade-in" style="transition-delay:<?php echo $i * 0.05; ?>s">
        <img src="<?php echo $g->gambar ? base_url($g->gambar) : 'https://placehold.co/400x400/1e3a5f/ffffff?text=Foto'; ?>" alt="<?php echo $g->judul ?? 'Foto ' . ($i + 1); ?>" data-lightbox="<?php echo base_url($g->gambar); ?>">
      </div>
      <?php endforeach; else: ?>
      <p style="grid-column:1/-1;text-align:center;padding:var(--space-xl) 0">Belum ada galeri.</p>
      <?php endif; ?>
    </div>
  </div>
</section>
