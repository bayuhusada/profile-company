<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

  protected $table = 'kategori';

  public function get_all()
  {
    $this->db->order_by('nama', 'ASC');
    return $this->db->get($this->table)->result();
  }

  public function get_by_id($id)
  {
    return $this->db->where('id', $id)->get($this->table)->row();
  }

  public function get_dropdown()
  {
    $result = $this->db->get($this->table)->result();
    $dropdown = [];
    foreach ($result as $row) {
      $dropdown[$row->id] = $row->nama;
    }
    return $dropdown;
  }

  public function insert($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  public function update($id, $data)
  {
    $this->db->where('id', $id)->update($this->table, $data);
  }

  public function delete($id)
  {
    $this->db->where('id', $id)->delete($this->table);
  }

  public function count_all()
  {
    return $this->db->count_all($this->table);
  }

  public function berita_count($kategori_id)
  {
    return $this->db->where('kategori_id', $kategori_id)->count_all_results('berita');
  }
}
