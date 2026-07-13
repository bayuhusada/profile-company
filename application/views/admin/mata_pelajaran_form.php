<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><?php echo isset($row) ? 'Edit' : 'Tambah'; ?> Mata Pelajaran</h4>

  <?php if (validation_errors()): ?>
    <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
  <?php endif; ?>

  <?php echo form_open(isset($row) ? 'admin_mata_pelajaran/edit/' . $row->id : 'admin_mata_pelajaran/create'); ?>
    <div class="card">
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label">Nama Pelajaran <span class="text-danger">*</span></label>
          <input type="text" name="nama_pelajaran" class="form-control" value="<?php echo set_value('nama_pelajaran', $row->nama_pelajaran ?? ''); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo site_url('admin_mata_pelajaran'); ?>" class="btn btn-outline-secondary">Batal</a>
      </div>
    </div>
  </form>
</div>
