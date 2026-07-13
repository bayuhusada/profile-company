<section class="sub-hero">
  <div class="container">
    <p class="breadcrumb"><a href="<?php echo site_url(); ?>">Beranda</a> / <a href="<?php echo site_url('berita'); ?>">Berita</a> / <?php echo $row->judul; ?></p>
    <h1>Detail Berita</h1>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="berita-layout">
      <article>
        <div class="article-header fade-in">
          <div class="article-meta">
            <span><?php echo date('d F Y', strtotime($row->created_at)); ?></span>
            <?php if (isset($row->kategori_nama)): ?><span><?php echo $row->kategori_nama; ?></span><?php endif; ?>
          </div>
          <h1><?php echo $row->judul; ?></h1>
        </div>

        <?php if ($row->thumbnail): ?>
        <img src="<?php echo base_url($row->thumbnail); ?>" alt="<?php echo $row->judul; ?>" class="article-featured-image fade-in-up">
        <?php endif; ?>

        <div class="article-body fade-in">
          <?php echo $row->isi; ?>
        </div>
      </article>

      <aside class="sidebar">
        <div class="sidebar-widget">
          <h4>Kategori</h4>
          <ul>
            <?php if ($kategori): foreach ($kategori as $k): ?>
            <li><a href="<?php echo site_url('berita?kategori=' . $k->slug); ?>"><?php echo $k->nama; ?></a></li>
            <?php endforeach; endif; ?>
          </ul>
        </div>
        <div class="sidebar-widget">
          <h4>Berita Lainnya</h4>
          <ul>
            <?php if ($recent_berita): foreach ($recent_berita as $rb): ?>
            <li><a href="<?php echo site_url('berita_detail/' . $rb->slug); ?>"><?php echo $rb->judul; ?></a></li>
            <?php endforeach; endif; ?>
          </ul>
        </div>
      </aside>
    </div>
  </div>
</section>
