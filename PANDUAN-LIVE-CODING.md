# PANDUAN LIVE CODING — SMP Negeri Sadi

Dokumen ini menjelaskan alur kerja seluruh fitur di website SMP Negeri Sadi, berikut **pola baku** cara menambahkan fitur baru. Baca urut dari atas ke bawah sebelum mulai ngoding.

---

## 1. Arsitektur (MVC CodeIgniter 3)

```
Browser → URL → index.php → Router (routes.php) → Controller → Model → View → HTML
                                                   │                        │
                                             (ambil data DB)        (render tampilan)
```

| Layer | Folder | Tugas |
|-------|--------|-------|
| **Route** | `application/config/routes.php` | Menetapkan URL → Controller/method |
| **Controller** | `application/controllers/` | Logika: ambil data, proses form, load view |
| **Model** | `application/models/` | Query database |
| **View** | `application/views/` | Tampilan HTML |

**Aturan emas:**
- Controller TIDAK berisi query langsung — selalu lewat model.
- Model TIDAK berisi HTML & TIDAK berisi logika tampilan.
- View TIDAK berisi logika berat; cukup `foreach` / `if`, lalu dihancurkan dengan `htmlspecialchars()` sebelum ditampilkan.

---

## 2. Alur Request Frontend (halaman publik)

Contoh: user buka `/tentang`

**Step 1 — Pencarian route** (`application/config/routes.php`)
```php
$route['tentang'] = 'home/tentang';
```
Router menirmukan `/tentang` ke method `tentang()` di controller `Home`.

**Step 2 — Controller** (`application/controllers/Home.php`)
```php
public function tentang()
{
  $data['title'] = 'Tentang';
  $data['active_nav'] = 'tentang';                    // untuk highlight menu navbar
  $data['profil'] = $this->profil_model->get();       // ambil data dari model
  // ...
  $this->load->view('frontend/template/header', $data);
  $this->load->view('frontend/tentang', $data);
  $this->load->view('frontend/template/footer');
}
```

**Step 3 — Model** (`application/models/Profil_model.php`)
```php
public function get()
{
  return $this->db->get('profil')->row();
}
```

**Step 4 — View** lihat bagian `application/views/frontend/tentang.php`
```php
<p><?= htmlspecialchars($profil->sejarah) ?></p>
```

**URL yang sudah terdaftar di frontend Home:**

| Method | Route | View |
|--------|-------|------|
| `index()` | `/` | `frontend/home` |
| `tentang()` | `/tentang` | `frontend/tentang` |
| `guru()` | `/guru` | `frontend/guru` |
| `siswa()` | `/siswa` | `frontend/siswa` |
| `prestasi()` | `/prestasi` | `frontend/prestasi` |
| `berita()` | `/berita` | `frontend/berita` |
| `detail_berita($slug)` | `/berita/detail/(:any)` | `frontend/berita_detail` |
| `galeri()` | `/galeri` | `frontend/galeri` |
| `fasilitas()` | `/fasilitas` | `frontend/fasilitas` |
| `ekstrakurikuler()` | `/ekstrakurikuler` | `frontend/ekstrakurikuler` |
| `ppdb()` | `/ppdb` | `frontend/ppdb` |
| `mata_pelajaran()` | `/mata-pelajaran` | `frontend/mata_pelajaran` |
| `kontak()` | `/kontak` | `frontend/kontak` |

---

## 3. Alur Request Admin (CRUD)

Semua fitur admin mengikuti **pola abstrak yang sama**. Pola ini PASTI ditanyakan live coding:

```
List (index) → buat (create) → simpan (insert) → list lagi
                     │
                     ├── edit($id) → update
                     └── delete($id)
```

### Pola Controller Admin (contoh: `Admin_berita.php`)

