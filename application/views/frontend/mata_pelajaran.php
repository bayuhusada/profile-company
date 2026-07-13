<section class="sub-hero">
  <div class="container">
    <p class="breadcrumb"><a href="<?php echo site_url(); ?>">Beranda</a> / Mata Pelajaran</p>
    <h1>Mata Pelajaran</h1>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-header fade-in">
      <span class="section-label">Kurikulum</span>
      <h2>Mata Pelajaran</h2>
      <p>Daftar mata pelajaran yang diajarkan di SMP Negeri Sadi</p>
    </div>

    <?php if ($mata_pelajaran): ?>
    <div class="mapel-grid">
      <?php foreach ($mata_pelajaran as $i => $m): ?>
      <div class="mapel-card fade-in" style="transition-delay:<?php echo $i * 0.05; ?>s">
        <div class="mapel-icon">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="1.5"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
        </div>
        <h3><?php echo $m->nama_pelajaran; ?></h3>
      </div>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
      <p style="text-align:center;padding:var(--space-xl) 0">Belum ada data mata pelajaran.</p>
    <?php endif; ?>
  </div>
</section>
