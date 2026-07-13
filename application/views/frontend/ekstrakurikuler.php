<section class="sub-hero">
  <div class="container">
    <p class="breadcrumb"><a href="<?php echo site_url(); ?>">Beranda</a> / Ekstrakurikuler</p>
    <h1>Ekstrakurikuler</h1>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-header fade-in">
      <span class="section-label">Kegiatan Siswa</span>
      <h2>Ekstrakurikuler</h2>
      <p>Wadah pengembangan bakat dan minat siswa di luar jam pelajaran</p>
    </div>

    <?php if ($ekstrakurikuler): ?>
    <div class="ekskul-grid">
      <?php foreach ($ekstrakurikuler as $i => $e): ?>
      <div class="ekskul-card fade-in" style="transition-delay:<?php echo $i * 0.05; ?>s">
        <?php if ($e->foto): ?>
        <img src="<?php echo base_url($e->foto); ?>" alt="<?php echo $e->nama; ?>" class="ekskul-img">
        <?php else: ?>
        <div class="ekskul-img" style="background:var(--primary-light);display:flex;align-items:center;justify-content:center">
          <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="1.5"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        </div>
        <?php endif; ?>
        <div class="ekskul-body">
          <h3><?php echo $e->nama; ?></h3>
          <?php if (!empty($e->nama_guru)): ?>
          <p class="ekskul-pembina">Pembina: <?php echo $e->nama_guru; ?></p>
          <?php endif; ?>
          <p><?php echo $e->deskripsi ?? '-'; ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
      <p style="text-align:center;padding:var(--space-xl) 0">Belum ada data ekstrakurikuler.</p>
    <?php endif; ?>
  </div>
</section>
