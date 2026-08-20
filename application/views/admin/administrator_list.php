<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Administrator</h4>
    <a href="<?php echo site_url('admin_administrator/create'); ?>" class="btn btn-primary">+ Tambah Admin</a>
  </div>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>
  <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr><th>Nama</th><th>Username</th><th>Role</th><th>Bergabung</th><th>Aksi</th></tr>
        </thead>
        <tbody>
          <?php foreach ($admin as $a): ?>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <?php if ($a->foto): ?>
                    <img src="<?php echo base_url($a->foto); ?>" style="width:32px;height:32px;border-radius:50%;object-fit:cover">
                  <?php endif; ?>
                  <?php echo $a->nama; ?>
                  <?php if ($a->id == $this->session->userdata('admin_id')): ?>
                    <span class="badge bg-label-primary">Anda</span>
                  <?php endif; ?>
                </div>
              </td>
              <td><?php echo $a->username; ?></td>
              <td>
                <?php if ($a->role == 'kepsek'): ?>
                  <span class="badge bg-label-warning">Kepala Sekolah</span>
                <?php else: ?>
                  <span class="badge bg-label-primary">Administrator</span>
                <?php endif; ?>
              </td>
              <td><?php echo $a->created_at ? date('d/m/Y', strtotime($a->created_at)) : '-'; ?></td>
              <td>
                <a href="<?php echo site_url('admin_administrator/edit/' . $a->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <?php if ($a->id != $this->session->userdata('admin_id')): ?>
                  <a href="<?php echo site_url('admin_administrator/delete/' . $a->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus admin ini?')">Hapus</a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
