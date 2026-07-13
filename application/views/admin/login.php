<style>html,body{padding:0!important;margin:0!important;background:#f5f5f9}</style>
<div style="min-height:100vh;display:flex;align-items:center;justify-content:center;padding:2rem">
  <div class="card" style="max-width:420px;width:100%">
    <div class="card-body p-5">
      <h4 class="text-center mb-1">Login Admin</h4>
      <p class="text-center text-muted mb-4">SMP Negeri Sadi — Panel Administrator</p>

      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
      <?php endif; ?>

      <?php echo form_open('auth/login'); ?>
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" required autofocus>
        </div>
        <div class="mb-3 form-password-toggle">
          <label class="form-label">Password</label>
          <div class="input-group input-group-merge">
            <input type="password" name="password" class="form-control" id="password" required>
            <span class="input-group-text cursor-pointer" onclick="var p=document.getElementById('password');var i=this.querySelector('i');if(p.type=='password'){p.type='text';i.className='bx bx-show'}else{p.type='password';i.className='bx bx-hide'}">
              <i class="bx bx-hide"></i>
            </span>
          </div>
        </div>
        <button type="submit" class="btn btn-primary d-grid w-100">Masuk</button>
      </form>
    </div>
  </div>
</div>

  <script src="<?php echo base_url('assets/sneat')?>/assets/vendor/js/helpers.js"></script>
  <script src="<?php echo base_url('assets/sneat')?>/assets/js/config.js"></script>
  <script src="<?php echo base_url('assets/sneat')?>/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="<?php echo base_url('assets/sneat')?>/assets/vendor/libs/popper/popper.js"></script>
  <script src="<?php echo base_url('assets/sneat')?>/assets/vendor/js/bootstrap.js"></script>
  <script src="<?php echo base_url('assets/sneat')?>/assets/vendor/js/menu.js"></script>
  <script src="<?php echo base_url('assets/sneat')?>/assets/js/main.js"></script>
</body>
</html>
