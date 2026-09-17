<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Profil Sekolah</h4>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <?php echo form_open_multipart('admin_profil'); ?>
    <div class="row">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header"><h5 class="mb-0">Informasi Umum</h5></div>
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Nama Sekolah</label>
              <input type="text" name="nama_sekolah" class="form-control" value="<?php echo set_value('nama_sekolah', $profil->nama_sekolah ?? ''); ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Nama Website</label>
              <input type="text" class="form-control" value="<?php echo set_value('nama_sekolah', $profil->nama_sekolah ?? ''); ?>" disabled>
              <div class="form-text">Nama website mengikuti Nama Sekolah di atas.</div>
            </div>
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-header"><h5 class="mb-0">Konten Sekolah</h5></div>
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Visi</label>
              <textarea name="visi" class="form-control" rows="4"><?php echo set_value('visi', $profil->visi ?? ''); ?></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Misi</label>
              <textarea name="misi" class="form-control" rows="6"><?php echo set_value('misi', $profil->misi ?? ''); ?></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Sejarah</label>
              <textarea name="sejarah" class="form-control" rows="6"><?php echo set_value('sejarah', $profil->sejarah ?? ''); ?></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Sambutan Kepala Sekolah</label>
              <textarea name="sambutan" class="form-control" rows="6"><?php echo set_value('sambutan', $profil->sambutan ?? ''); ?></textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header"><h5 class="mb-0">Logo & Favicon</h5></div>
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Logo</label>
              <?php if (!empty($profil->logo)): ?>
                <div class="mb-2">
                  <img src="<?php echo base_url($profil->logo); ?>" style="max-height:80px">
                  <a href="<?php echo site_url('admin_profil/hapus_gambar/logo'); ?>" class="btn btn-sm btn-outline-danger ms-2 align-top" onclick="return confirm('Hapus logo?')">Hapus</a>
                </div>
              <?php endif; ?>
              <input type="file" name="logo" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Favicon</label>
              <?php if (!empty($profil->favicon)): ?>
                <div class="mb-2">
                  <img src="<?php echo base_url($profil->favicon); ?>" style="max-height:32px">
                  <a href="<?php echo site_url('admin_profil/hapus_gambar/favicon'); ?>" class="btn btn-sm btn-outline-danger ms-2 align-top" onclick="return confirm('Hapus favicon?')">Hapus</a>
                </div>
              <?php endif; ?>
              <input type="file" name="favicon" class="form-control">
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
      </div>
    </div>
  </form>
</div>
