<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_kategori extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in') || $this->session->userdata('admin_role') !== 'admin') redirect('auth/login');
    $this->load->model('kategori_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Kategori Berita';
    $data['active_menu'] = 'kategori';
    $data['kategori'] = $this->kategori_model->get_all();

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/kategori_list', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function create()
  {
    $data['title'] = 'Tambah Kategori';
    $data['active_menu'] = 'kategori';

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('nama', 'Nama', 'required');

      if ($this->form_validation->run()) {
        $insert = [
          'nama' => $this->input->post('nama'),
          'slug' => url_title($this->input->post('nama'), 'dash', true),
        ];
        $this->kategori_model->insert($insert);
        $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan.');
        redirect('admin_kategori');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/kategori_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Kategori';
    $data['active_menu'] = 'kategori';
    $data['row'] = $this->kategori_model->get_by_id($id);
    if (!$data['row']) show_404();

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('nama', 'Nama', 'required');

      if ($this->form_validation->run()) {
        $update = [
          'nama' => $this->input->post('nama'),
          'slug' => url_title($this->input->post('nama'), 'dash', true),
        ];
        $this->kategori_model->update($id, $update);
        $this->session->set_flashdata('success', 'Kategori berhasil diperbarui.');
        redirect('admin_kategori');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/kategori_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function delete($id)
  {
    $this->kategori_model->delete($id);
    $this->session->set_flashdata('success', 'Kategori berhasil dihapus.');
    redirect('admin_kategori');
  }
}
