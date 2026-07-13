<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">PPDB</h4>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <?php echo form_open_multipart('admin_ppdb'); ?>
    <div class="row">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Judul Halaman</label>
              <input type="text" name="judul" class="form-control" value="<?php echo set_value('judul', $ppdb->judul ?? ''); ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Konten (Persyaratan, Alur, Jadwal, dll)</label>
              <textarea name="isi" id="ckeditor" class="form-control" rows="15"><?php echo set_value('isi', $ppdb->isi ?? ''); ?></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Brosur (PDF/Gambar)</label>
              <?php if (!empty($ppdb->brosur)): ?>
                <div class="mb-2"><a href="<?php echo base_url($ppdb->brosur); ?>" target="_blank">Lihat brosur</a></div>
              <?php endif; ?>
              <input type="file" name="brosur" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
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
