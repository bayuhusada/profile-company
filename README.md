# SMP Negeri Sadi — Website Profil Sekolah

Website resmi SMP Negeri Sadi berbasis **CodeIgniter 3** dengan sistem manajemen konten (CMS) untuk mengelola profil sekolah, berita, prestasi, guru, siswa, fasilitas, ekstrakurikuler, PPDB, dan kontak.

## Fitur

### Frontend (Publik)
- **Beranda** — Sambutan kepala sekolah, statistik, berita terbaru, prestasi, galeri, lokasi
- **Tentang** — Profil, sejarah, visi & misi, sambutan kepala sekolah
- **Guru & Staff** — Data guru dan tenaga kependidikan dengan filter tab + pencarian
- **Siswa** — Tabel data siswa dengan pagination dan pencarian
- **Prestasi** — Prestasi sekolah, guru, dan siswa dengan filter kategori
- **Berita** — Daftar berita dengan kategori, pencarian, dan berita terkait
- **Galeri** — Grid foto dengan lightbox
- **Fasilitas** — Sarana dan prasarana sekolah per kategori
- **Ekstrakurikuler** — Kegiatan siswa dengan nama pembina
- **PPDB** — Informasi pendaftaran siswa baru
- **Mata Pelajaran** — Daftar kurikulum
- **Kontak** — Informasi kontak, Google Maps, form pesan

### Admin Panel (Sneat Bootstrap 5)
- Dashboard
- Profil Sekolah (CKEditor)
- Berita & Kategori (CKEditor)
- Prestasi
- Guru & Staff
- Siswa & Kelas
- Galeri
- Fasilitas
- Ekstrakurikuler
- PPDB
- Kontak
- Pengaturan Website (statistik, SEO)
- Manajemen Administrator

## Tech Stack

| Komponen | Teknologi |
|----------|-----------|
| **Framework** | CodeIgniter 3 (PHP ≥5.3.7) |
| **Frontend** | Custom CSS (Academic Canvas Design System) |
| **Admin UI** | Sneat Bootstrap 5 |
| **Font** | Inter (Google Fonts) |
| **Database** | MySQL / MariaDB |
| **Editor** | CKEditor 4 |
| **Dependencies** | PhpSpreadsheet 1.21 |

## Desain

- **Warna primer:** Navy `#1e3a5f`
- **Aksen:** Gold `#c9a84c`
- **Font:** Inter (400, 500, 600, 700)
- **Gaya:** Tajam (0px border-radius), huruf kapital pada navigasi, spacing berbasis 8px

## Instalasi

### 1. Clone repositori
```bash
git clone https://github.com/username/smpn.git
cd smpn
```

### 2. Import database
Buka phpMyAdmin atau terminal, buat database `landing`, lalu import:
```bash
mysql -u root -p landing < database.sql
```

### 3. Konfigurasi
File `application/config/database.php` — sesuaikan username/password jika diperlukan.

### 4. Install dependencies
```bash
composer install
```

### 5. Jalankan
Akses via browser: `http://localhost/smpn`

### Login Admin
- **Username:** `admin`
- **Password:** `admin123`

Login pertama akan otomatis membuat akun admin.
Akses panel admin: `http://localhost/smpn/auth/login`

## Struktur Direktori

```
smpn/
├── application/
│   ├── config/          # Konfigurasi CI (database, routes, etc)
│   ├── controllers/     # Home, Auth, Dashboard, Admin_*
│   ├── models/          # Model per tabel database
│   └── views/
│       ├── admin/       # Template admin (Sneat)
│       ├── frontend/    # Halaman publik
│       └── template/    # Layout header/footer/aside
├── assets/
│   ├── frontend/        # CSS, JS publik
│   ├── sneat/           # Asset admin template
│   └── uploads/         # Upload gambar & brosur
├── vendor/              # Composer dependencies
├── database.sql         # Skema database + data awal
├── .htaccess            # Rewrite rule (hapus index.php)
└── README.md
```

## Route Penting

| URL | Controller | Keterangan |
|-----|-----------|------------|
| `/` | `Home::index()` | Beranda |
| `/tentang` | `Home::tentang()` | Profil sekolah |
| `/guru` | `Home::guru()` | Guru & staff |
| `/siswa` | `Home::siswa()` | Data siswa |
| `/prestasi` | `Home::prestasi()` | Prestasi |
| `/berita` | `Home::berita()` | Berita |
| `/galeri` | `Home::galeri()` | Galeri foto |
| `/fasilitas` | `Home::fasilitas()` | Fasilitas |
| `/ekstrakurikuler` | `Home::ekstrakurikuler()` | Ekstrakurikuler |
| `/ppdb` | `Home::ppdb()` | PPDB |
| `/mata-pelajaran` | `Home::mata_pelajaran()` | Mata pelajaran |
| `/kontak` | `Home::kontak()` | Kontak |
| `/auth/login` | `Auth::login()` | Login admin |
| `/dashboard` | `Dashboard::index()` | Admin dashboard |
