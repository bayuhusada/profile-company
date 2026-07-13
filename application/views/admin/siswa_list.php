<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Siswa</h4>
    <a href="<?php echo site_url('admin_siswa/create'); ?>" class="btn btn-primary">+ Tambah Siswa</a>
  </div>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <table class="table table-bordered datatable">
        <thead>
          <tr><th>NISN</th><th>Nama</th><th>Agama</th><th>JK</th><th>Kelas</th><th>Aksi</th></tr>
        </thead>
        <tbody>
          <?php foreach ($siswa as $s): ?>
            <tr>
              <td><?php echo $s->nisn; ?></td>
              <td><?php echo $s->nama; ?></td>
              <td><?php echo $s->agama ?? '-'; ?></td>
              <td><?php echo $s->jenis_kelamin == 'L' ? 'Laki-laki' : ($s->jenis_kelamin == 'P' ? 'Perempuan' : '-'); ?></td>
              <td><?php echo $s->nama_kelas ?? '-'; ?></td>
              <td>
                <a href="<?php echo site_url('admin_siswa/edit/' . $s->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <a href="<?php echo site_url('admin_siswa/delete/' . $s->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus siswa?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>$(function() { $('.datatable').DataTable(); });</script>
