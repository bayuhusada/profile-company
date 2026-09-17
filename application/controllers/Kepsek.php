<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepsek extends CI_Controller {

  protected $data_modules = [
    'siswa' => ['label' => 'Siswa', 'model' => 'siswa_model', 'title' => 'Data Siswa'],
    'guru' => ['label' => 'Guru', 'model' => 'guru_model', 'title' => 'Data Guru'],
    'ekstrakurikuler' => ['label' => 'Ekstrakurikuler', 'model' => 'ekstrakurikuler_model', 'title' => 'Data Ekstrakurikuler'],
    'fasilitas' => ['label' => 'Fasilitas', 'model' => 'fasilitas_model', 'title' => 'Data Fasilitas'],
    'prestasi' => ['label' => 'Prestasi', 'model' => 'prestasi_model', 'title' => 'Data Prestasi'],
    'kelas' => ['label' => 'Kelas', 'model' => 'kelas_model', 'title' => 'Data Kelas'],
    'mata_pelajaran' => ['label' => 'Mata Pelajaran', 'model' => 'mata_pelajaran_model', 'title' => 'Data Mata Pelajaran'],
  ];

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in')) redirect('auth/login');
    $this->load->model('admin_model');
    $this->load->helper('form');
  }

  private function render($view, $data)
  {
    $this->load->view('template/header', $data);
    $this->load->view('template/aside', $data);
    $this->load->view($view, $data);
    $this->load->view('template/footers');
    $this->load->view('template/js');
  }

  private function get_kepsek()
  {
    return $this->db->where('role', 'kepsek')->get('admin')->row();
  }

  public function index()
  {
    $this->load->model('siswa_model');
    $this->load->model('guru_model');
    $this->load->model('ekstrakurikuler_model');
    $this->load->model('fasilitas_model');
    $this->load->model('prestasi_model');
    $this->load->model('kelas_model');
    $this->load->model('mata_pelajaran_model');

    $data['title'] = 'Dashboard';
    $data['active_menu'] = 'dashboard';
    $data['total_siswa'] = $this->siswa_model->count_all();
    $data['total_guru'] = $this->guru_model->count_all();
    $data['total_ekskul'] = $this->ekstrakurikuler_model->count_all();
    $data['total_fasilitas'] = $this->fasilitas_model->count_all();
    $data['total_prestasi'] = $this->prestasi_model->count_all();
    $data['total_kelas'] = $this->kelas_model->count_all();
    $data['total_mapel'] = $this->mata_pelajaran_model->count_all();
    $data['kepsek'] = $this->get_kepsek();

    $this->render('kepsek/dashboard', $data);
  }

  public function lihat($jenis)
  {
    if (!isset($this->data_modules[$jenis])) show_404();

    $mod = $this->data_modules[$jenis];
    $this->load->model($mod['model']);
    $model = $mod['model'];

    $data['title'] = $mod['title'];
    $data['active_menu'] = $jenis;
    $data['rows'] = $this->$model->get_all();
    $data['jenis'] = $jenis;
    $data['kepsek'] = $this->get_kepsek();

    $this->render('kepsek/list', $data);
  }

  public function data_diri()
  {
    $kepsek = $this->get_kepsek();
    if (!$kepsek) show_404();

    $data['title'] = 'Data Diri Kepala Sekolah';
    $data['active_menu'] = 'data_diri';
    $data['row'] = $kepsek;

    if ($this->input->method() === 'post') {
      $update = [
        'nama' => $this->input->post('nama'),
        'nip' => $this->input->post('nip'),
        'pangkat' => $this->input->post('pangkat'),
      ];

      $config['upload_path'] = './assets/uploads/';
      $config['allowed_types'] = 'jpg|jpeg|png|webp';
      $config['max_size'] = 2048;
      $this->load->library('upload', $config);

      if (!empty($_FILES['ttd']['name'])) {
        if ($this->upload->do_upload('ttd')) {
          $update['ttd'] = 'assets/uploads/' . $this->upload->data('file_name');
        }
      }

      $this->admin_model->update($kepsek->id, $update);
      $this->session->set_flashdata('success', 'Data diri berhasil disimpan.');
      redirect('kepsek/data_diri');
    }

    $this->render('kepsek/data_diri', $data);
  }

  public function hapus_ttd()
  {
    $kepsek = $this->get_kepsek();
    if (!$kepsek) show_404();
    if (!empty($kepsek->ttd) && is_file(FCPATH . $kepsek->ttd)) {
      unlink(FCPATH . $kepsek->ttd);
    }
    $this->admin_model->update($kepsek->id, ['ttd' => null]);
    $this->session->set_flashdata('success', 'Tanda tangan berhasil dihapus.');
    redirect('kepsek/data_diri');
  }

  public function export_pdf($jenis)
  {
    if (!isset($this->data_modules[$jenis])) show_404();

    $mod = $this->data_modules[$jenis];
    $this->load->model($mod['model']);
    $model = $mod['model'];

    $rows = $this->$model->get_all();
    $kepsek = $this->get_kepsek();

    $this->load->model('profil_model');
    $this->load->model('kontak_model');
    $profil = $this->profil_model->get();
    $kontak = $this->kontak_model->get();

    $html = $this->load->view('kepsek/pdf_template', [
      'jenis' => $jenis,
      'jenis_label' => $mod['title'],
      'rows' => $rows,
      'kepsek' => $kepsek,
      'profil' => $profil,
      'kontak' => $kontak,
      'tgl_export' => date('d F Y'),
    ], true);

    require_once FCPATH . 'vendor/autoload.php';

    $options = new Dompdf\Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf\Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('data-' . $jenis . '-' . date('Ymd') . '.pdf', ['Attachment' => true]);
  }
}
