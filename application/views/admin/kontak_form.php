<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Kontak</h4>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <?php echo form_open('admin_kontak'); ?>
    <div class="card">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3"><?php echo set_value('alamat', $kontak->alamat ?? ''); ?></textarea>
          </div>
          <div class="col-md-6">
            <label class="form-label">Google Maps Embed URL</label>
            <input type="text" name="maps" class="form-control" value="<?php echo set_value('maps', $kontak->maps ?? ''); ?>">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo set_value('email', $kontak->email ?? ''); ?>">
          </div>
          <div class="col-md-4">
            <label class="form-label">Telepon</label>
            <input type="text" name="telepon" class="form-control" value="<?php echo set_value('telepon', $kontak->telepon ?? ''); ?>">
          </div>
          <div class="col-md-4">
            <label class="form-label">WhatsApp</label>
            <input type="text" name="whatsapp" class="form-control" value="<?php echo set_value('whatsapp', $kontak->whatsapp ?? ''); ?>">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Jam Operasional</label>
          <input type="text" name="jam_operasional" class="form-control" value="<?php echo set_value('jam_operasional', $kontak->jam_operasional ?? ''); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
</div>
