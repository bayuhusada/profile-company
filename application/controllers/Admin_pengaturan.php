<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pengaturan extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in') || $this->session->userdata('admin_role') !== 'admin') redirect('auth/login');
    $this->load->model('pengaturan_model');
    $this->load->model('foto_situs_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Pengaturan Website';
    $data['active_menu'] = 'pengaturan';
    $data['setting'] = $this->pengaturan_model->get();
    $data['foto_situs'] = $this->foto_situs_model->get_all_assoc();

    if ($this->input->method() === 'post') {
      $update = [
        'meta_description' => $this->input->post('meta_description'),
        'meta_keyword' => $this->input->post('meta_keyword'),
        'copyright' => $this->input->post('copyright'),
        'jumlah_siswa' => $this->input->post('jumlah_siswa'),
        'jumlah_guru' => $this->input->post('jumlah_guru'),
        'tahun_berdiri' => $this->input->post('tahun_berdiri'),
      ];

      $this->pengaturan_model->update($update);

      $config['upload_path'] = './assets/uploads/';
      $config['allowed_types'] = 'jpg|jpeg|png|webp';
      $config['max_size'] = 5120;
      $this->load->library('upload', $config);

      foreach (['gedung', 'kepsek', 'kegiatan'] as $kunci) {
        if (!empty($_FILES[$kunci]['name'])) {
          if ($this->upload->do_upload($kunci)) {
            $this->foto_situs_model->update($kunci, 'assets/uploads/' . $this->upload->data('file_name'));
          }
        }
      }

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
