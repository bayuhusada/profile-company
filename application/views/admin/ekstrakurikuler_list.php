<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Ekstrakurikuler</h4>
    <a href="<?php echo site_url('admin_ekstrakurikuler/create'); ?>" class="btn btn-primary">+ Tambah Ekstrakurikuler</a>
  </div>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <table class="table table-bordered datatable">
        <thead>
          <tr><th>Foto</th><th>Nama</th><th>Pembina</th><th>Urutan</th><th>Aksi</th></tr>
        </thead>
        <tbody>
          <?php foreach ($ekstrakurikuler as $e): ?>
            <tr>
              <td>
                <?php if ($e->foto): ?>
                  <img src="<?php echo base_url($e->foto); ?>" style="width:60px;height:40px;object-fit:cover">
                <?php else: ?>
                  <span class="text-muted">-</span>
                <?php endif; ?>
              </td>
              <td><?php echo $e->nama; ?></td>
              <td><?php echo $e->nama_guru ?? '-'; ?></td>
              <td><?php echo $e->urutan; ?></td>
              <td>
                <a href="<?php echo site_url('admin_ekstrakurikuler/edit/' . $e->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <a href="<?php echo site_url('admin_ekstrakurikuler/delete/' . $e->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus ekstrakurikuler?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>$(function() { $('.datatable').DataTable(); });</script>
