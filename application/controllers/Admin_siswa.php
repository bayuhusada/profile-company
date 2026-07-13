<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_siswa extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in')) redirect('auth/login');
    $this->load->model('siswa_model');
    $this->load->model('kelas_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Siswa';
    $data['active_menu'] = 'siswa';
    $data['siswa'] = $this->siswa_model->get_all();

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/siswa_list', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function create()
  {
    $data['title'] = 'Tambah Siswa';
    $data['active_menu'] = 'siswa';
    $data['kelas_list'] = $this->kelas_model->get_all();

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('nisn', 'NISN', 'required|is_unique[siswa.nisn]');
      $this->form_validation->set_rules('nama', 'Nama', 'required');

      if ($this->form_validation->run()) {
        $insert = [
          'nisn' => $this->input->post('nisn'),
          'nama' => $this->input->post('nama'),
          'agama' => $this->input->post('agama'),
          'jenis_kelamin' => $this->input->post('jenis_kelamin'),
          'id_kelas' => $this->input->post('id_kelas') ?: null,
        ];

        $this->siswa_model->insert($insert);
        $this->session->set_flashdata('success', 'Siswa berhasil ditambahkan.');
        redirect('admin_siswa');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/siswa_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Siswa';
    $data['active_menu'] = 'siswa';
    $data['row'] = $this->siswa_model->get_by_id($id);
    $data['kelas_list'] = $this->kelas_model->get_all();
    if (!$data['row']) show_404();

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('nisn', 'NISN', 'required');
      $this->form_validation->set_rules('nama', 'Nama', 'required');

      if ($this->form_validation->run()) {
        $update = [
          'nisn' => $this->input->post('nisn'),
          'nama' => $this->input->post('nama'),
          'agama' => $this->input->post('agama'),
          'jenis_kelamin' => $this->input->post('jenis_kelamin'),
          'id_kelas' => $this->input->post('id_kelas') ?: null,
        ];

        $this->siswa_model->update($id, $update);
        $this->session->set_flashdata('success', 'Siswa berhasil diperbarui.');
        redirect('admin_siswa');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/siswa_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function delete($id)
  {
    $this->siswa_model->delete($id);
    $this->session->set_flashdata('success', 'Siswa berhasil dihapus.');
    redirect('admin_siswa');
  }
}
