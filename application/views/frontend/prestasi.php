<section class="sub-hero">
  <div class="container">
    <p class="breadcrumb"><a href="<?php echo site_url(); ?>">Beranda</a> / Prestasi</p>
    <h1>Prestasi</h1>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-header fade-in">
      <span class="section-label">Pencapaian</span>
      <h2>Prestasi Kami</h2>
      <p>Berbagai prestasi membanggakan yang diraih oleh siswa dan guru</p>
    </div>

    <div data-tabs>
      <div class="tabs">
        <button class="tab-btn active" data-tab="semua">Semua</button>
        <button class="tab-btn" data-tab="sekolah">Sekolah</button>
        <button class="tab-btn" data-tab="guru">Guru</button>
        <button class="tab-btn" data-tab="siswa">Siswa</button>
      </div>

<?php
$prestasi_list = $prestasi ?? [];
$p_sekolah = array_filter($prestasi_list, function($p) { return stripos($p->kategori ?? '', 'sekolah') !== false; });
$p_guru = array_filter($prestasi_list, function($p) { return stripos($p->kategori ?? '', 'guru') !== false; });
$p_siswa = array_filter($prestasi_list, function($p) { return stripos($p->kategori ?? '', 'siswa') !== false; });
?>

      <div class="tab-panel active" data-panel="semua">
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:var(--space-md)">
          <?php if ($prestasi_list): foreach ($prestasi_list as $i => $p): ?>
          <div class="prestasi-card fade-in" style="transition-delay:<?php echo $i * 0.05; ?>s">
            <div class="prestasi-year"><?php echo $p->tahun; ?></div>
            <h3><?php echo $p->judul; ?></h3>
            <?php if (!empty($p->deskripsi)): ?><p><?php echo $p->deskripsi; ?></p><?php endif; ?>
          </div>
          <?php endforeach; else: ?>
          <p style="grid-column:1/-1;text-align:center;padding:var(--space-xl) 0">Belum ada data prestasi.</p>
          <?php endif; ?>
        </div>
      </div>

      <div class="tab-panel" data-panel="sekolah">
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:var(--space-md)">
          <?php if ($p_sekolah): foreach ($p_sekolah as $i => $p): ?>
          <div class="prestasi-card fade-in" style="transition-delay:<?php echo $i * 0.05; ?>s">
            <div class="prestasi-year"><?php echo $p->tahun; ?></div>
            <h3><?php echo $p->judul; ?></h3>
            <p><?php echo $p->deskripsi ?? 'Sekolah'; ?></p>
          </div>
          <?php endforeach; else: ?>
          <p style="grid-column:1/-1;text-align:center;padding:var(--space-xl) 0">Belum ada prestasi kategori sekolah.</p>
          <?php endif; ?>
        </div>
      </div>

      <div class="tab-panel" data-panel="guru">
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:var(--space-md)">
          <?php if ($p_guru): foreach ($p_guru as $i => $p): ?>
          <div class="prestasi-card fade-in" style="transition-delay:<?php echo $i * 0.05; ?>s">
            <div class="prestasi-year"><?php echo $p->tahun; ?></div>
            <h3><?php echo $p->judul; ?></h3>
            <p><?php echo $p->deskripsi ?? 'Guru'; ?></p>
          </div>
          <?php endforeach; else: ?>
          <p style="grid-column:1/-1;text-align:center;padding:var(--space-xl) 0">Belum ada prestasi kategori guru.</p>
          <?php endif; ?>
        </div>
      </div>

      <div class="tab-panel" data-panel="siswa">
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:var(--space-md)">
          <?php if ($p_siswa): foreach ($p_siswa as $i => $p): ?>
          <div class="prestasi-card fade-in" style="transition-delay:<?php echo $i * 0.05; ?>s">
            <div class="prestasi-year"><?php echo $p->tahun; ?></div>
            <h3><?php echo $p->judul; ?></h3>
            <p><?php echo $p->deskripsi ?? 'Siswa'; ?></p>
          </div>
          <?php endforeach; else: ?>
          <p style="grid-column:1/-1;text-align:center;padding:var(--space-xl) 0">Belum ada prestasi kategori siswa.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
