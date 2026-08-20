<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Dashboard Kepala Sekolah</h4>

  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-muted mb-1">Total Siswa</p>
              <h3 class="mb-0"><?php echo $total_siswa; ?></h3>
            </div>
            <div class="text-primary"><i class="bx bx-user" style="font-size:2.5rem"></i></div>
          </div>
          <a href="<?php echo site_url('kepsek/lihat/siswa'); ?>" class="small text-muted mt-2 d-block">Lihat Data & Export</a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-muted mb-1">Total Guru</p>
              <h3 class="mb-0"><?php echo $total_guru; ?></h3>
            </div>
            <div class="text-success"><i class="bx bx-group" style="font-size:2.5rem"></i></div>
          </div>
          <a href="<?php echo site_url('kepsek/lihat/guru'); ?>" class="small text-muted mt-2 d-block">Lihat Data & Export</a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-muted mb-1">Ekstrakurikuler</p>
              <h3 class="mb-0"><?php echo $total_ekskul; ?></h3>
            </div>
            <div class="text-warning"><i class="bx bx-calendar-star" style="font-size:2.5rem"></i></div>
          </div>
          <a href="<?php echo site_url('kepsek/lihat/ekstrakurikuler'); ?>" class="small text-muted mt-2 d-block">Lihat Data & Export</a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-muted mb-1">Total Fasilitas</p>
              <h3 class="mb-0"><?php echo $total_fasilitas; ?></h3>
            </div>
            <div class="text-info"><i class="bx bx-building-house" style="font-size:2.5rem"></i></div>
          </div>
          <a href="<?php echo site_url('kepsek/lihat/fasilitas'); ?>" class="small text-muted mt-2 d-block">Lihat Data & Export</a>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-muted mb-1">Total Prestasi</p>
              <h3 class="mb-0"><?php echo $total_prestasi; ?></h3>
            </div>
            <div class="text-danger"><i class="bx bx-trophy" style="font-size:2.5rem"></i></div>
          </div>
          <a href="<?php echo site_url('kepsek/lihat/prestasi'); ?>" class="small text-muted mt-2 d-block">Lihat Data & Export</a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-muted mb-1">Total Kelas</p>
              <h3 class="mb-0"><?php echo $total_kelas; ?></h3>
            </div>
            <div class="text-secondary"><i class="bx bx-grid" style="font-size:2.5rem"></i></div>
          </div>
          <a href="<?php echo site_url('kepsek/lihat/kelas'); ?>" class="small text-muted mt-2 d-block">Lihat Data & Export</a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-muted mb-1">Mata Pelajaran</p>
              <h3 class="mb-0"><?php echo $total_mapel; ?></h3>
            </div>
            <div class="text-primary"><i class="bx bx-book" style="font-size:2.5rem"></i></div>
          </div>
          <a href="<?php echo site_url('kepsek/lihat/mata_pelajaran'); ?>" class="small text-muted mt-2 d-block">Lihat Data & Export</a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-muted mb-1">Data Diri</p>
              <h3 class="mb-0"><?php echo $kepsek->nama ?? '-'; ?></h3>
            </div>
            <div class="text-success"><i class="bx bx-user-circle" style="font-size:2.5rem"></i></div>
          </div>
          <a href="<?php echo site_url('kepsek/data_diri'); ?>" class="small text-muted mt-2 d-block">Kelola Data Diri</a>
        </div>
      </div>
    </div>
  </div>
</div>
