<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0"><?php echo $title; ?></h4>
    <a href="<?php echo site_url('kepsek/export_pdf/' . $jenis); ?>" class="btn btn-danger" target="_blank">
      <i class="bx bx-download me-1"></i> Export PDF
    </a>
  </div>

  <div class="alert alert-secondary d-flex align-items-center gap-2">
    <i class="bx bx-info-circle"></i>
    <span>Mode baca: Anda hanya dapat melihat data. Untuk mengelola data, gunakan akun Administrator.</span>
  </div>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <table class="table table-bordered datatable">
        <thead>
          <tr>
            <?php if ($rows): ?>
              <?php foreach ($rows[0] as $key => $val): ?>
                <?php if (in_array($key, ['id', 'created_at', 'updated_at', 'foto', 'ttd', 'urutan', 'status', 'id_guru', 'id_kelas', 'kategori_id', 'slug', 'deskripsi'])) continue; ?>
                <th><?php echo ucwords(str_replace('_', ' ', $key)); ?></th>
              <?php endforeach; ?>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
          <?php if ($rows): ?>
            <?php foreach ($rows as $r): ?>
              <tr>
                <?php foreach ($r as $key => $val): ?>
                  <?php if (in_array($key, ['id', 'created_at', 'updated_at', 'foto', 'ttd', 'urutan', 'status', 'id_guru', 'id_kelas', 'kategori_id', 'slug', 'deskripsi'])) continue; ?>
                  <td><?php echo htmlspecialchars((string) $val); ?></td>
                <?php endforeach; ?>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr><td colspan="10" class="text-center py-4">Belum ada data.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