```php
class Admin_berita extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in')) redirect('auth/login'); // PENTING: guard login
    $this->load->model('berita_model');       // load model
  }

  /** A. LIST */
  public function index()
  {
    $data['title'] = 'Berita';
    $data['active_menu'] = 'berita';                        // highlight sidebar
    $data['berita'] = $this->berita_model->get_all();       // ambil semua data
    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/berita_list', $data);          // view list
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  /** B. CREATE — GET tampilkan form, POST simpan */
  public function create()
  {
    $data['title'] = 'Tambah Berita';
    $data['active_menu'] = 'berita';

    if ($this->input->method() === 'post') {         // deteksi method POST
      // 1) validasi
      $this->load->library('form_validation');
      $this->form_validation->set_rules('judul', 'Judul', 'required');
      if ($this->form_validation->run()) {
        // 2) susun array data
        $insert = ['judul' => $this->input->post('judul'), ...];
        // 3) simpan via model
        $this->berita_model->insert($insert);
        // 4) flash + redirect
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
        redirect('admin_berita');
      }
    }

    // tampilkan form (untuk GET dan POST gagal validasi)
    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/berita_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  /** C. EDIT — sama seperti create, bedanya pakai where id */
  public function edit($id)
  {
    $data['row'] = $this->berita_model->get_by_id($id);
    if (!$data['row']) show_404();                     // id tidak ada
    if ($this->input->method() === 'post') {
      // validasi + $this->berita_model->update($id, $update);
      // flash + redirect
    }
    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/berita_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  /** D. DELETE */
  public function delete($id)
  {
    $this->berita_model->delete($id);
    $this->session->set_flashdata('success', 'Data berhasil dihapus.');
    redirect('admin_berita');
  }
}
```

### Route admin tidak perlu manual
Karena controller `Admin_berita`, CodeIgniter otomatis mengenali URL `admin_berita`, `admin_berita/create`, `admin_berita/edit/5`. Cukup tetapkan di `routes.php` jika ingin custom path.

---

## 4. Pola Model

```php
class Berita_model extends CI_Model {

  protected $table = 'berita';          // nama tabel

  public function get_all() {
    return $this->db->order_by('created_at','DESC')->get($this->table)->result();
  }

  public function get_by_id($id) {
    return $this->db->where('id', $id)->get($this->table)->row();
  }

  // JOIN untuk query lintas tabel
  public function get_with_kategori() {
    return $this->db->select('berita.*, kategori.nama as kategori_nama')
      ->join('kategori', 'kategori.id = berita.kategori_id', 'left')
      ->order_by('berita.created_at','DESC')
      ->get($this->table)->result();
  }

  public function insert($data) {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  public function update($id, $data) {
    $this->db->where('id', $id)->update($this->table, $data);
  }

  public function delete($id) {
    $this->db->where('id', $id)->delete($this->table);
  }

  // Pagination — pola yang sudah dipakai di Guru & Siswa
  public function get_paginated($limit, $offset) {
    return $this->db->order_by('id','ASC')->limit($limit, $offset)->get($this->table)->result();
  }
  public function count_all() {
    return $this->db->count_all($this->table);
  }
}
```

---

## 5. STUDI KASUS — Analisis Lengkap `frontend/guru.php`

Contoh nyata paling kaya di project ini. Memperlihatkan cara controller → view bekerja sama:
gabungan pagination, tab filter, pola fallback `??`, dan pencarian JavaScript. Baca sambil buka file `application/views/frontend/guru.php`.

### 5a. Dari mana `$guru` & `$guru_all` berasal?

Di controller `Home.php`:
```php
$data['guru']     = $this->guru_model->get_paginated(8, $offset);  // 8 guru halaman ini
$data['guru_all'] = $this->guru_model->get_all();                  // SEMUA guru
$data['pagination'] = [ 'page' => $page, 'per_page' => 8, 'total_pages' => ..., ... ];
$this->load->view('frontend/guru', $data);
```
Setelah `extract($data)` di dalam view, tersedia: `$guru` (8 data), `$guru_all`, `$pagination`.

> **Kenapa dua variabel?** Tab "Semua" pakai 8 data per halaman (supaya pagination jalan), sedangkan tab "Guru"/"Staff" butuh SEMUA data supaya filter tab tetap lengkap di halaman mana pun.

### 5b. Blok persiapan data (baris 27-33)

```php
$guru_list  = $guru ?? [];                                                  // 1
$guru_all   = $guru_all ?? $guru_list;                                      // 2
$guru_guru  = array_filter($guru_all, function($g) {                        // 3
  return stripos($g->jabatan ?? '', 'guru') !== false || empty($g->jabatan);
});
$staff_list = array_filter($guru_all, function($g) {                        // 4
  return $g->jabatan && stripos($g->jabatan, 'guru') === false;
});
$pp = $pagination ?? ['page' => 1, 'per_page' => 8, 'total_pages' => 1, 'base' => site_url('guru')]; // 5
```

