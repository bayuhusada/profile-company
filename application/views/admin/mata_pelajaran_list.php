<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Mata Pelajaran</h4>
    <a href="<?php echo site_url('admin_mata_pelajaran/create'); ?>" class="btn btn-primary">+ Tambah Mapel</a>
  </div>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <table class="table table-bordered datatable">
        <thead>
          <tr><th>No</th><th>Nama Pelajaran</th><th>Aksi</th></tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($mata_pelajaran as $m): ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $m->nama_pelajaran; ?></td>
              <td>
                <a href="<?php echo site_url('admin_mata_pelajaran/edit/' . $m->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <a href="<?php echo site_url('admin_mata_pelajaran/delete/' . $m->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus mata pelajaran?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>$(function() { $('.datatable').DataTable(); });</script>
