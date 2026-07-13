<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

  protected $table = 'siswa';

  public function get_all()
  {
    $this->db->select('siswa.*, kelas.nama_kelas');
    $this->db->from('siswa');
    $this->db->join('kelas', 'kelas.id = siswa.id_kelas', 'left');
    $this->db->order_by('kelas.nama_kelas', 'ASC');
    $this->db->order_by('siswa.nama', 'ASC');
    return $this->db->get()->result();
  }

  public function get_by_id($id)
  {
    $this->db->select('siswa.*, kelas.nama_kelas');
    $this->db->from('siswa');
    $this->db->join('kelas', 'kelas.id = siswa.id_kelas', 'left');
    $this->db->where('siswa.id', $id);
    return $this->db->get()->row();
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

  public function get_paginated($limit, $offset)
  {
    $this->db->select('siswa.*, kelas.nama_kelas');
    $this->db->from('siswa');
    $this->db->join('kelas', 'kelas.id = siswa.id_kelas', 'left');
    $this->db->order_by('kelas.nama_kelas', 'ASC');
    $this->db->order_by('siswa.nama', 'ASC');
    $this->db->limit($limit, $offset);
    return $this->db->get()->result();
  }

  public function count_all()
  {
    return $this->db->count_all($this->table);
  }
}