| Baris | Fungsi |
|-------|--------|
| **1** | `$guru_list = $guru ?? []` — salin `$guru`, tapi jika null/tidak terkirim → `[]` (anti-error "undefined variable"). |
| **2** | `$guru_all ?? $guru_list` — jika `$guru_all` tidak dikirim, pakai `$guru_list` sebagai cadangan. |
| **3** | `array_filter` = saring array dengan kondisi. Kondisi: jabatan mengandung kata "guru" (`stripos(...,'guru') !== false`) **atau** jabatan kosong (`empty`) → masuk tab **Guru**. |
| **4** | Kebalikannya: jabatan ADA dan TIDAK mengandung "guru" → masuk tab **Staff**. |
| **5** | `$pagination` dengan default jika tidak dikirim. |

**Catatan penting:**
- `stripos` = cari posisi teks tetap namun TIDAK peduli huruf besar/kecil (mencocokkan "Guru", "guru", "GURU" semua).
- `??` = *null coalescing operator*: "pakai kiri kalau bukan null, kalau null pakai kanan".
- `array_filter` MENYIMPAN index asli (mis. hasil [5, 8, 12]) → perlu dirapikan dengan `array_values()` sebelum `foreach` (lihat 5d).

### 5c. `foreach` + escape + base_url (baris 36-42)

```php
<?php if ($guru_list): foreach ($guru_list as $i => $g): ?>
  <!-- $i = urutan (0,1,2..) | $g = objek satu guru -->
  <img src="<?php echo $g->foto ? base_url($g->foto)
    : 'https://placehold.co/200x200/1e3a5f/ffffff?text=' . urlencode(substr($g->nama, 0, 1)); ?>">
  <h3><?php echo $g->nama; ?></h3>
  <p class="jabatan"><?php echo $g->jabatan ?? 'Guru'; ?></p>
  <p class="mapel"><?php echo $g->mapel ?? '-'; ?></p>
<?php endforeach; else: ?>
  <p>Belum ada data guru.</p>
<?php endif; ?>
```

| Bagian | Fungsi |
|--------|--------|
| `if/else/endif` | List kosong → tampilkan pesan, bukan foreach error. |
| `as $i => $g` | `$i` = index perulangan (dipakai untuk `transition-delay` agar kartu muncul bertahap), `$g` = objek guru saat ini. |
| `$g->foto ? A : B` | **Ternary**: jika punya foto pakai A, jika tidak pakai B (placeholder dengan inisial nama). |
| `base_url($g->foto)` | Ubah path relatif (`assets/uploads/x.jpg`) jadi URL penuh (`http://host/.../x.jpg`). |
| `substr($g->nama, 0, 1)` | Ambil huruf pertama nama → jadi inisial di placeholder. |
| `urlencode(...)` | Amankan inisial agar aman disisipkan di URL. |
| `$g->jabatan ?? 'Guru'` / `$g->mapel ?? '-'` | Tampilkan nilai default jika kolom kosong. |
| `<?php echo ... ?>` | Metode escape standar di view (bukan `<?=` supaya kompatibel semua PHP). |

### 5d. `array_values()` — kenapa tab Guru/Staff butuh ini?

```php
$guru_guru_array = array_values($guru_guru);   // hasil array_filter
```
`array_filter` mempertahankan index asli array (0, 3, 5, 7 dst). `array_values()` **mereset index jadi 0,1,2,3...** supaya `$i` pada foreach berurutan dan `$i * 0.05` (delay animasi) tetap terhitung benar.

### 5e. Pagination (baris 62-68)

```php
<?php if ($pp['total_pages'] > 1): ?>
  <?php for ($p = 1; $p <= $pp['total_pages']; $p++): ?>
    <a href="<?php echo $pp['base'] . '?page=' . $p; ?>"
       class="<?php echo $p == $pp['page'] ? 'active' : ''; ?>"><?php echo $p; ?></a>
  <?php endfor; ?>
<?php endif; ?>
```

