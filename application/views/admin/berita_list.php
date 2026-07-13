<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Berita</h4>
    <a href="<?php echo site_url('admin_berita/create'); ?>" class="btn btn-primary">+ Tambah Berita</a>
  </div>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <table class="table table-bordered datatable">
        <thead>
          <tr>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($berita as $b): ?>
            <tr>
              <td><?php echo $b->judul; ?></td>
              <td><?php echo $b->kategori_nama ?? '-'; ?></td>
              <td>
                <?php if ($b->status == 'publish'): ?>
                  <span class="badge bg-success">Publish</span>
                <?php else: ?>
                  <span class="badge bg-secondary">Draft</span>
                <?php endif; ?>
              </td>
              <td><?php echo date('d/m/Y H:i', strtotime($b->created_at)); ?></td>
              <td>
                <a href="<?php echo site_url('admin_berita/edit/' . $b->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <a href="<?php echo site_url('admin_berita/delete/' . $b->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus berita ini?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  $(function() {
    $('.datatable').DataTable();
  });
</script>
