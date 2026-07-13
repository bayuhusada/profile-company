<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_galeri extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in')) redirect('auth/login');
    $this->load->model('galeri_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Galeri';
    $data['active_menu'] = 'galeri';
    $data['galeri'] = $this->galeri_model->get_all();

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/galeri_list', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function upload()
  {
    if ($this->input->method() === 'post') {
      $judul = $this->input->post('judul');

      $config['upload_path'] = './assets/uploads/';
      $config['allowed_types'] = 'jpg|jpeg|png|webp';
      $config['max_size'] = 5120;
      $this->load->library('upload', $config);

      $files = $_FILES;
      $count = count($_FILES['gambar']['name']);

      for ($i = 0; $i < $count; $i++) {
        if (empty($files['gambar']['name'][$i])) continue;

        $_FILES['file']['name'] = $files['gambar']['name'][$i];
        $_FILES['file']['type'] = $files['gambar']['type'][$i];
        $_FILES['file']['tmp_name'] = $files['gambar']['tmp_name'][$i];
        $_FILES['file']['error'] = $files['gambar']['error'][$i];
        $_FILES['file']['size'] = $files['gambar']['size'][$i];

        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
          $this->galeri_model->insert([
            'judul' => $judul ?: 'Foto ' . ($i + 1),
            'gambar' => 'assets/uploads/' . $this->upload->data('file_name'),
          ]);
        }
      }

      $this->session->set_flashdata('success', $count . ' foto berhasil diupload.');
    }

    redirect('admin_galeri');
  }

  public function edit_judul($id)
  {
    if ($this->input->method() === 'post') {
      $this->galeri_model->update($id, ['judul' => $this->input->post('judul')]);
      $this->session->set_flashdata('success', 'Judul berhasil diperbarui.');
    }
    redirect('admin_galeri');
  }

  public function delete($id)
  {
    $this->galeri_model->delete($id);
    $this->session->set_flashdata('success', 'Foto berhasil dihapus.');
    redirect('admin_galeri');
  }
}
