<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Pengaturan Website</h4>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <?php echo form_open('admin_pengaturan'); ?>
    <div class="card">
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label">Nama Website</label>
          <input type="text" name="nama_website" class="form-control" value="<?php echo set_value('nama_website', $setting->nama_website ?? ''); ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Meta Description</label>
          <textarea name="meta_description" class="form-control" rows="3"><?php echo set_value('meta_description', $setting->meta_description ?? ''); ?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Meta Keyword (pisahkan dengan koma)</label>
          <input type="text" name="meta_keyword" class="form-control" value="<?php echo set_value('meta_keyword', $setting->meta_keyword ?? ''); ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Copyright</label>
          <input type="text" name="copyright" class="form-control" value="<?php echo set_value('copyright', $setting->copyright ?? ''); ?>">
        </div>
        <hr class="my-4">
        <h5 class="mb-3">Statistik Beranda</h5>
        <div class="row">
          <div class="mb-3 col-md-4">
            <label class="form-label">Jumlah Siswa Aktif</label>
            <input type="number" name="jumlah_siswa" class="form-control" value="<?php echo set_value('jumlah_siswa', $setting->jumlah_siswa ?? 520); ?>">
          </div>
          <div class="mb-3 col-md-4">
            <label class="form-label">Jumlah Guru & Staff</label>
            <input type="number" name="jumlah_guru" class="form-control" value="<?php echo set_value('jumlah_guru', $setting->jumlah_guru ?? 32); ?>">
          </div>
          <div class="mb-3 col-md-4">
            <label class="form-label">Tahun Berdiri</label>
            <input type="number" name="tahun_berdiri" class="form-control" value="<?php echo set_value('tahun_berdiri', $setting->tahun_berdiri ?? 2010); ?>">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
</div>
