<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_kontak extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in')) redirect('auth/login');
    $this->load->model('kontak_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Kontak';
    $data['active_menu'] = 'kontak';
    $data['kontak'] = $this->kontak_model->get();

    if ($this->input->method() === 'post') {
      $update = [
        'alamat' => $this->input->post('alamat'),
        'telepon' => $this->input->post('telepon'),
        'email' => $this->input->post('email'),
        'whatsapp' => $this->input->post('whatsapp'),
        'maps' => $this->input->post('maps'),
        'jam_operasional' => $this->input->post('jam_operasional'),
      ];

      $this->kontak_model->update($update);
      $this->session->set_flashdata('success', 'Kontak berhasil diperbarui.');
      redirect('admin_kontak');
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/kontak_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }
}
