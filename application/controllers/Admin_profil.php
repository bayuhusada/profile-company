<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_profil extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in') || $this->session->userdata('admin_role') !== 'admin') redirect('auth/login');
    $this->load->model('profil_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Profil Sekolah';
    $data['active_menu'] = 'profil';
    $data['profil'] = $this->profil_model->get();

    if ($this->input->method() === 'post') {
      $insert = [
        'nama_sekolah' => $this->input->post('nama_sekolah'),
        'visi' => $this->input->post('visi'),
        'misi' => $this->input->post('misi'),
        'sejarah' => $this->input->post('sejarah'),
        'sambutan' => $this->input->post('sambutan'),
      ];

      $config['upload_path'] = './assets/uploads/';
      $config['allowed_types'] = 'jpg|jpeg|png|webp';
      $config['max_size'] = 5120;
      $this->load->library('upload', $config);

      if (!empty($_FILES['logo']['name'])) {
        if ($this->upload->do_upload('logo')) {
          $insert['logo'] = 'assets/uploads/' . $this->upload->data('file_name');
        }
      }
      if (!empty($_FILES['favicon']['name'])) {
        if ($this->upload->do_upload('favicon')) {
          $insert['favicon'] = 'assets/uploads/' . $this->upload->data('file_name');
        }
      }

      $this->profil_model->update($insert);
      $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
      redirect('admin_profil');
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/profil_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function hapus_gambar($jenis)
  {
    if (!in_array($jenis, ['logo', 'favicon'])) show_404();
    $profil = $this->profil_model->get();
    $path = $profil->{$jenis} ?? '';
    if ($path && is_file(FCPATH . $path)) {
      unlink(FCPATH . $path);
    }
    $this->profil_model->update([$jenis => null]);
    $this->session->set_flashdata('success', ucfirst($jenis) . ' berhasil dihapus.');
    redirect('admin_profil');
  }
}
