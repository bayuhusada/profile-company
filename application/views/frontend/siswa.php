<section class="sub-hero">
  <div class="container">
    <p class="breadcrumb"><a href="<?php echo site_url(); ?>">Beranda</a> / Siswa</p>
    <h1>Siswa</h1>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-header fade-in">
      <span class="section-label">Data Siswa</span>
      <h2>Siswa SMP Negeri Sadi</h2>
      <p>Data lengkap siswa aktif berdasarkan kelas</p>
    </div>

    <div class="siswa-search fade-in" style="margin-bottom:var(--space-lg)">
      <input type="text" id="siswaSearch" class="sidebar-search" placeholder="Cari nama atau NISN..." onkeyup="filterSiswa()">
    </div>

    <?php if ($siswa): ?>
    <div style="overflow-x:auto" class="fade-in">
      <table class="siswa-table" id="siswaTable">
        <thead>
          <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Agama</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = ($pagination['offset'] ?? 0) + 1; foreach ($siswa as $s): ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $s->nisn; ?></td>
            <td><?php echo $s->nama; ?></td>
            <td><?php echo $s->agama ?? '-'; ?></td>
            <td><?php echo $s->jenis_kelamin == 'L' ? 'Laki-laki' : ($s->jenis_kelamin == 'P' ? 'Perempuan' : '-'); ?></td>
            <td><?php echo $s->nama_kelas ?? '-'; ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <?php if ($pagination['total_pages'] > 1): ?>
    <div class="pagination fade-in" style="justify-content:center;margin-top:var(--space-lg)" id="siswaPagination">
      <?php for ($p = 1; $p <= $pagination['total_pages']; $p++): ?>
        <a href="<?php echo $pagination['base'] . '?page=' . $p; ?>" class="<?php echo $p == $pagination['page'] ? 'active' : ''; ?>"><?php echo $p; ?></a>
      <?php endfor; ?>
    </div>
    <?php endif; ?>
    <?php else: ?>
      <p style="text-align:center;padding:var(--space-xl) 0">Belum ada data siswa.</p>
    <?php endif; ?>
  </div>
</section>

<script>
function filterSiswa() {
  var input = document.getElementById('siswaSearch');
  var filter = input.value.toUpperCase();
  var table = document.getElementById('siswaTable');
  var tr = table.getElementsByTagName('tr');
  for (var i = 1; i < tr.length; i++) {
    var tds = tr[i].getElementsByTagName('td');
    var match = false;
    for (var j = 1; j <= 2; j++) {
      if (tds[j] && tds[j].textContent.toUpperCase().indexOf(filter) > -1) {
        match = true;
        break;
      }
    }
    tr[i].style.display = match ? '' : 'none';
  }
}
</script>
