<section class="sub-hero">
  <div class="container">
    <p class="breadcrumb"><a href="<?php echo site_url(); ?>">Beranda</a> / PPDB</p>
    <h1>PPDB 2026</h1>
  </div>
</section>

<section class="section">
  <div class="container">
    <div style="max-width:var(--content-narrow);margin:0 auto">
      <div class="section-header fade-in" style="text-align:left">
        <span class="section-label">Pendaftaran</span>
        <h2><?php echo $ppdb->judul ?? 'Penerimaan Peserta Didik Baru'; ?></h2>
        <p>Informasi lengkap mengenai pendaftaran siswa baru di <?php echo $site_profil->nama_sekolah ?? 'SMP Negeri Sadi'; ?> tahun ajaran <?php echo date('Y') . '/' . (date('Y') + 1); ?></p>
      </div>

      <?php if (!empty($ppdb->isi)): ?>
        <div class="ppdb-content fade-in" style="color:var(--ink-muted);margin-bottom:var(--space-lg)">
          <?php echo $ppdb->isi; ?>
        </div>
      <?php else: ?>
        <div class="accordion fade-in">
          <div class="accordion-item active">
            <button class="accordion-header" onclick="toggleAccordion(this)">
              <span>Persyaratan Pendaftaran</span>
              <span class="icon">+</span>
            </button>
            <div class="accordion-body">
              <ol style="margin:0;padding-left:var(--space-lg);color:var(--ink-muted)">
                <li style="margin-bottom:var(--space-xs)">Ijazah / SKL SD/MI atau sederajat</li>
                <li style="margin-bottom:var(--space-xs)">Kartu Keluarga (KK)</li>
                <li style="margin-bottom:var(--space-xs)">Akte Kelahiran</li>
                <li style="margin-bottom:var(--space-xs)">Pas Foto 3x4 sebanyak 4 lembar</li>
                <li style="margin-bottom:var(--space-xs)">Sertifikat prestasi (jika ada)</li>
                <li>Surat rekomendasi dari sekolah asal (jika pindahan)</li>
              </ol>
            </div>
          </div>

          <div class="accordion-item">
            <button class="accordion-header" onclick="toggleAccordion(this)">
              <span>Jalur Pendaftaran</span>
              <span class="icon">+</span>
            </button>
            <div class="accordion-body" style="display:none">
              <ul style="margin:0;padding-left:var(--space-lg);color:var(--ink-muted)">
                <li style="margin-bottom:var(--space-xs)"><strong>Jalur Zonasi</strong> &mdash; Berdasarkan domisili sesuai Kartu Keluarga</li>
                <li style="margin-bottom:var(--space-xs)"><strong>Jalur Afirmasi</strong> &mdash; Untuk siswa kurang mampu / pemegang KIP</li>
                <li style="margin-bottom:var(--space-xs)"><strong>Jalur Prestasi</strong> &mdash; Berdasarkan prestasi akademik / non-akademik</li>
                <li><strong>Jalur Perpindahan Tugas Orang Tua</strong> &mdash; Untuk anak yang orang tuanya pindah tugas</li>
              </ul>
            </div>
          </div>

          <div class="accordion-item">
            <button class="accordion-header" onclick="toggleAccordion(this)">
              <span>Alur Pendaftaran</span>
              <span class="icon">+</span>
            </button>
            <div class="accordion-body" style="display:none">
              <ol style="margin:0;padding-left:var(--space-lg);color:var(--ink-muted)">
                <li style="margin-bottom:var(--space-xs)">Mengisi formulir pendaftaran secara online atau datang langsung ke sekolah</li>
                <li style="margin-bottom:var(--space-xs)">Melengkapi berkas persyaratan</li>
                <li style="margin-bottom:var(--space-xs)">Verifikasi berkas oleh panitia PPDB</li>
                <li style="margin-bottom:var(--space-xs)">Pengumuman hasil seleksi</li>
                <li style="margin-bottom:var(--space-xs)">Daftar ulang bagi siswa yang diterima</li>
                <li>Mengikuti Masa Orientasi Siswa (MOS)</li>
              </ol>
            </div>
          </div>

          <div class="accordion-item">
            <button class="accordion-header" onclick="toggleAccordion(this)">
              <span>Jadwal Penting</span>
              <span class="icon">+</span>
            </button>
            <div class="accordion-body" style="display:none">
              <div style="overflow-x:auto">
                <table style="width:100%;border-collapse:collapse;color:var(--ink-muted)">
                  <thead>
                    <tr style="background:var(--primary-light)">
                      <th style="padding:var(--space-sm);text-align:left;font-weight:600">Kegiatan</th>
                      <th style="padding:var(--space-sm);text-align:left;font-weight:600">Tanggal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr style="border-bottom:1px solid var(--border)"><td style="padding:var(--space-sm)">Pendaftaran Online</td><td style="padding:var(--space-sm)">Juni &ndash; Juli <?php echo date('Y'); ?></td></tr>
                    <tr style="border-bottom:1px solid var(--border)"><td style="padding:var(--space-sm)">Verifikasi Berkas</td><td style="padding:var(--space-sm)">Juli <?php echo date('Y'); ?></td></tr>
                    <tr style="border-bottom:1px solid var(--border)"><td style="padding:var(--space-sm)">Pengumuman</td><td style="padding:var(--space-sm)">Juli <?php echo date('Y'); ?></td></tr>
                    <tr><td style="padding:var(--space-sm)">Daftar Ulang</td><td style="padding:var(--space-sm)">Juli <?php echo date('Y'); ?></td></tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <p style="color:var(--ink-muted);font-size:var(--text-small);margin-top:var(--space-md)" class="fade-in">* Informasi ini bersifat umum. Untuk detail lebih lanjut, hubungi panitia PPDB.</p>
      <?php endif; ?>

      <div style="text-align:center;margin-top:var(--space-lg)" class="fade-in">
        <p style="margin-bottom:var(--space-xs)">Download brosur PPDB untuk informasi lengkap</p>
        <a href="<?php echo $ppdb->brosur ? base_url($ppdb->brosur) : '#'; ?>" class="btn btn-primary"<?php if (!$ppdb->brosur): ?> onclick="return false;"<?php endif; ?>>Download Brosur (PDF)</a>
      </div>
    </div>
  </div>
</section>

<script>
function toggleAccordion(btn) {
  var item = btn.parentElement;
  var body = item.querySelector('.accordion-body');
  var icon = btn.querySelector('.icon');
  var isOpen = body.style.display !== 'none';
  body.style.display = isOpen ? 'none' : 'block';
  item.classList.toggle('active', !isOpen);
  if (icon) {
    icon.textContent = isOpen ? '+' : '\u2212';
  }
}
</script>
