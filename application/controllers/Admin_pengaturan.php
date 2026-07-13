<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pengaturan extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in')) redirect('auth/login');
    $this->load->model('pengaturan_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Pengaturan Website';
    $data['active_menu'] = 'pengaturan';
    $data['setting'] = $this->pengaturan_model->get();

    if ($this->input->method() === 'post') {
      $update = [
        'nama_website' => $this->input->post('nama_website'),
        'meta_description' => $this->input->post('meta_description'),
        'meta_keyword' => $this->input->post('meta_keyword'),
        'copyright' => $this->input->post('copyright'),
        'jumlah_siswa' => $this->input->post('jumlah_siswa'),
        'jumlah_guru' => $this->input->post('jumlah_guru'),
        'tahun_berdiri' => $this->input->post('tahun_berdiri'),
      ];

      $this->pengaturan_model->update($update);
      $this->session->set_flashdata('success', 'Pengaturan berhasil diperbarui.');
      redirect('admin_pengaturan');
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/pengaturan_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }
}
