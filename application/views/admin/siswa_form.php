<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><?php echo isset($row) ? 'Edit' : 'Tambah'; ?> Siswa</h4>

  <?php if (validation_errors()): ?>
    <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
  <?php endif; ?>

  <?php echo form_open(isset($row) ? 'admin_siswa/edit/' . $row->id : 'admin_siswa/create'); ?>
    <div class="card">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">NISN <span class="text-danger">*</span></label>
            <input type="text" name="nisn" class="form-control" value="<?php echo set_value('nisn', $row->nisn ?? ''); ?>" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
            <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama', $row->nama ?? ''); ?>" required>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <label class="form-label">Agama</label>
            <select name="agama" class="form-select">
              <option value="">-- Pilih --</option>
              <option value="Islam" <?php echo set_select('agama', 'Islam', isset($row) && $row->agama == 'Islam'); ?>>Islam</option>
              <option value="Kristen" <?php echo set_select('agama', 'Kristen', isset($row) && $row->agama == 'Kristen'); ?>>Kristen</option>
              <option value="Katolik" <?php echo set_select('agama', 'Katolik', isset($row) && $row->agama == 'Katolik'); ?>>Katolik</option>
              <option value="Hindu" <?php echo set_select('agama', 'Hindu', isset($row) && $row->agama == 'Hindu'); ?>>Hindu</option>
              <option value="Buddha" <?php echo set_select('agama', 'Buddha', isset($row) && $row->agama == 'Buddha'); ?>>Buddha</option>
              <option value="Konghucu" <?php echo set_select('agama', 'Konghucu', isset($row) && $row->agama == 'Konghucu'); ?>>Konghucu</option>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select">
              <option value="">-- Pilih --</option>
              <option value="L" <?php echo set_select('jenis_kelamin', 'L', isset($row) && $row->jenis_kelamin == 'L'); ?>>Laki-laki</option>
              <option value="P" <?php echo set_select('jenis_kelamin', 'P', isset($row) && $row->jenis_kelamin == 'P'); ?>>Perempuan</option>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label">Kelas</label>
            <select name="id_kelas" class="form-select">
              <option value="">-- Pilih --</option>
              <?php foreach ($kelas_list as $k): ?>
                <option value="<?php echo $k->id; ?>" <?php echo set_select('id_kelas', $k->id, isset($row) && $row->id_kelas == $k->id); ?>>
                  <?php echo $k->nama_kelas; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo site_url('admin_siswa'); ?>" class="btn btn-outline-secondary">Batal</a>
      </div>
    </div>
  </form>
</div>
