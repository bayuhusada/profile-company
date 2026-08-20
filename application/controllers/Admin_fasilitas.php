<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_fasilitas extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in') || $this->session->userdata('admin_role') !== 'admin') redirect('auth/login');
    $this->load->model('fasilitas_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Fasilitas';
    $data['active_menu'] = 'fasilitas';
    $data['fasilitas'] = $this->fasilitas_model->get_all();

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/fasilitas_list', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function create()
  {
    $data['title'] = 'Tambah Fasilitas';
    $data['active_menu'] = 'fasilitas';

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('nama', 'Nama', 'required');

      if ($this->form_validation->run()) {
        $insert = [
          'nama' => $this->input->post('nama'),
          'deskripsi' => $this->input->post('deskripsi'),
          'kategori' => $this->input->post('kategori'),
          'urutan' => $this->input->post('urutan'),
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

        $this->fasilitas_model->insert($insert);
        $this->session->set_flashdata('success', 'Fasilitas berhasil ditambahkan.');
        redirect('admin_fasilitas');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/fasilitas_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Fasilitas';
    $data['active_menu'] = 'fasilitas';
    $data['row'] = $this->fasilitas_model->get_by_id($id);
    if (!$data['row']) show_404();

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('nama', 'Nama', 'required');

      if ($this->form_validation->run()) {
        $update = [
          'nama' => $this->input->post('nama'),
          'deskripsi' => $this->input->post('deskripsi'),
          'kategori' => $this->input->post('kategori'),
          'urutan' => $this->input->post('urutan'),
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

        $this->fasilitas_model->update($id, $update);
        $this->session->set_flashdata('success', 'Fasilitas berhasil diperbarui.');
        redirect('admin_fasilitas');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/fasilitas_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function delete($id)
  {
    $this->fasilitas_model->delete($id);
    $this->session->set_flashdata('success', 'Fasilitas berhasil dihapus.');
    redirect('admin_fasilitas');
  }
}
