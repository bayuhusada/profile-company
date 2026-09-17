<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('profil_model');
    $this->load->model('kontak_model');
    $this->load->model('pengaturan_model');
    $this->load->vars([
      'site_profil' => $this->profil_model->get(),
      'site_kontak' => $this->kontak_model->get(),
      'site_pengaturan' => $this->pengaturan_model->get(),
    ]);
  }

  public function index()
  {
    $this->load->model('berita_model');
    $this->load->model('prestasi_model');
    $this->load->model('galeri_model');
    $this->load->model('profil_model');
    $this->load->model('kontak_model');
    $this->load->model('pengaturan_model');
    $this->load->model('foto_situs_model');
    $this->load->model('slider_model');

    $data['title'] = 'Beranda';
    $data['active_nav'] = 'beranda';
    $data['profil'] = $this->profil_model->get();
    $data['berita'] = $this->berita_model->get_recent(3);
    $data['prestasi'] = $this->prestasi_model->get_all();
    $data['galeri'] = $this->galeri_model->get_all();
    $data['kontak'] = $this->kontak_model->get();
    $data['pengaturan'] = $this->pengaturan_model->get();
    $data['foto_situs'] = $this->foto_situs_model->get_all_assoc();
    $data['slider'] = $this->slider_model->get_active();
    $this->load->view('frontend/template/header', $data);
    $this->load->view('frontend/home', $data);
    $this->load->view('frontend/template/footer');
  }

  public function tentang()
  {
    $this->load->model('profil_model');
    $this->load->model('foto_situs_model');
    $data['title'] = 'Tentang Kami';
    $data['active_nav'] = 'tentang';
    $data['profil'] = $this->profil_model->get();
    $data['foto_situs'] = $this->foto_situs_model->get_all_assoc();
    $this->load->view('frontend/template/header', $data);
    $this->load->view('frontend/tentang', $data);
    $this->load->view('frontend/template/footer');
  }

  public function guru()
  {
    $this->load->model('guru_model');
    $page = max(1, (int) $this->input->get('page'));
    $limit = 8;
    $offset = ($page - 1) * $limit;
    $total = $this->guru_model->count_all();

    $data['title'] = 'Guru & Staff';
    $data['active_nav'] = 'guru';
    $data['guru'] = $this->guru_model->get_paginated($limit, $offset);
    $data['guru_all'] = $this->guru_model->get_all();
    $data['pagination'] = [
      'base' => site_url('guru'),
      'page' => $page,
      'per_page' => $limit,
      'offset' => $offset,
      'total' => $total,
      'total_pages' => ceil($total / $limit),
    ];
    $this->load->view('frontend/template/header', $data);
    $this->load->view('frontend/guru', $data);
    $this->load->view('frontend/template/footer');
  }

  public function prestasi()
  {
    $this->load->model('prestasi_model');
    $data['title'] = 'Prestasi';
    $data['active_nav'] = 'prestasi';
    $data['prestasi'] = $this->prestasi_model->get_all();
    $this->load->view('frontend/template/header', $data);
    $this->load->view('frontend/prestasi', $data);
    $this->load->view('frontend/template/footer');
  }

  public function berita()
  {
    $this->load->model('berita_model');
    $this->load->model('kategori_model');
    $data['title'] = 'Berita';
    $data['active_nav'] = 'berita';
    $data['berita'] = $this->berita_model->get_with_kategori();
    $data['kategori'] = $this->kategori_model->get_all();
    $data['recent_berita'] = $this->berita_model->get_recent(5);
    $this->load->view('frontend/template/header', $data);
    $this->load->view('frontend/berita', $data);
    $this->load->view('frontend/template/footer');
  }

  public function berita_detail($slug = '')
  {
    $this->load->model('berita_model');
    $this->load->model('kategori_model');
    $data['title'] = 'Detail Berita';
    $data['active_nav'] = 'berita';
    $data['row'] = $this->berita_model->get_by_slug($slug);
    if (!$data['row']) show_404();
    $data['title'] = $data['row']->judul;
    $data['kategori'] = $this->kategori_model->get_all();
    $data['recent_berita'] = $this->berita_model->get_recent(5);
    $this->load->view('frontend/template/header', $data);
    $this->load->view('frontend/berita_detail', $data);
    $this->load->view('frontend/template/footer');
  }

  public function galeri()
  {
    $this->load->model('galeri_model');
    $data['title'] = 'Galeri';
    $data['active_nav'] = 'galeri';
    $data['galeri'] = $this->galeri_model->get_all();
    $this->load->view('frontend/template/header', $data);
    $this->load->view('frontend/galeri', $data);
    $this->load->view('frontend/template/footer');
  }

  public function ppdb()
  {
    $this->load->model('ppdb_model');
    $data['title'] = 'PPDB';
    $data['active_nav'] = 'ppdb';
    $data['ppdb'] = $this->ppdb_model->get();
    $this->load->view('frontend/template/header', $data);
    $this->load->view('frontend/ppdb', $data);
    $this->load->view('frontend/template/footer');
  }

  public function kontak()
  {
    $this->load->model('kontak_model');
    $data['title'] = 'Kontak';
    $data['active_nav'] = 'kontak';
    $data['kontak'] = $this->kontak_model->get();
    $this->load->view('frontend/template/header', $data);
    $this->load->view('frontend/kontak', $data);
    $this->load->view('frontend/template/footer');
  }

  public function siswa()
  {
    $this->load->model('siswa_model');
    $page = max(1, (int) $this->input->get('page'));
    $limit = 10;
    $offset = ($page - 1) * $limit;
    $total = $this->siswa_model->count_all();

    $data['title'] = 'Siswa';
    $data['active_nav'] = 'siswa';
    $data['siswa'] = $this->siswa_model->get_paginated($limit, $offset);
    $data['pagination'] = [
      'base' => site_url('siswa'),
      'page' => $page,
      'per_page' => $limit,
      'offset' => $offset,
      'total' => $total,
      'total_pages' => ceil($total / $limit),
    ];
    $this->load->view('frontend/template/header', $data);
    $this->load->view('frontend/siswa', $data);
    $this->load->view('frontend/template/footer');
  }

  public function mata_pelajaran()
  {
    $this->load->model('mata_pelajaran_model');
    $data['title'] = 'Mata Pelajaran';
    $data['active_nav'] = 'mata_pelajaran';
    $data['mata_pelajaran'] = $this->mata_pelajaran_model->get_all();
    $this->load->view('frontend/template/header', $data);
    $this->load->view('frontend/mata_pelajaran', $data);
    $this->load->view('frontend/template/footer');
  }

  public function fasilitas()
  {
    $this->load->model('fasilitas_model');
    $data['title'] = 'Fasilitas';
    $data['active_nav'] = 'fasilitas';
    $data['fasilitas'] = $this->fasilitas_model->get_all();
    $this->load->view('frontend/template/header', $data);
    $this->load->view('frontend/fasilitas', $data);
    $this->load->view('frontend/template/footer');
  }

  public function ekstrakurikuler()
  {
    $this->load->model('ekstrakurikuler_model');
    $data['title'] = 'Ekstrakurikuler';
    $data['active_nav'] = 'ekstrakurikuler';
    $data['ekstrakurikuler'] = $this->ekstrakurikuler_model->get_with_guru();
    $this->load->view('frontend/template/header', $data);
    $this->load->view('frontend/ekstrakurikuler', $data);
    $this->load->view('frontend/template/footer');
  }
}
