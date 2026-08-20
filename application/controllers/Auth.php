<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
    $this->load->library('form_validation');
  }

  public function login()
  {
    if ($this->session->userdata('logged_in')) {
      if ($this->session->userdata('admin_role') === 'kepsek') {
        redirect('kepsek');
      }
      redirect('dashboard');
    }

    if ($this->admin_model->count_all() == 0) {
      $this->admin_model->insert([
        'nama' => 'Administrator',
        'username' => 'admin',
        'role' => 'admin',
        'password' => password_hash('admin123', PASSWORD_DEFAULT),
        'foto' => null,
      ]);
    }

    $kepsek_exists = $this->db->where('role', 'kepsek')->count_all_results('admin');
    if ($kepsek_exists == 0) {
      $this->admin_model->insert([
        'nama' => 'Kepala Sekolah',
        'username' => 'kepsek',
        'role' => 'kepsek',
        'password' => password_hash('kepsek123', PASSWORD_DEFAULT),
        'foto' => null,
      ]);
    }

    $data['title'] = 'Login';

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('username', 'Username', 'required|trim');
      $this->form_validation->set_rules('password', 'Password', 'required|trim');

      if ($this->form_validation->run()) {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->admin_model->get_by_username($username);

        if ($admin && password_verify($password, $admin->password)) {
          $session = [
            'logged_in' => TRUE,
            'admin_id' => $admin->id,
            'admin_nama' => $admin->nama,
            'admin_username' => $admin->username,
            'admin_role' => $admin->role,
            'admin_foto' => $admin->foto,
          ];
          $this->session->set_userdata($session);
          if ($admin->role === 'kepsek') {
            redirect('kepsek');
          }
          redirect('dashboard');
        } else {
          $this->session->set_flashdata('error', 'Username atau password salah.');
        }
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('admin/login');
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth/login');
  }
}
