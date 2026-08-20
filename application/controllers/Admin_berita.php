<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_berita extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in') || $this->session->userdata('admin_role') !== 'admin') redirect('auth/login');
    $this->load->model('berita_model');
    $this->load->model('kategori_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Berita';
    $data['active_menu'] = 'berita';
    $data['berita'] = $this->berita_model->get_with_kategori();
    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/berita_list', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function create()
  {
    $data['title'] = 'Tambah Berita';
    $data['active_menu'] = 'berita';
    $data['kategori'] = $this->kategori_model->get_dropdown();

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('judul', 'Judul', 'required');
      $this->form_validation->set_rules('isi', 'Isi Berita', 'required');

      if ($this->form_validation->run()) {
        $insert = [
          'kategori_id' => $this->input->post('kategori_id') ?: null,
          'judul' => $this->input->post('judul'),
          'slug' => url_title($this->input->post('judul'), 'dash', true),
          'isi' => $this->input->post('isi'),
          'status' => $this->input->post('status') ?: 'draft',
        ];

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 5120;
        $this->load->library('upload', $config);

        if ($_FILES['thumbnail']['name']) {
          if ($this->upload->do_upload('thumbnail')) {
            $insert['thumbnail'] = 'assets/uploads/' . $this->upload->data('file_name');
          }
        }

        $this->berita_model->insert($insert);
        $this->session->set_flashdata('success', 'Berita berhasil ditambahkan.');
        redirect('admin_berita');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/berita_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Berita';
    $data['active_menu'] = 'berita';
    $data['row'] = $this->berita_model->get_by_id($id);
    $data['kategori'] = $this->kategori_model->get_dropdown();

    if (!$data['row']) show_404();

    if ($this->input->method() === 'post') {
      $this->form_validation->set_rules('judul', 'Judul', 'required');

      if ($this->form_validation->run()) {
        $update = [
          'kategori_id' => $this->input->post('kategori_id') ?: null,
          'judul' => $this->input->post('judul'),
          'slug' => url_title($this->input->post('judul'), 'dash', true),
          'isi' => $this->input->post('isi'),
          'status' => $this->input->post('status') ?: 'draft',
        ];

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 5120;
        $this->load->library('upload', $config);

        if ($_FILES['thumbnail']['name']) {
          if ($this->upload->do_upload('thumbnail')) {
            $update['thumbnail'] = 'assets/uploads/' . $this->upload->data('file_name');
          }
        }

        $this->berita_model->update($id, $update);
        $this->session->set_flashdata('success', 'Berita berhasil diperbarui.');
        redirect('admin_berita');
      }
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view('admin/berita_form', $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  public function delete($id)
  {
    $this->berita_model->delete($id);
    $this->session->set_flashdata('success', 'Berita berhasil dihapus.');
    redirect('admin_berita');
  }
}