| Bagian | Fungsi |
|--------|--------|
| `if total_pages > 1` | Pagination hanya muncul kalau datanya lebih dari 1 halaman. |
| `for` loop | Cetak link `?page=1`, `?page=2`, dst. dari controller `$pp['base']` (yaitu `site_url('guru')`). |
| Ternary `active` | Halaman yang sedang dibuka mendapat class `active` (highlight). |
| Alur | Klik `?page=2` → `Home::guru()` baca `$_GET['page']` → hitung offset → ambil 8 guru berikutnya. |

### 5f. Pencarian JavaScript `filterGuru()` (baris 88-97)

```javascript
function filterGuru() {
  var input  = document.getElementById('guruSearch');          // ambil kotak pencarian
  var filter = input.value.toUpperCase();                      // kata kunci → huruf besar
  var cards  = document.querySelectorAll('.guru-card');        // semua kartu guru
  for (var i = 0; i < cards.length; i++) {
    var text = cards[i].textContent || cards[i].innerText;     // seluruh teks kartu
    cards[i].style.display = text.toUpperCase().indexOf(filter) > -1 ? '' : 'none';
  }
}
```

| Bagian | Fungsi |
|--------|--------|
| `onkeyup="filterGuru()"` | Dipicu TANPA perlu tombol, setiap kali user mengetik. |
| `.toUpperCase()` | Samakan huruf besar/kecil supaya "guru"/"Guru"/"GURU" semua cocok. |
| `textContent/innerText` | Kumpulkan semua teks kartu (nama + jabatan + mapel). |
| `indexOf(filter) > -1` | `-1` = tidak ketemu. `> -1` berarti katanya ADA di teks kartu. |
| Ternary display | Ketemu → `''` (tampil), tidak → `'none'` (sembunyi). |

> **Pelajaran**: pencarian frontend ini murni JavaScript di sisi browser — tidak perlu query ulang ke server. Berguna untuk data yang jumlahnya sedikit; untuk data ribuan lebih tepat pakai pencarian di model (`LIKE`).

### 5g. Alur lengkap satu halaman guru

```
User buka /guru
  → controller: kirim $guru (8/halaman) + $guru_all + $pagination
  → view: siapkan $guru_list, $guru_guru, $staff_list, $pp
  → 3 tab (Semua / Guru / Staff) masing-masing foreach kartu
  → pagination muncul jika total > 1 halaman
  → JS filterGuru() menyaring kartu secara live tanpa reload
```

---

## 6. Daftar Fitur & Controller yang Ada

| Fitur | Controller | Model | Tabel |
|-------|-----------|-------|-------|
| Login/Logout | `Auth.php` | `admin_model` | `admin` |
| Dashboard | `Dashboard.php` | — | — |
| Profil | `Admin_profil.php` | `profil_model` | `profil` |
| Berita | `Admin_berita.php` | `berita_model`, `kategori_model` | `berita`, `kategori` |
| Prestasi | `Admin_prestasi.php` | `prestasi_model` | `prestasi` |
| Guru | `Admin_guru.php` | `guru_model` | `guru` |
| Galeri | `Admin_galeri.php` | `galeri_model` | `galeri` |
| PPDB | `Admin_ppdb.php` | `ppdb_model` | `ppdb` |
| Kontak | `Admin_kontak.php` | `kontak_model` | `kontak` |
| Pengaturan | `Admin_pengaturan.php` | `pengaturan_model` | `pengaturan` |
| Fasilitas | `Admin_fasilitas.php` | `fasilitas_model` | `fasilitas` |
| Ekstrakurikuler | `Admin_ekstrakurikuler.php` | `ekstrakurikuler_model` | `ekstrakurikuler` |
| Siswa | `Admin_siswa.php` | `siswa_model`, `kelas_model` | `siswa`, `kelas` |
| Kelas | `Admin_kelas.php` | `kelas_model` | `kelas` |
| Mata Pelajaran | `Admin_mata_pelajaran.php` | `mata_pelajaran_model` | `mata_pelajaran` |

---

## 7. CARA MENAMBAH FITUR BARU (langkah wajib)

Bayangkan diminta: *"Tambahkan halaman **Album Prestasi**"* atau *"Tambah CRUD **Lowongan Kerja**"*. Ikuti 8 langkah ini:

