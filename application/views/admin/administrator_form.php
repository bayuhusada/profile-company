<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><?php echo isset($row) ? 'Edit' : 'Tambah'; ?> Administrator</h4>

  <?php if (validation_errors()): ?>
    <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
  <?php endif; ?>

  <?php echo form_open_multipart(isset($row) ? 'admin_administrator/edit/' . $row->id : 'admin_administrator/create'); ?>
    <div class="row">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
              <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama', $row->nama ?? ''); ?>" required>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Username <span class="text-danger">*</span></label>
                <input type="text" name="username" class="form-control" value="<?php echo set_value('username', $row->username ?? ''); ?>" <?php echo isset($row) ? 'readonly' : 'required'; ?>>
              </div>
              <div class="col-md-6">
                <label class="form-label">Password <?php echo isset($row) ? '(kosongkan jika tidak diubah)' : '<span class="text-danger">*</span>'; ?></label>
                <input type="password" name="password" class="form-control" <?php echo isset($row) ? '' : 'required'; ?> minlength="6">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Role</label>
              <select name="role" class="form-select">
                <option value="admin" <?php echo set_select('role', 'admin', (isset($row) && $row->role == 'admin')); ?>>Administrator</option>
                <option value="kepsek" <?php echo set_select('role', 'kepsek', (isset($row) && $row->role == 'kepsek')); ?>>Kepala Sekolah</option>
              </select>
              <div class="form-text">Kepala Sekolah hanya bisa melihat data & export PDF, tanpa akses CRUD.</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Foto</label>
              <?php if (isset($row) && !empty($row->foto)): ?>
                <div class="mb-2"><img src="<?php echo base_url($row->foto); ?>" style="max-height:120px;border-radius:8px"></div>
              <?php endif; ?>
              <input type="file" name="foto" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
            <a href="<?php echo site_url('admin_administrator'); ?>" class="btn btn-outline-secondary w-100 mt-2">Batal</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
