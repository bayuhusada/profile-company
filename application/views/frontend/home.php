<!-- Hero -->
<section class="hero">
  <img src="https://placehold.co/1920x1080/1e3a5f/ffffff?text=Foto+Gedung+Sekolah" alt="Gedung SMP Negeri Sadi" class="hero-bg">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <div class="container">
      <p class="hero-subtitle fade-in">Sekolah Berprestasi</p>
      <h1 class="hero-title fade-in">SMP <span class="gold">NEGERI</span> Sadi</h1>
      <div class="hero-divider"></div>
      <p class="hero-tagline fade-in">Mencetak Generasi Berprestasi, Berkarakter, dan Berakhlak Mulia</p>
      <div class="fade-in" style="display:flex;gap:var(--space-xs);flex-wrap:wrap">
        <a href="<?php echo site_url('tentang'); ?>" class="btn btn-primary">Jelajahi Profil</a>
        <a href="<?php echo site_url('ppdb'); ?>" class="btn btn-outline">Informasi PPDB</a>
      </div>
    </div>
  </div>
</section>

<!-- Sambutan -->
<section class="section">
  <div class="container">
    <div class="sambutan-grid">
      <div class="fade-in">
        <span class="section-label">Sambutan</span>
        <h2>Selamat Datang di SMP Negeri Sadi</h2>
        <p><?php echo nl2br($profil->sambutan ?? 'Selamat datang di SMP Negeri Sadi.'); ?></p>
        <p style="margin-bottom:2px;font-weight:600;color:var(--ink)">Kepala Sekolah,</p>
        <p style="font-weight:500;color:var(--ink)"><?php echo $profil->nama_sekolah ?? 'SMP Negeri Sadi'; ?></p>
        <a href="<?php echo site_url('tentang'); ?>" class="btn btn-outline-dark" style="margin-top:var(--space-xs)">Baca Selengkapnya</a>
      </div>
      <div class="fade-in-up">
        <img src="https://placehold.co/600x750/1e3a5f/ffffff?text=Foto+Kepala+Sekolah" alt="Kepala Sekolah" class="sambutan-image">
      </div>
    </div>
  </div>
</section>

<!-- Profil Singkat -->
<section class="section section-alt">
  <div class="container">
    <div class="sambutan-grid" style="direction:rtl">
      <div class="fade-in" style="direction:ltr">
        <span class="section-label">Profil</span>
        <h2>Tentang SMP Negeri Sadi</h2>
        <p><?php echo character_limiter(strip_tags($profil->visi ?? ''), 300); ?></p>
        <a href="<?php echo site_url('tentang'); ?>" class="btn btn-outline-dark" style="margin-top:var(--space-xs)">Pelajari Lebih Lanjut</a>
      </div>
      <div class="fade-in-up" style="direction:ltr">
        <img src="https://placehold.co/600x500/1e3a5f/ffffff?text=Kegiatan+Sekolah" alt="Kegiatan Sekolah" style="width:100%;aspect-ratio:6/5;object-fit:cover">
      </div>
    </div>
  </div>
</section>

<!-- Stats -->
<section class="section">
  <div class="container">
    <div class="stats-grid">
      <div class="fade-in">
        <div class="stat-number" data-count="<?php echo $pengaturan->jumlah_siswa ?? 520; ?>">0</div>
        <div class="stat-label">Siswa Aktif</div>
      </div>
      <div class="fade-in" style="transition-delay:0.1s">
        <div class="stat-number" data-count="<?php echo $pengaturan->jumlah_guru ?? 32; ?>">0</div>
        <div class="stat-label">Guru & Staff</div>
      </div>
      <div class="fade-in" style="transition-delay:0.2s">
        <div class="stat-number" data-count="<?php echo count($prestasi); ?>">0</div>
        <div class="stat-label">Prestasi</div>
      </div>
      <div class="fade-in" style="transition-delay:0.3s">
        <div class="stat-number" data-count="<?php echo $pengaturan->tahun_berdiri ?? 2010; ?>">0</div>
        <div class="stat-label">Tahun Berdiri</div>
      </div>
    </div>
  </div>
</section>

<!-- Berita Terbaru -->
<section class="section section-alt">
  <div class="container">
    <div class="section-header fade-in">
      <span class="section-label">Berita</span>
      <h2>Berita Terbaru</h2>
      <p>Ikuti perkembangan kegiatan dan informasi terbaru dari SMP Negeri Sadi</p>
    </div>
    <div class="berita-grid">
      <?php if ($berita): foreach ($berita as $i => $b): ?>
      <article class="card fade-in" style="transition-delay:<?php echo $i * 0.1; ?>s">
        <a href="<?php echo site_url('berita_detail/' . $b->slug); ?>" class="card-link">
          <img src="<?php echo $b->thumbnail ? base_url($b->thumbnail) : 'https://placehold.co/400x250/1e3a5f/ffffff?text=Berita'; ?>" alt="<?php echo $b->judul; ?>" class="card-image">
          <div class="card-body">
            <div class="card-meta"><span><?php echo date('d M Y', strtotime($b->created_at)); ?></span><?php if (isset($b->kategori_nama)): ?><span><?php echo $b->kategori_nama; ?></span><?php endif; ?></div>
            <h3><?php echo $b->judul; ?></h3>
            <p><?php echo character_limiter(strip_tags($b->isi), 120); ?></p>
          </div>
        </a>
      </article>
      <?php endforeach; else: ?>
      <p style="grid-column:1/-1;text-align:center;padding:var(--space-xl) 0">Belum ada berita.</p>
      <?php endif; ?>
    </div>
    <?php if ($berita): ?>
    <div style="text-align:center;margin-top:var(--space-lg)" class="fade-in">
      <a href="<?php echo site_url('berita'); ?>" class="btn btn-outline-dark">Lihat Semua Berita</a>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- Prestasi -->
