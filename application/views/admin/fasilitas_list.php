<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Fasilitas</h4>
    <a href="<?php echo site_url('admin_fasilitas/create'); ?>" class="btn btn-primary">+ Tambah Fasilitas</a>
  </div>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <table class="table table-bordered datatable">
        <thead>
          <tr><th>Foto</th><th>Nama</th><th>Kategori</th><th>Urutan</th><th>Aksi</th></tr>
        </thead>
        <tbody>
          <?php foreach ($fasilitas as $f): ?>
            <tr>
              <td>
                <?php if ($f->foto): ?>
                  <img src="<?php echo base_url($f->foto); ?>" style="width:60px;height:40px;object-fit:cover">
                <?php else: ?>
                  <span class="text-muted">-</span>
                <?php endif; ?>
              </td>
              <td><?php echo $f->nama; ?></td>
              <td><?php echo $f->kategori ?? '-'; ?></td>
              <td><?php echo $f->urutan; ?></td>
              <td>
                <a href="<?php echo site_url('admin_fasilitas/edit/' . $f->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <a href="<?php echo site_url('admin_fasilitas/delete/' . $f->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus fasilitas?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>$(function() { $('.datatable').DataTable(); });</script>
