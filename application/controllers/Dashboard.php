<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in')) {
      redirect('auth/login');
    }
    $this->load->model('berita_model');
    $this->load->model('guru_model');
    $this->load->model('prestasi_model');
    $this->load->model('galeri_model');
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['active_menu'] = 'dashboard';
    $data['total_berita'] = $this->berita_model->count_all();
    $data['total_guru'] = $this->guru_model->count_all();
    $data['total_prestasi'] = $this->prestasi_model->count_all();
    $data['total_galeri'] = $this->galeri_model->count_all();
    $data['recent_berita'] = $this->berita_model->get_recent(5);

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/dashboard', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }
}
