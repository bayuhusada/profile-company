<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_slider extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in') || $this->session->userdata('admin_role') !== 'admin') redirect('auth/login');
    $this->load->model('slider_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Slider';
    $data['active_menu'] = 'slider';
    $data['slider'] = $this->slider_model->get_all();
    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/slider_list', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function create()
  {
    $data['title'] = 'Tambah Slide';
    $data['active_menu'] = 'slider';

    if ($this->input->method() === 'post') {
      $insert = [
        'judul' => $this->input->post('judul'),
        'deskripsi' => $this->input->post('deskripsi'),
        'urutan' => $this->input->post('urutan') ?: 0,
        'status' => $this->input->post('status') ? 1 : 0,
      ];

      $config['upload_path'] = './assets/uploads/';
      $config['allowed_types'] = 'jpg|jpeg|png|webp';
      $config['max_size'] = 10240;
      $this->load->library('upload', $config);

      if (!empty($_FILES['foto']['name'])) {
        if ($this->upload->do_upload('foto')) {
          $insert['foto'] = 'assets/uploads/' . $this->upload->data('file_name');
        }
      }

      $this->slider_model->insert($insert);
      $this->session->set_flashdata('success', 'Slide berhasil ditambahkan.');
      redirect('admin_slider');
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/slider_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Slide';
    $data['active_menu'] = 'slider';
    $data['row'] = $this->slider_model->get_by_id($id);

    if (!$data['row']) show_404();

    if ($this->input->method() === 'post') {
      $update = [
        'judul' => $this->input->post('judul'),
        'deskripsi' => $this->input->post('deskripsi'),
        'urutan' => $this->input->post('urutan') ?: 0,
        'status' => $this->input->post('status') ? 1 : 0,
      ];

      $config['upload_path'] = './assets/uploads/';
      $config['allowed_types'] = 'jpg|jpeg|png|webp';
      $config['max_size'] = 10240;
      $this->load->library('upload', $config);

      if (!empty($_FILES['foto']['name'])) {
        if ($this->upload->do_upload('foto')) {
          $update['foto'] = 'assets/uploads/' . $this->upload->data('file_name');
        }
      }

      $this->slider_model->update($id, $update);
      $this->session->set_flashdata('success', 'Slide berhasil diperbarui.');
      redirect('admin_slider');
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/slider_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function delete($id)
  {
    $this->slider_model->delete($id);
    $this->session->set_flashdata('success', 'Slide berhasil dihapus.');
    redirect('admin_slider');
  }
}
