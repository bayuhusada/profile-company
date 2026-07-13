<section class="sub-hero">
  <div class="container">
    <p class="breadcrumb"><a href="<?php echo site_url(); ?>">Beranda</a> / Tentang Kami</p>
    <h1>Tentang Kami</h1>
  </div>
</section>

<section class="section">
  <div class="container">
    <div data-tabs>
      <div class="tabs">
        <button class="tab-btn active" data-tab="profil">Profil</button>
        <button class="tab-btn" data-tab="sejarah">Sejarah</button>
        <button class="tab-btn" data-tab="visi-misi">Visi & Misi</button>
        <button class="tab-btn" data-tab="sambutan">Sambutan</button>
      </div>

      <div class="tab-panel active" data-panel="profil">
        <div style="max-width:var(--content-narrow)">
          <h2 style="margin-bottom:var(--space-xs)">Profil <?php echo $profil->nama_sekolah ?? 'SMP Negeri Sadi'; ?></h2>
          <p><?php echo nl2br($profil->alamat ?? 'SMP Negeri Sadi adalah lembaga pendidikan menengah pertama negeri yang berkomitmen untuk mencetak generasi muda yang berprestasi, berkarakter, dan berakhlak mulia. Berlokasi di Jl. Pendidikan No. 1, Sadi, sekolah ini telah menjadi pilihan utama masyarakat dalam mendidik putra-putri mereka.'); ?></p>
          <p><?php echo $profil->email ? 'Email: ' . $profil->email : ''; ?></p>
          <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:var(--space-md);margin-top:var(--space-md)">
            <div style="padding:var(--space-md);background:var(--primary-light)">
              <h4 style="font-weight:600;color:var(--primary);margin-bottom:var(--space-xxs)">Visi</h4>
              <p style="margin:0"><?php echo $profil->visi ?? 'Terwujudnya generasi yang berprestasi, berkarakter, dan berakhlak mulia berdasarkan iman dan takwa kepada Tuhan Yang Maha Esa.'; ?></p>
            </div>
            <div style="padding:var(--space-md);background:var(--primary-light)">
              <h4 style="font-weight:600;color:var(--primary);margin-bottom:var(--space-xxs)">Misi</h4>
              <p style="margin:0"><?php echo $profil->misi ?? 'Menyelenggarakan pendidikan berkualitas yang mengembangkan potensi akademik dan non-akademik siswa secara optimal.'; ?></p>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-panel" data-panel="sejarah">
        <div style="max-width:var(--content-narrow)">
          <h2 style="margin-bottom:var(--space-xs)">Sejarah <?php echo $profil->nama_sekolah ?? 'SMP Negeri Sadi'; ?></h2>
          <p><?php echo nl2br($profil->sejarah ?? 'Berdiri sejak tahun 2010, SMP Negeri Sadi dibangun sebagai jawaban atas kebutuhan masyarakat akan pendidikan menengah pertama yang berkualitas di wilayah Sadi dan sekitarnya. Sejak awal berdiri, sekolah ini terus berkembang baik dari segi fasilitas, tenaga pendidik, maupun prestasi yang diraih. Dengan dukungan pemerintah daerah dan partisipasi aktif masyarakat, SMP Negeri Sadi kini menjadi salah satu sekolah unggulan di daerah.'); ?></p>
        </div>
      </div>

      <div class="tab-panel" data-panel="visi-misi">
        <div style="max-width:var(--content-narrow)">
          <h2 style="margin-bottom:var(--space-md)">Visi & Misi</h2>
          <div style="margin-bottom:var(--space-lg)">
            <div style="display:flex;align-items:flex-start;gap:var(--space-xs);margin-bottom:var(--space-sm)">
              <div style="width:4px;height:40px;background:var(--primary);flex-shrink:0"></div>
              <div>
                <h3 style="font-size:var(--text-body);font-weight:600;color:var(--primary);margin-bottom:var(--space-xxs)">Visi</h3>
                <p style="margin:0"><?php echo $profil->visi ?? 'Terwujudnya generasi yang berprestasi, berkarakter, dan berakhlak mulia berdasarkan iman dan takwa kepada Tuhan Yang Maha Esa.'; ?></p>
              </div>
            </div>
            <div style="display:flex;align-items:flex-start;gap:var(--space-xs)">
              <div style="width:4px;height:40px;background:var(--accent-gold);flex-shrink:0"></div>
              <div>
                <h3 style="font-size:var(--text-body);font-weight:600;color:var(--accent-gold);margin-bottom:var(--space-xxs)">Misi</h3>
                <p style="margin:0"><?php echo nl2br($profil->misi ?? '1. Menyelenggarakan pendidikan yang berkualitas dan berorientasi pada pengembangan potensi siswa.\n2. Mengembangkan kurikulum yang adaptif dan relevan dengan kebutuhan zaman.\n3. Membentuk karakter siswa yang disiplin, jujur, dan bertanggung jawab.\n4. Meningkatkan prestasi akademik dan non-akademik siswa.\n5. Menjalin kerjasama yang harmonis dengan orang tua dan masyarakat.'); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-panel" data-panel="sambutan">
        <div style="max-width:var(--content-narrow)">
          <img src="https://placehold.co/200x250/1e3a5f/ffffff?text=Kepsek" alt="Kepala Sekolah" style="width:200px;margin-bottom:var(--space-sm)">
          <h2 style="margin-bottom:var(--space-xs)">Sambutan Kepala Sekolah</h2>
          <p><?php echo nl2br($profil->sambutan ?? 'Assalamualaikum warahmatullahi wabarakatuh. Puji syukur ke hadirat Allah SWT atas segala rahmat dan karunia-Nya sehingga website SMP Negeri Sadi dapat hadir untuk memberikan informasi yang lengkap dan transparan kepada masyarakat. Sebagai Kepala Sekolah, saya mengajak seluruh siswa, guru, dan staf untuk bersama-sama membangun budaya belajar yang positif dan produktif. Kami berkomitmen untuk memberikan pendidikan terbaik bagi generasi penerus bangsa.'); ?></p>
          <p style="margin-top:var(--space-md);margin-bottom:2px;font-weight:600;color:var(--ink)">Kepala Sekolah,</p>
          <p style="color:var(--ink-muted)"><?php echo $profil->nama_sekolah ?? 'SMP Negeri Sadi'; ?></p>
        </div>
      </div>
    </div>
  </div>
</section>
