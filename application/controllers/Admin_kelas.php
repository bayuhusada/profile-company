<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_kelas extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in') || $this->session->userdata('admin_role') !== 'admin') redirect('auth/login');
    $this->load->model('kelas_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Kelas';
    $data['active_menu'] = 'kelas';
    $data['kelas'] = $this->kelas_model->get_all();

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/kelas_list', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function create()
  {
    $data['title'] = 'Tambah Kelas';
    $data['active_menu'] = 'kelas';

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required|is_unique[kelas.nama_kelas]');

      if ($this->form_validation->run()) {
        $this->kelas_model->insert(['nama_kelas' => $this->input->post('nama_kelas')]);
        $this->session->set_flashdata('success', 'Kelas berhasil ditambahkan.');
        redirect('admin_kelas');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/kelas_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Kelas';
    $data['active_menu'] = 'kelas';
    $data['row'] = $this->kelas_model->get_by_id($id);
    if (!$data['row']) show_404();

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required|is_unique[kelas.nama_kelas.' . $id . ']');

      if ($this->form_validation->run()) {
        $this->kelas_model->update($id, ['nama_kelas' => $this->input->post('nama_kelas')]);
        $this->session->set_flashdata('success', 'Kelas berhasil diperbarui.');
        redirect('admin_kelas');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/kelas_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function delete($id)
  {
    $this->kelas_model->delete($id);
    $this->session->set_flashdata('success', 'Kelas berhasil dihapus.');
    redirect('admin_kelas');
  }
}
