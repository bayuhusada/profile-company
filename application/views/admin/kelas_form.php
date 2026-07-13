<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><?php echo isset($row) ? 'Edit' : 'Tambah'; ?> Kelas</h4>

  <?php if (validation_errors()): ?>
    <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
  <?php endif; ?>

  <?php echo form_open(isset($row) ? 'admin_kelas/edit/' . $row->id : 'admin_kelas/create'); ?>
    <div class="card">
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label">Nama Kelas <span class="text-danger">*</span></label>
          <input type="text" name="nama_kelas" class="form-control" value="<?php echo set_value('nama_kelas', $row->nama_kelas ?? ''); ?>" placeholder="Contoh: 7A, 8B, 9C" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo site_url('admin_kelas'); ?>" class="btn btn-outline-secondary">Batal</a>
      </div>
    </div>
  </form>
</div>
