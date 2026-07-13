<section class="sub-hero">
  <div class="container">
    <p class="breadcrumb"><a href="<?php echo site_url(); ?>">Beranda</a> / Berita</p>
    <h1>Berita</h1>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="berita-layout">
      <div>
        <?php if ($berita): foreach ($berita as $i => $b): ?>
        <article class="berita-item fade-in" style="transition-delay:<?php echo $i * 0.05; ?>s">
          <a href="<?php echo site_url('berita_detail/' . $b->slug); ?>">
            <img src="<?php echo $b->thumbnail ? base_url($b->thumbnail) : 'https://placehold.co/280x175/1e3a5f/ffffff?text=Berita'; ?>" alt="<?php echo $b->judul; ?>" class="berita-thumb">
          </a>
          <div class="berita-content">
            <div class="card-meta"><span><?php echo date('d M Y', strtotime($b->created_at)); ?></span><?php if (isset($b->kategori_nama)): ?><span><?php echo $b->kategori_nama; ?></span><?php endif; ?></div>
            <a href="<?php echo site_url('berita_detail/' . $b->slug); ?>"><h3><?php echo $b->judul; ?></h3></a>
            <p class="berita-excerpt"><?php echo character_limiter(strip_tags($b->isi), 200); ?></p>
          </div>
        </article>
        <?php endforeach; else: ?>
        <p style="text-align:center;padding:var(--space-xl) 0">Belum ada berita.</p>
        <?php endif; ?>

        <div class="pagination fade-in">
          <a href="#">&laquo;</a>
          <span class="active">1</span>
          <a href="#">2</a>
          <a href="#">3</a>
          <a href="#">&raquo;</a>
        </div>
      </div>

      <aside class="sidebar">
        <div class="sidebar-widget">
          <h4>Pencarian</h4>
          <input type="text" class="sidebar-search" placeholder="Cari berita...">
        </div>
        <div class="sidebar-widget">
          <h4>Kategori</h4>
          <ul>
            <?php if ($kategori): foreach ($kategori as $k): ?>
            <li><a href="<?php echo site_url('berita?kategori=' . $k->slug); ?>"><?php echo $k->nama; ?></a></li>
            <?php endforeach; else: ?>
            <li><a href="#">Belum ada kategori</a></li>
            <?php endif; ?>
          </ul>
        </div>
        <div class="sidebar-widget">
          <h4>Berita Terbaru</h4>
          <ul>
            <?php if ($recent_berita): foreach ($recent_berita as $rb): ?>
            <li><a href="<?php echo site_url('berita_detail/' . $rb->slug); ?>"><?php echo $rb->judul; ?></a></li>
            <?php endforeach; else: ?>
            <li><a href="#">Belum ada berita</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </aside>
    </div>
  </div>
</section>
