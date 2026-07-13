<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_mata_pelajaran extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in')) redirect('auth/login');
    $this->load->model('mata_pelajaran_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Mata Pelajaran';
    $data['active_menu'] = 'mata_pelajaran';
    $data['mata_pelajaran'] = $this->mata_pelajaran_model->get_all();

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/mata_pelajaran_list', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function create()
  {
    $data['title'] = 'Tambah Mata Pelajaran';
    $data['active_menu'] = 'mata_pelajaran';

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('nama_pelajaran', 'Nama Pelajaran', 'required|is_unique[mata_pelajaran.nama_pelajaran]');

      if ($this->form_validation->run()) {
        $this->mata_pelajaran_model->insert(['nama_pelajaran' => $this->input->post('nama_pelajaran')]);
        $this->session->set_flashdata('success', 'Mata pelajaran berhasil ditambahkan.');
        redirect('admin_mata_pelajaran');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/mata_pelajaran_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Mata Pelajaran';
    $data['active_menu'] = 'mata_pelajaran';
    $data['row'] = $this->mata_pelajaran_model->get_by_id($id);
    if (!$data['row']) show_404();

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('nama_pelajaran', 'Nama Pelajaran', 'required|is_unique[mata_pelajaran.nama_pelajaran.' . $id . ']');

      if ($this->form_validation->run()) {
        $this->mata_pelajaran_model->update($id, ['nama_pelajaran' => $this->input->post('nama_pelajaran')]);
        $this->session->set_flashdata('success', 'Mata pelajaran berhasil diperbarui.');
        redirect('admin_mata_pelajaran');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/mata_pelajaran_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function delete($id)
  {
    $this->mata_pelajaran_model->delete($id);
    $this->session->set_flashdata('success', 'Mata pelajaran berhasil dihapus.');
    redirect('admin_mata_pelajaran');
  }
}
