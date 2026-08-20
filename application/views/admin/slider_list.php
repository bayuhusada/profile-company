<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Slider Beranda</h4>
    <a href="<?php echo site_url('admin_slider/create'); ?>" class="btn btn-primary">+ Tambah Slide</a>
  </div>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <table class="table table-bordered datatable">
        <thead>
          <tr><th>Foto</th><th>Judul</th><th>Deskripsi</th><th>Urutan</th><th>Status</th><th>Aksi</th></tr>
        </thead>
        <tbody>
          <?php foreach ($slider as $s): ?>
            <tr>
              <td>
                <?php if (!empty($s->foto)): ?>
                  <img src="<?php echo base_url($s->foto); ?>" style="width:80px;height:40px;object-fit:cover">
                <?php else: ?>
                  <span class="text-muted">-</span>
                <?php endif; ?>
              </td>
              <td><?php echo $s->judul ?? '-'; ?></td>
              <td><?php echo $s->deskripsi ?? '-'; ?></td>
              <td><?php echo $s->urutan; ?></td>
              <td>
                <?php if ($s->status == 1): ?>
                  <span class="badge bg-label-success">Aktif</span>
                <?php else: ?>
                  <span class="badge bg-label-secondary">Nonaktif</span>
                <?php endif; ?>
              </td>
              <td>
                <a href="<?php echo site_url('admin_slider/edit/' . $s->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <a href="<?php echo site_url('admin_slider/delete/' . $s->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus slide ini?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
