<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Prestasi</h4>
    <a href="<?php echo site_url('admin_prestasi/create'); ?>" class="btn btn-primary">+ Tambah Prestasi</a>
  </div>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <table class="table table-bordered datatable">
        <thead>
          <tr><th>Judul</th><th>Kategori</th><th>Tahun</th><th>Aksi</th></tr>
        </thead>
        <tbody>
          <?php foreach ($prestasi as $p): ?>
            <tr>
              <td><?php echo $p->judul; ?></td>
              <td><span class="badge bg-label-<?php echo $p->kategori == 'sekolah' ? 'primary' : ($p->kategori == 'guru' ? 'info' : 'success'); ?>"><?php echo ucfirst($p->kategori); ?></span></td>
              <td><?php echo $p->tahun; ?></td>
              <td>
                <a href="<?php echo site_url('admin_prestasi/edit/' . $p->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <a href="<?php echo site_url('admin_prestasi/delete/' . $p->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus prestasi?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>$(function() { $('.datatable').DataTable(); });</script>
