<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_administrator extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in') || $this->session->userdata('admin_role') !== 'admin') redirect('auth/login');
    $this->load->model('admin_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Administrator';
    $data['active_menu'] = 'administrator';
    $data['admin'] = $this->admin_model->get_all();

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/administrator_list', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function create()
  {
    $data['title'] = 'Tambah Administrator';
    $data['active_menu'] = 'administrator';

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required|is_unique[admin.username]');
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

      if ($this->form_validation->run()) {
        $insert = [
          'nama' => $this->input->post('nama'),
          'username' => $this->input->post('username'),
          'role' => $this->input->post('role') ?: 'admin',
          'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
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

        $this->admin_model->insert($insert);
        $this->session->set_flashdata('success', 'Administrator berhasil ditambahkan.');
        redirect('admin_administrator');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/administrator_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Administrator';
    $data['active_menu'] = 'administrator';
    $data['row'] = $this->admin_model->get_by_id($id);
    if (!$data['row']) show_404();

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('nama', 'Nama', 'required');

      if ($this->form_validation->run()) {
        $update = [
          'nama' => $this->input->post('nama'),
          'role' => $this->input->post('role') ?: 'admin',
        ];

        if ($this->input->post('password')) {
          $update['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 5120;
        $this->load->library('upload', $config);

        if ($_FILES['foto']['name']) {
          if ($this->upload->do_upload('foto')) {
            $update['foto'] = 'assets/uploads/' . $this->upload->data('file_name');
          }
        }

        $this->admin_model->update($id, $update);
        $this->session->set_flashdata('success', 'Administrator berhasil diperbarui.');
        redirect('admin_administrator');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/administrator_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function delete($id)
  {
    if ($id == $this->session->userdata('admin_id')) {
      $this->session->set_flashdata('error', 'Tidak dapat menghapus akun sendiri.');
      redirect('admin_administrator');
    }

    $this->admin_model->delete($id);
    $this->session->set_flashdata('success', 'Administrator berhasil dihapus.');
    redirect('admin_administrator');
  }
}
