<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><?php echo isset($row) ? 'Edit' : 'Tambah'; ?> Guru</h4>

  <?php if (validation_errors()): ?>
    <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
  <?php endif; ?>

  <?php echo form_open_multipart(isset($row) ? 'admin_guru/edit/' . $row->id : 'admin_guru/create'); ?>
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
                <label class="form-label">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" value="<?php echo set_value('jabatan', $row->jabatan ?? ''); ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label">Mata Pelajaran</label>
                <input type="text" name="mapel" class="form-control" value="<?php echo set_value('mapel', $row->mapel ?? ''); ?>">
              </div>
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
            <a href="<?php echo site_url('admin_guru'); ?>" class="btn btn-outline-secondary w-100 mt-2">Batal</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
