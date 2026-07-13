<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_prestasi extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in')) redirect('auth/login');
    $this->load->model('prestasi_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Prestasi';
    $data['active_menu'] = 'prestasi';
    $data['prestasi'] = $this->prestasi_model->get_all();

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/prestasi_list', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function create()
  {
    $data['title'] = 'Tambah Prestasi';
    $data['active_menu'] = 'prestasi';

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('judul', 'Judul', 'required');

      if ($this->form_validation->run()) {
        $insert = [
          'kategori' => $this->input->post('kategori'),
          'judul' => $this->input->post('judul'),
          'tahun' => $this->input->post('tahun'),
          'deskripsi' => $this->input->post('deskripsi'),
        ];

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 5120;
        $this->load->library('upload', $config);

        if ($_FILES['foto']['name']) {
          if ($this->upload->do_upload('foto')) {
            $insert['foto'] = 'assets/uploads/' . $this->upload->data('file_name');
          }
        }

        $this->prestasi_model->insert($insert);
        $this->session->set_flashdata('success', 'Prestasi berhasil ditambahkan.');
        redirect('admin_prestasi');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/prestasi_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Prestasi';
    $data['active_menu'] = 'prestasi';
    $data['row'] = $this->prestasi_model->get_by_id($id);
    if (!$data['row']) show_404();

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('judul', 'Judul', 'required');

      if ($this->form_validation->run()) {
        $update = [
          'kategori' => $this->input->post('kategori'),
          'judul' => $this->input->post('judul'),
          'tahun' => $this->input->post('tahun'),
          'deskripsi' => $this->input->post('deskripsi'),
        ];

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 5120;
        $this->load->library('upload', $config);

        if ($_FILES['foto']['name']) {
          if ($this->upload->do_upload('foto')) {
            $update['foto'] = 'assets/uploads/' . $this->upload->data('file_name');
          }
        }

        $this->prestasi_model->update($id, $update);
        $this->session->set_flashdata('success', 'Prestasi berhasil diperbarui.');
        redirect('admin_prestasi');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/prestasi_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function delete($id)
  {
    $this->prestasi_model->delete($id);
    $this->session->set_flashdata('success', 'Prestasi berhasil dihapus.');
    redirect('admin_prestasi');
  }
}
