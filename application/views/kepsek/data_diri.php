<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Data Diri Kepala Sekolah</h4>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <div class="alert alert-secondary">
    <i class="bx bx-info-circle me-1"></i>
    Data ini dipakai pada <b>blok tanda tangan (Mengetahui)</b> di setiap PDF yang Anda export.
  </div>

  <?php echo form_open_multipart('kepsek/data_diri'); ?>
    <div class="row">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
              <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama', $row->nama ?? ''); ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">NIP</label>
              <input type="text" name="nip" class="form-control" value="<?php echo set_value('nip', $row->nip ?? ''); ?>" placeholder="Contoh: 19700101 199001 1 001">
            </div>
            <div class="mb-3">
              <label class="form-label">Pangkat / Golongan</label>
              <input type="text" name="pangkat" class="form-control" value="<?php echo set_value('pangkat', $row->pangkat ?? ''); ?>" placeholder="Contoh: Pembina, IV/a">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header"><h5 class="mb-0">Tanda Tangan</h5></div>
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Gambar Tanda Tangan</label>
              <?php if (!empty($row->ttd)): ?>
                <div class="mb-2">
                  <img src="<?php echo base_url($row->ttd); ?>" style="max-height:80px;background:#fff;border:1px solid #ddd;padding:4px">
                </div>
              <?php endif; ?>
              <input type="file" name="ttd" class="form-control" accept="image/*">
              <div class="form-text">Format jpg/png/webp, transparan, maks 2MB. Kosongkan jika belum ada.</div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan Data Diri</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
