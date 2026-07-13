<section class="sub-hero">
  <div class="container">
    <p class="breadcrumb"><a href="<?php echo site_url(); ?>">Beranda</a> / Kontak</p>
    <h1>Kontak</h1>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="kontak-grid">
      <div class="fade-in">
        <span class="section-label">Hubungi Kami</span>
        <h2 style="margin-bottom:var(--space-sm)">Informasi Kontak</h2>

        <div class="kontak-info-item">
          <div class="icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <div>
            <h4>Alamat</h4>
            <p><?php echo $kontak->alamat ?? 'Jl. Pendidikan No. 1, Sadi'; ?></p>
          </div>
        </div>

        <div class="kontak-info-item">
          <div class="icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          </div>
          <div>
            <h4>Telepon</h4>
            <p><?php echo $kontak->telepon ?? '(021) 1234-5678'; ?></p>
          </div>
        </div>

        <div class="kontak-info-item">
          <div class="icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </div>
          <div>
            <h4>Email</h4>
            <p><?php echo $kontak->email ?? 'info@smpnegerisadi.sch.id'; ?></p>
          </div>
        </div>

        <div class="kontak-info-item">
          <div class="icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
          </div>
          <div>
            <h4>WhatsApp</h4>
            <p><?php echo $kontak->whatsapp ?? '+62 812-3456-7890'; ?></p>
          </div>
        </div>

        <div class="kontak-info-item">
          <div class="icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div>
            <h4>Jam Operasional</h4>
            <p><?php echo nl2br($kontak->jam_operasional ?? 'Senin - Jumat: 07.00 - 16.00 WIB'); ?></p>
          </div>
        </div>
      </div>

      <div class="fade-in-up">
        <span class="section-label">Kirim Pesan</span>
        <h2 style="margin-bottom:var(--space-sm)">Form Kontak</h2>
        <form>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" placeholder="Masukkan nama Anda">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" placeholder="Masukkan email Anda">
          </div>
          <div class="form-group">
            <label>Subjek</label>
            <input type="text" placeholder="Masukkan subjek pesan">
          </div>
          <div class="form-group">
            <label>Pesan</label>
            <textarea placeholder="Tulis pesan Anda di sini..."></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Kirim Pesan</button>
        </form>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="maps-container">
    <iframe src="<?php echo $kontak->maps ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.789287666539!2d110.123456!3d-7.123456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMDcnMjQuNCJTIDExMMKwMDcnMjQuNCJF!5e0!3m2!1sid!2sid!4v1'; ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</section>
