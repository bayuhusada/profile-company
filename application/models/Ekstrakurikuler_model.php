<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstrakurikuler_model extends CI_Model {

  protected $table = 'ekstrakurikuler';

  public function get_all()
  {
    $this->db->select('ekstrakurikuler.*, guru.nama as nama_guru');
    $this->db->from('ekstrakurikuler');
    $this->db->join('guru', 'guru.id = ekstrakurikuler.id_guru', 'left');
    $this->db->order_by('ekstrakurikuler.urutan', 'ASC');
    return $this->db->get()->result();
  }

  public function get_with_guru()
  {
    $this->db->select('ekstrakurikuler.*, guru.nama as nama_guru');
    $this->db->from('ekstrakurikuler');
    $this->db->join('guru', 'guru.id = ekstrakurikuler.id_guru', 'left');
    $this->db->order_by('ekstrakurikuler.urutan', 'ASC');
    return $this->db->get()->result();
  }

  public function get_by_id($id)
  {
    return $this->db->where('id', $id)->get($this->table)->row();
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
}
