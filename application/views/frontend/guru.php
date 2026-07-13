<section class="sub-hero">
  <div class="container">
    <p class="breadcrumb"><a href="<?php echo site_url(); ?>">Beranda</a> / Guru & Staff</p>
    <h1>Guru & Staff</h1>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-header fade-in">
      <span class="section-label">Tenaga Pendidik</span>
      <h2>Guru & Tenaga Kependidikan</h2>
      <p>Profesional dan berpengalaman dalam mendidik generasi penerus bangsa</p>
    </div>

    <div style="max-width:400px;margin:0 auto var(--space-lg)" class="fade-in">
      <input type="text" id="guruSearch" class="sidebar-search" placeholder="Cari nama, jabatan, atau mapel..." onkeyup="filterGuru()">
    </div>

    <div data-tabs>
      <div class="tabs">
        <button class="tab-btn active" data-tab="all">Semua</button>
        <button class="tab-btn" data-tab="guru">Guru</button>
        <button class="tab-btn" data-tab="staff">Staff</button>
      </div>

<?php
$guru_list = $guru ?? [];
$guru_all = $guru_all ?? $guru_list;
$guru_guru = array_filter($guru_all, function($g) { return stripos($g->jabatan ?? '', 'guru') !== false || empty($g->jabatan); });
$staff_list = array_filter($guru_all, function($g) { return $g->jabatan && stripos($g->jabatan, 'guru') === false; });
$pp = $pagination ?? ['page' => 1, 'per_page' => 8, 'total_pages' => 1, 'base' => site_url('guru')];
?>

      <div class="tab-panel active guru-grid" data-panel="all">
        <?php if ($guru_list): foreach ($guru_list as $i => $g): ?>
        <div class="guru-card fade-in" style="transition-delay:<?php echo $i * 0.05; ?>s">
          <img src="<?php echo $g->foto ? base_url($g->foto) : 'https://placehold.co/200x200/1e3a5f/ffffff?text=' . urlencode(substr($g->nama, 0, 1)); ?>" alt="<?php echo $g->nama; ?>" class="guru-photo">
          <h3><?php echo $g->nama; ?></h3>
          <p class="jabatan"><?php echo $g->jabatan ?? 'Guru'; ?></p>
          <p class="mapel"><?php echo $g->mapel ?? '-'; ?></p>
        </div>
        <?php endforeach; else: ?>
        <p style="grid-column:1/-1;text-align:center;padding:var(--space-xl) 0">Belum ada data guru.</p>
        <?php endif; ?>
      </div>

      <div class="tab-panel guru-grid" data-panel="guru">
        <?php $guru_guru_array = array_values($guru_guru); ?>
        <?php if ($guru_guru_array): foreach ($guru_guru_array as $i => $g): ?>
        <div class="guru-card fade-in" style="transition-delay:<?php echo $i * 0.05; ?>s">
          <img src="<?php echo $g->foto ? base_url($g->foto) : 'https://placehold.co/200x200/1e3a5f/ffffff?text=' . urlencode(substr($g->nama, 0, 1)); ?>" alt="<?php echo $g->nama; ?>" class="guru-photo">
          <h3><?php echo $g->nama; ?></h3>
          <p class="jabatan"><?php echo $g->jabatan ?? 'Guru'; ?></p>
          <p class="mapel"><?php echo $g->mapel ?? '-'; ?></p>
        </div>
        <?php endforeach; else: ?>
        <p style="grid-column:1/-1;text-align:center;padding:var(--space-xl) 0">Belum ada data guru.</p>
        <?php endif; ?>
      </div>

      <?php if ($pp['total_pages'] > 1): ?>
      <div class="pagination fade-in" style="justify-content:center;margin-top:var(--space-lg)">
        <?php for ($p = 1; $p <= $pp['total_pages']; $p++): ?>
          <a href="<?php echo $pp['base'] . '?page=' . $p; ?>" class="<?php echo $p == $pp['page'] ? 'active' : ''; ?>"><?php echo $p; ?></a>
        <?php endfor; ?>
      </div>
      <?php endif; ?>

      <div class="tab-panel guru-grid" data-panel="staff">
        <?php $staff_array = array_values($staff_list); ?>
        <?php if ($staff_array): foreach ($staff_array as $i => $g): ?>
        <div class="guru-card fade-in" style="transition-delay:<?php echo $i * 0.05; ?>s">
          <img src="<?php echo $g->foto ? base_url($g->foto) : 'https://placehold.co/200x200/1e3a5f/ffffff?text=' . urlencode(substr($g->nama, 0, 1)); ?>" alt="<?php echo $g->nama; ?>" class="guru-photo">
          <h3><?php echo $g->nama; ?></h3>
          <p class="jabatan"><?php echo $g->jabatan; ?></p>
          <p class="mapel"><?php echo $g->mapel ?? '-'; ?></p>
        </div>
        <?php endforeach; else: ?>
        <p style="grid-column:1/-1;text-align:center;padding:var(--space-xl) 0">Belum ada data staff.</p>
        <?php endif; ?>
      </div>
    </div>
    </div>
  </div>
</section>

<script>
function filterGuru() {
  var input = document.getElementById('guruSearch');
  var filter = input.value.toUpperCase();
  var cards = document.querySelectorAll('.guru-card');
  for (var i = 0; i < cards.length; i++) {
    var text = cards[i].textContent || cards[i].innerText;
    cards[i].style.display = text.toUpperCase().indexOf(filter) > -1 ? '' : 'none';
  }
}
</script>
