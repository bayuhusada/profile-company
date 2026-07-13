<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ppdb extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in')) redirect('auth/login');
    $this->load->model('ppdb_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'PPDB';
    $data['active_menu'] = 'ppdb';
    $data['ppdb'] = $this->ppdb_model->get();

    if ($this->input->method() === 'post') {
      $update = [
        'judul' => $this->input->post('judul'),
        'isi' => $this->input->post('isi'),
      ];

      $config['upload_path'] = './assets/uploads/';
      $config['allowed_types'] = 'pdf|jpg|jpeg|png';
      $config['max_size'] = 10240;
      $this->load->library('upload', $config);

      if ($_FILES['brosur']['name']) {
        if ($this->upload->do_upload('brosur')) {
          $update['brosur'] = 'assets/uploads/' . $this->upload->data('file_name');
        }
      }

      $this->ppdb_model->update($update);
      $this->session->set_flashdata('success', 'PPDB berhasil diperbarui.');
      redirect('admin_ppdb');
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/ppdb_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }
}
