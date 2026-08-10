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

## 5. Daftar Fitur & Controller yang Ada

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

## 6. CARA MENAMBAH FITUR BARU (langkah wajib)

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

## 7. Cheat Sheet Konvensi (tanya jawab live coding)

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
