<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Galeri Foto</h4>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">+ Upload Foto</button>
  </div>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <div class="row g-3">
    <?php foreach ($galeri as $g): ?>
      <div class="col-md-3 col-sm-4 col-6">
        <div class="card">
          <img src="<?php echo base_url($g->gambar); ?>" class="card-img-top" style="aspect-ratio:1;object-fit:cover">
          <div class="card-body p-2">
            <form action="<?php echo site_url('admin_galeri/edit_judul/' . $g->id); ?>" method="post" class="mb-2">
              <input type="text" name="judul" class="form-control form-control-sm" value="<?php echo $g->judul; ?>">
            </form>
            <a href="<?php echo site_url('admin_galeri/delete/' . $g->id); ?>" class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('Hapus foto?')">Hapus</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <?php if (empty($galeri)): ?>
      <div class="col-12"><p class="text-muted">Belum ada foto. Klik "Upload Foto" untuk menambahkan.</p></div>
    <?php endif; ?>
  </div>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php echo form_open_multipart('admin_galeri/upload'); ?>
        <div class="modal-header">
          <h5 class="modal-title">Upload Foto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Judul (opsional)</label>
            <input type="text" name="judul" class="form-control" placeholder="Nama kegiatan">
          </div>
          <div class="mb-3">
            <label class="form-label">Pilih Foto (bisa lebih dari 1)</label>
            <input type="file" name="gambar[]" class="form-control" multiple accept="image/*" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
      </form>
    </div>
  </div>
</div>
