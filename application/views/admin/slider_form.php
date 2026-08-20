<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><?php echo isset($row) ? 'Edit' : 'Tambah'; ?> Slide</h4>

  <?php if (validation_errors()): ?>
    <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
  <?php endif; ?>

  <?php echo form_open_multipart(isset($row) ? 'admin_slider/edit/' . $row->id : 'admin_slider/create'); ?>
    <div class="row">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Judul Slide <span class="text-danger">*</span></label>
              <input type="text" name="judul" class="form-control" value="<?php echo set_value('judul', $row->judul ?? ''); ?>" required placeholder="Contoh: SMP NEGERI Sadi">
            </div>
            <div class="mb-3">
              <label class="form-label">Deskripsi</label>
              <textarea name="deskripsi" class="form-control" rows="3" placeholder="Contoh: Mencetak Generasi Berprestasi"><?php echo set_value('deskripsi', $row->deskripsi ?? ''); ?></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Foto Slide <span class="text-danger">*</span></label>
              <div class="mb-2">
                <?php if (isset($row) && !empty($row->foto)): ?>
                  <img src="<?php echo base_url($row->foto); ?>" style="max-height:140px;width:100%;object-fit:cover;border-radius:6px">
                <?php else: ?>
                  <div style="background:#f5f5f9;border:1px dashed #ccc;border-radius:6px;padding:30px;text-align:center;color:#888">Belum ada foto</div>
                <?php endif; ?>
              </div>
              <input type="file" name="foto" class="form-control" accept="image/*" <?php echo isset($row) ? '' : 'required'; ?>>
              <div class="form-text">Rekomendasi: 1920x1080, format jpg/png/webp, maks 10MB</div>
            </div>
            <div class="mb-3">
              <label class="form-label">Urutan</label>
              <input type="number" name="urutan" class="form-control" value="<?php echo set_value('urutan', $row->urutan ?? 0); ?>" min="0">
            </div>
            <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" name="status" id="status" value="1" <?php echo set_checkbox('status', '1', (isset($row) && $row->status == 1)); ?>>
              <label class="form-check-label" for="status">Tampilkan di Beranda</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
            <a href="<?php echo site_url('admin_slider'); ?>" class="btn btn-outline-secondary w-100 mt-2">Batal</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
