<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$columns = [
  'siswa' => [
    ['key' => 'nisn', 'label' => 'NISN'],
    ['key' => 'nama', 'label' => 'Nama'],
    ['key' => 'nama_kelas', 'label' => 'Kelas'],
    ['key' => 'agama', 'label' => 'Agama'],
    ['key' => 'jenis_kelamin', 'label' => 'L/P'],
  ],
  'guru' => [
    ['key' => 'nama', 'label' => 'Nama'],
    ['key' => 'jabatan', 'label' => 'Jabatan'],
    ['key' => 'mapel', 'label' => 'Mata Pelajaran'],
  ],
  'ekstrakurikuler' => [
    ['key' => 'nama', 'label' => 'Nama Ekstrakurikuler'],
    ['key' => 'nama_guru', 'label' => 'Pembina'],
    ['key' => 'deskripsi', 'label' => 'Deskripsi'],
  ],
  'fasilitas' => [
    ['key' => 'nama', 'label' => 'Nama Fasilitas'],
    ['key' => 'kategori', 'label' => 'Kategori'],
    ['key' => 'deskripsi', 'label' => 'Deskripsi'],
  ],
  'prestasi' => [
    ['key' => 'kategori', 'label' => 'Kategori'],
    ['key' => 'judul', 'label' => 'Prestasi'],
    ['key' => 'tahun', 'label' => 'Tahun'],
    ['key' => 'deskripsi', 'label' => 'Deskripsi'],
  ],
  'kelas' => [
    ['key' => 'nama_kelas', 'label' => 'Nama Kelas'],
  ],
  'mata_pelajaran' => [
    ['key' => 'nama_pelajaran', 'label' => 'Mata Pelajaran'],
  ],
];
$cols = $columns[$jenis] ?? [];
$logo = !empty($profil->logo) ? base_url($profil->logo) : base_url('assets/frontend/img/logo-smp.png');
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<style>
  * { font-family: 'DejaVu Sans', sans-serif; }
  body { margin: 0; padding: 0; color: #222; font-size: 11px; }
  .kop { border-bottom: 3px solid #1e3a5f; padding-bottom: 8px; margin-bottom: 14px; }
  .kop table { width: 100%; border-collapse: collapse; }
  .kop .logo-cell { width: 90px; text-align: center; vertical-align: middle; }
  .kop .logo { width: 70px; height: 70px; object-fit: contain; }
  .kop .title { text-align: center; vertical-align: middle; }
  .kop h1 { margin: 0; font-size: 20px; color: #1e3a5f; letter-spacing: 1px; }
  .kop p { margin: 2px 0; font-size: 11px; color: #444; }
  .judul { text-align: center; font-size: 15px; font-weight: bold; margin: 4px 0 2px; text-transform: uppercase; }
  .subjudul { text-align: center; font-size: 11px; color: #555; margin-bottom: 12px; }
  table.data { width: 100%; border-collapse: collapse; }
  table.data th, table.data td { border: 1px solid #999; padding: 4px 6px; }
  table.data th { background: #1e3a5f; color: #fff; font-size: 10px; text-transform: uppercase; }
  table.data td { font-size: 10px; }
  .no { width: 24px; text-align: center; }
  .ttd { margin-top: 30px; width: 100%; text-align: right; }
  .ttd p { margin: 2px 0; font-size: 11px; }
  .ttd .nama { font-weight: bold; }
  .ttd img { max-height: 50px; margin-bottom: 2px; }
  .ttd .garis { border-top: 1px solid #222; display: inline-block; }
</style>
</head>
<body>

  <div class="kop">
    <table>
      <tr>
        <td class="logo-cell"><img src="<?php echo $logo; ?>" class="logo"></td>
        <td class="title">
          <h1><?php echo strtoupper($profil->nama_sekolah ?? 'SMP NEGERI SADI'); ?></h1>
          <p><?php echo nl2br($kontak->alamat ?? $profil->alamat ?? 'Jl. Pendidikan No. 1, Sadi'); ?></p>
          <p>Email: <?php echo $kontak->email ?: $profil->email ?: '-'; ?> &nbsp;|&nbsp; Telp: <?php echo $kontak->telepon ?: $profil->telepon ?: '-'; ?></p>
        </td>
      </tr>
    </table>
  </div>

  <p class="judul"><?php echo $jenis_label; ?></p>
  <p class="subjudul"><?php echo strtoupper($profil->nama_sekolah ?? 'SMP NEGERI SADI'); ?> — Tahun <?php echo date('Y'); ?></p>

  <table class="data">
    <thead>
      <tr>
        <th class="no">No</th>
        <?php foreach ($cols as $c): ?><th><?php echo $c['label']; ?></th><?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <?php if ($rows): $no = 1; foreach ($rows as $r): ?>
      <tr>
        <td class="no"><?php echo $no++; ?></td>
        <?php foreach ($cols as $c): ?>
          <td><?php echo htmlspecialchars((string) ($r->{$c['key']} ?? '-')); ?></td>
        <?php endforeach; ?>
      </tr>
      <?php endforeach; else: ?>
      <tr><td colspan="<?php echo count($cols) + 1; ?>" style="text-align:center">Tidak ada data.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>

  <div class="ttd">
    <p><?php echo strtoupper($profil->nama_sekolah ?? 'SMP NEGERI SADI'); ?>, <?php echo $tgl_export; ?></p>
    <p>Mengetahui,</p>
    <p>Kepala Sekolah</p>
    <p style="height:52px">
      <?php if (!empty($kepsek->ttd) && is_file(FCPATH . $kepsek->ttd)): ?>
        <img src="<?php echo base_url($kepsek->ttd); ?>">
      <?php endif; ?>
    </p>
    <p class="nama"><?php echo $kepsek->nama ?? 'Kepala Sekolah'; ?></p>
    <p>NIP. <?php echo $kepsek->nip ?: '-'; ?></p>
  </div>

</body>
</html>
