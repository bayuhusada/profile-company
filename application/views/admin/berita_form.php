<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><?php echo isset($row) ? 'Edit' : 'Tambah'; ?> Berita</h4>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <?php if (validation_errors()): ?>
    <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
  <?php endif; ?>

  <?php echo form_open_multipart(isset($row) ? 'admin_berita/edit/' . $row->id : 'admin_berita/create'); ?>
    <div class="row">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Judul Berita <span class="text-danger">*</span></label>
              <input type="text" name="judul" class="form-control" value="<?php echo set_value('judul', $row->judul ?? ''); ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Isi Berita <span class="text-danger">*</span></label>
              <textarea name="isi" id="ckeditor" class="form-control" rows="15"><?php echo set_value('isi', $row->isi ?? ''); ?></textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Kategori</label>
              <select name="kategori_id" class="form-select">
                <option value="">— Pilih —</option>
                <?php foreach ($kategori as $id => $nama): ?>
                  <option value="<?php echo $id; ?>" <?php echo set_select('kategori_id', $id, isset($row) && $row->kategori_id == $id); ?>><?php echo $nama; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Thumbnail</label>
              <?php if (isset($row) && !empty($row->thumbnail)): ?>
                <div class="mb-2"><img src="<?php echo base_url($row->thumbnail); ?>" style="max-height:120px"></div>
              <?php endif; ?>
              <input type="file" name="thumbnail" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Status</label>
              <select name="status" class="form-select">
                <option value="draft" <?php echo set_select('status', 'draft', isset($row) && $row->status == 'draft'); ?>>Draft</option>
                <option value="publish" <?php echo set_select('status', 'publish', isset($row) && $row->status == 'publish'); ?>>Publish</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
            <a href="<?php echo site_url('admin_berita'); ?>" class="btn btn-outline-secondary w-100 mt-2">Batal</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
  ClassicEditor.create(document.querySelector('#ckeditor'), {
    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'undo', 'redo'],
  }).catch(function(error) { console.error(error); });
</script>
