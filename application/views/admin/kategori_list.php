<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Kategori Berita</h4>
    <a href="<?php echo site_url('admin_kategori/create'); ?>" class="btn btn-primary">+ Tambah Kategori</a>
  </div>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr><th>Nama</th><th>Slug</th><th>Aksi</th></tr>
        </thead>
        <tbody>
          <?php foreach ($kategori as $k): ?>
            <tr>
              <td><?php echo $k->nama; ?></td>
              <td><?php echo $k->slug; ?></td>
              <td>
                <a href="<?php echo site_url('admin_kategori/edit/' . $k->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <a href="<?php echo site_url('admin_kategori/delete/' . $k->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus kategori?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
