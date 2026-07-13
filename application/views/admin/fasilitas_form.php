<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><?php echo isset($row) ? 'Edit' : 'Tambah'; ?> Fasilitas</h4>

  <?php if (validation_errors()): ?>
    <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
  <?php endif; ?>

  <?php echo form_open_multipart(isset($row) ? 'admin_fasilitas/edit/' . $row->id : 'admin_fasilitas/create'); ?>
    <div class="row">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Nama Fasilitas <span class="text-danger">*</span></label>
              <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama', $row->nama ?? ''); ?>" required>
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
                <option value="">-- Pilih --</option>
                <option value="Ruang Kelas" <?php echo set_select('kategori', 'Ruang Kelas', isset($row) && $row->kategori == 'Ruang Kelas'); ?>>Ruang Kelas</option>
                <option value="Perpustakaan" <?php echo set_select('kategori', 'Perpustakaan', isset($row) && $row->kategori == 'Perpustakaan'); ?>>Perpustakaan</option>
                <option value="Laboratorium" <?php echo set_select('kategori', 'Laboratorium', isset($row) && $row->kategori == 'Laboratorium'); ?>>Laboratorium</option>
                <option value="Olahraga" <?php echo set_select('kategori', 'Olahraga', isset($row) && $row->kategori == 'Olahraga'); ?>>Olahraga</option>
                <option value="Ibadah" <?php echo set_select('kategori', 'Ibadah', isset($row) && $row->kategori == 'Ibadah'); ?>>Ibadah</option>
                <option value="Lainnya" <?php echo set_select('kategori', 'Lainnya', isset($row) && $row->kategori == 'Lainnya'); ?>>Lainnya</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Urutan</label>
              <input type="number" name="urutan" class="form-control" value="<?php echo set_value('urutan', $row->urutan ?? 0); ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Foto</label>
              <?php if (isset($row) && !empty($row->foto)): ?>
                <div class="mb-2"><img src="<?php echo base_url($row->foto); ?>" style="max-height:100px"></div>
              <?php endif; ?>
              <input type="file" name="foto" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
            <a href="<?php echo site_url('admin_fasilitas'); ?>" class="btn btn-outline-secondary w-100 mt-2">Batal</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
