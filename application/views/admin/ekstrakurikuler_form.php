<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><?php echo isset($row) ? 'Edit' : 'Tambah'; ?> Ekstrakurikuler</h4>

  <?php if (validation_errors()): ?>
    <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
  <?php endif; ?>

  <?php echo form_open_multipart(isset($row) ? 'admin_ekstrakurikuler/edit/' . $row->id : 'admin_ekstrakurikuler/create'); ?>
    <div class="row">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
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
              <label class="form-label">Pembina / Guru Pengajar</label>
              <select name="id_guru" class="form-select">
                <option value="">-- Pilih Guru --</option>
                <?php foreach ($guru_list as $g): ?>
                  <option value="<?php echo $g->id; ?>" <?php echo set_select('id_guru', $g->id, isset($row) && $row->id_guru == $g->id); ?>>
                    <?php echo $g->nama; ?> (<?php echo $g->jabatan ?? 'Guru'; ?>)
                  </option>
                <?php endforeach; ?>
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
            <a href="<?php echo site_url('admin_ekstrakurikuler'); ?>" class="btn btn-outline-secondary w-100 mt-2">Batal</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