<section class="section prestasi-band">
  <div class="container">
    <div class="section-header fade-in">
      <span class="section-label">Prestasi</span>
      <h2>Prestasi Kami</h2>
      <p style="color:rgba(255,255,255,0.6)">Kebanggaan sekolah yang diraih oleh siswa dan guru</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:var(--space-md)">
      <?php $prestasi_home = array_slice($prestasi, 0, 3); ?>
      <?php if ($prestasi_home): foreach ($prestasi_home as $i => $p): ?>
      <div class="prestasi-card fade-in" style="transition-delay:<?php echo $i * 0.1; ?>s">
        <div class="prestasi-icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#c9a84c" stroke-width="1.5"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        </div>
        <div class="prestasi-year"><?php echo $p->tahun; ?></div>
        <h3><?php echo $p->judul; ?></h3>
        <?php if (!empty($p->deskripsi)): ?><p><?php echo $p->deskripsi; ?></p><?php endif; ?>
      </div>
      <?php endforeach; else: ?>
      <p style="grid-column:1/-1;text-align:center;padding:var(--space-xl) 0;color:rgba(255,255,255,0.6)">Belum ada prestasi.</p>
      <?php endif; ?>
    </div>
    <?php if ($prestasi): ?>
    <div style="text-align:center;margin-top:var(--space-lg)" class="fade-in">
      <a href="<?php echo site_url('prestasi'); ?>" class="btn btn-outline" style="border-color:rgba(255,255,255,0.3)">Lihat Semua Prestasi</a>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- Galeri Preview -->
<section class="section">
  <div class="container">
    <div class="section-header fade-in">
      <span class="section-label">Galeri</span>
      <h2>Dokumentasi Kegiatan</h2>
      <p>Momen-momen berharga dalam perjalanan pendidikan di SMP Negeri Sadi</p>
    </div>
    <?php if ($galeri): ?>
    <div class="galeri-grid" style="margin-bottom:var(--space-md)">
      <?php $galeri_home = array_slice($galeri, 0, 4); ?>
      <?php foreach ($galeri_home as $i => $g): ?>
      <div class="galeri-item fade-in" style="transition-delay:<?php echo $i * 0.08; ?>s">
        <img src="<?php echo $g->gambar ? base_url($g->gambar) : 'https://placehold.co/400x400/1e3a5f/ffffff?text=Foto'; ?>" alt="<?php echo $g->judul ?? 'Foto ' . ($i + 1); ?>" data-lightbox="<?php echo base_url($g->gambar); ?>">
      </div>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
    <p style="text-align:center;padding:var(--space-xl) 0">Belum ada galeri.</p>
    <?php endif; ?>
    <div style="text-align:center" class="fade-in">
      <a href="<?php echo site_url('galeri'); ?>" class="btn btn-outline-dark">Lihat Galeri Lengkap</a>
    </div>
  </div>
</section>

<!-- Lokasi -->
<section class="section" style="padding-bottom:0">
  <div class="container">
    <div class="section-header fade-in">
      <span class="section-label">Lokasi</span>
      <h2>Temukan Kami</h2>
      <p>Kunjungi sekolah kami untuk informasi lebih lanjut</p>
    </div>
  </div>
  <div class="maps-container" style="margin-top:var(--space-lg)">
    <iframe src="<?php echo $kontak->maps ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.789287666539!2d110.123456!3d-7.123456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMDcnMjQuNCJTIDExMMKwMDcnMjQuNCJF!5e0!3m2!1sid!2sid!4v1'; ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</section>

<!-- PPDB CTA -->
<section class="cta-band">
  <div class="container">
    <div class="fade-in">
      <span class="section-label" style="color:var(--accent-gold)">PPDB <?php echo date('Y'); ?></span>
      <h2>Penerimaan Peserta Didik Baru</h2>
      <p>Daftarkan putra-putri Anda untuk bergabung menjadi keluarga besar SMP Negeri Sadi</p>
      <a href="<?php echo site_url('ppdb'); ?>" class="btn btn-primary" style="background:var(--canvas);color:var(--primary)">Informasi & Pendaftaran</a>
    </div>
  </div>
</section>
