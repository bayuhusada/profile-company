<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ekstrakurikuler extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in') || $this->session->userdata('admin_role') !== 'admin') redirect('auth/login');
    $this->load->model('ekstrakurikuler_model');
    $this->load->model('guru_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Ekstrakurikuler';
    $data['active_menu'] = 'ekstrakurikuler';
    $data['ekstrakurikuler'] = $this->ekstrakurikuler_model->get_all();

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/ekstrakurikuler_list', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function create()
  {
    $data['title'] = 'Tambah Ekstrakurikuler';
    $data['active_menu'] = 'ekstrakurikuler';
    $data['guru_list'] = $this->guru_model->get_all();

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('nama', 'Nama', 'required');

      if ($this->form_validation->run()) {
        $insert = [
          'nama' => $this->input->post('nama'),
          'deskripsi' => $this->input->post('deskripsi'),
          'id_guru' => $this->input->post('id_guru') ?: null,
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

        $this->ekstrakurikuler_model->insert($insert);
        $this->session->set_flashdata('success', 'Ekstrakurikuler berhasil ditambahkan.');
        redirect('admin_ekstrakurikuler');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/ekstrakurikuler_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Ekstrakurikuler';
    $data['active_menu'] = 'ekstrakurikuler';
    $data['row'] = $this->ekstrakurikuler_model->get_by_id($id);
    $data['guru_list'] = $this->guru_model->get_all();
    if (!$data['row']) show_404();

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('nama', 'Nama', 'required');

      if ($this->form_validation->run()) {
        $update = [
          'nama' => $this->input->post('nama'),
          'deskripsi' => $this->input->post('deskripsi'),
          'id_guru' => $this->input->post('id_guru') ?: null,
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

        $this->ekstrakurikuler_model->update($id, $update);
        $this->session->set_flashdata('success', 'Ekstrakurikuler berhasil diperbarui.');
        redirect('admin_ekstrakurikuler');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/ekstrakurikuler_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function delete($id)
  {
    $this->ekstrakurikuler_model->delete($id);
    $this->session->set_flashdata('success', 'Ekstrakurikuler berhasil dihapus.');
    redirect('admin_ekstrakurikuler');
  }
}
