<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto_situs_model extends CI_Model {

  protected $table = 'foto_situs';

  public function get_all_assoc()
  {
    $rows = $this->db->get($this->table)->result();
    $assoc = [];
    foreach ($rows as $row) {
      $assoc[$row->kunci] = $row;
    }
    return $assoc;
  }

  public function get_by_key($kunci)
  {
    return $this->db->where('kunci', $kunci)->get($this->table)->row();
  }

  public function update($kunci, $foto)
  {
    $this->db->where('kunci', $kunci)->update($this->table, ['foto' => $foto]);
  }
}
