<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><?php echo isset($row) ? 'Edit' : 'Tambah'; ?> Prestasi</h4>

  <?php if (validation_errors()): ?>
    <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
  <?php endif; ?>

  <?php echo form_open_multipart(isset($row) ? 'admin_prestasi/edit/' . $row->id : 'admin_prestasi/create'); ?>
    <div class="row">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Judul Prestasi <span class="text-danger">*</span></label>
              <input type="text" name="judul" class="form-control" value="<?php echo set_value('judul', $row->judul ?? ''); ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Deskripsi</label>
              <textarea name="deskripsi" class="form-control" rows="5"><?php echo set_value('deskripsi', $row->deskripsi ?? ''); ?></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Kategori</label>
              <select name="kategori" class="form-select">
                <option value="siswa" <?php echo set_select('kategori', 'siswa', isset($row) && $row->kategori == 'siswa'); ?>>Siswa</option>
                <option value="guru" <?php echo set_select('kategori', 'guru', isset($row) && $row->kategori == 'guru'); ?>>Guru</option>
                <option value="sekolah" <?php echo set_select('kategori', 'sekolah', isset($row) && $row->kategori == 'sekolah'); ?>>Sekolah</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Tahun</label>
              <input type="number" name="tahun" class="form-control" min="2000" max="2099" value="<?php echo set_value('tahun', $row->tahun ?? date('Y')); ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Foto</label>
              <?php if (isset($row) && !empty($row->foto)): ?>
                <div class="mb-2"><img src="<?php echo base_url($row->foto); ?>" style="max-height:100px"></div>
              <?php endif; ?>
              <input type="file" name="foto" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
            <a href="<?php echo site_url('admin_prestasi'); ?>" class="btn btn-outline-secondary w-100 mt-2">Batal</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
