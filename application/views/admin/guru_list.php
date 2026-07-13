<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Guru & Staff</h4>
    <a href="<?php echo site_url('admin_guru/create'); ?>" class="btn btn-primary">+ Tambah Guru</a>
  </div>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <table class="table table-bordered datatable">
        <thead>
          <tr><th>Foto</th><th>Nama</th><th>Jabatan</th><th>Mapel</th><th>Aksi</th></tr>
        </thead>
        <tbody>
          <?php foreach ($guru as $g): ?>
            <tr>
              <td>
                <?php if ($g->foto): ?>
                  <img src="<?php echo base_url($g->foto); ?>" style="width:40px;height:40px;border-radius:50%;object-fit:cover">
                <?php else: ?>
                  <div class="bg-secondary text-white d-inline-flex align-items-center justify-content-center" style="width:40px;height:40px;border-radius:50%;font-size:14px">?</div>
                <?php endif; ?>
              </td>
              <td><?php echo $g->nama; ?></td>
              <td><?php echo $g->jabatan; ?></td>
              <td><?php echo $g->mapel; ?></td>
              <td>
                <a href="<?php echo site_url('admin_guru/edit/' . $g->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <a href="<?php echo site_url('admin_guru/delete/' . $g->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus guru?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>$(function() { $('.datatable').DataTable(); });</script>