### Langkah 1 — Buat tabel database
```sql
CREATE TABLE lowongan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  judul VARCHAR(150),
  isi TEXT
);
```
Kalau sudah live, tambahkan juga ke `database.sql` supaya konsisten.

### Langkah 2 — Buat Model
`application/models/Lowongan_model.php`
```php
class Lowongan_model extends CI_Model {
  protected $table = 'lowongan';
  // get_all, get_by_id, insert, update, delete, count_all — lihat pola §4
}
```

### Langkah 3 — Buat Controller Admin
`application/controllers/Admin_lowongan.php` — ikuti pola §3 (guard login di `__construct`, index/create/edit/delete).

### Langkah 4 — Tampilkan di view admin
- `application/views/admin/lowongan_list.php` (tabel + tombol tambah/edit/delete)
- `application/views/admin/lowongan_form.php` (form input)

Tambah item ke sidebar: `application/views/template/aside.php` — salin blok li menu yang ada dan ubah `href="admin_lowongan"` + label.

### Langkah 5 — Tampilkan ke publik
- Tambah method di `application/controllers/Home.php`, contoh:
```php
public function lowongan() {
  $data['title'] = 'Lowongan';
  $data['active_nav'] = 'lowongan';
  $data['lowongan'] = $this->lowongan_model->get_all();
  $this->load->view('frontend/template/header', $data);
  $this->load->view('frontend/lowongan', $data);
  $this->load->view('frontend/template/footer');
}
```
- Buat view `application/views/frontend/lowongan.php`
- Tambah link di navbar `frontend/template/header.php` & footer `frontend/template/footer.php`
- Tambah CSS di `assets/frontend/css/style.css`

### Langkah 6 — Registrasi route
**Admin:** URL otomatis `admin_lowongan` (tidak perlu ditulis).  
**Frontend:** tambah di `routes.php`:
```php
$route['lowongan'] = 'home/lowongan';
```

### Langkah 7 — Hitung pengaman (wajib untuk upload gambar)
Di controller admin `__construct`:
```php
if (!$this->session->userdata('logged_in')) redirect('auth/login');
```
Untuk upload gambar (pola yang dipakai Berita/Guru/Fasilitas):
```php
$config['upload_path'] = './assets/uploads/';
$config['allowed_types'] = 'jpg|jpeg|png|webp';
$this->load->library('upload', $config);
if ($_FILES['foto']['name']) $this->upload->do_upload('foto');
// simpan 'assets/uploads/'.foto nama hasil
```

### Langkah 8 — Tes
- `/admin_lowongan` → tambah data → cek list & edit → hapus.
- `/lowongan` → cek tampil di publik.

---

## 8. Cheat Sheet Konvensi (tanya jawab live coding)

**Menampilkan halaman frontend?**
```php
$this->load->view('frontend/template/header', $data);
$this->load->view('frontend/NAMA_VIEW', $data);
$this->load->view('frontend/template/footer');
```

**Menampilkan halaman admin?**
```php
$this->load->view('template/header', $data);
$this->load->view('template/aside', $data);
$this->load->view('admin/NAMA_VIEW', $data);
$this->load->view('template/footers');
$this->load->view('template/js');
```

**Ambil data POST?** `$this->input->post('field');`
**Deteksi POST?** `if ($this->input->method() === 'post')`
**Ambil data GET?** `$this->input->get('keyword');`
**Buat slug otomatis?** `url_title($judul, 'dash', true)`
**Hash password?** `password_hash($pw, PASSWORD_DEFAULT)` & verifikasi `password_verify($pw, $hash)`
**Flash message sukses?** `$this->session->set_flashdata('success', '...')` — ditampilkan di `template/footers`
**Validasi?** `form_validation->set_rules(...)` lalu `->run()`
**Upload?** artibrary `upload` + folder `./assets/uploads/` (BUKAN folder `uploads/`!)
**Escape output?** `htmlspecialchars($value)` (pakai `<?= $value ?>` hanya bila aman)
**Tonjolkan menu sidebar?** set `$data['active_menu']` (+ `$data['active_sub']`)
**Tonjolkan nav navbar?** set `$data['active_nav']`
