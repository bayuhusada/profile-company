<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

  protected $table = 'berita';

  public function get_all()
  {
    $this->db->order_by('created_at', 'DESC');
    return $this->db->get($this->table)->result();
  }

  public function get_with_kategori()
  {
    $this->db->select('berita.*, kategori.nama as kategori_nama');
    $this->db->join('kategori', 'kategori.id = berita.kategori_id', 'left');
    $this->db->order_by('berita.created_at', 'DESC');
    return $this->db->get($this->table)->result();
  }

  public function get_by_id($id)
  {
    return $this->db->where('berita.id', $id)
      ->select('berita.*, kategori.nama as kategori_nama')
      ->join('kategori', 'kategori.id = berita.kategori_id', 'left')
      ->get($this->table)->row();
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

  public function get_by_slug($slug)
  {
    return $this->db->where('berita.slug', $slug)
      ->select('berita.*, kategori.nama as kategori_nama')
      ->join('kategori', 'kategori.id = berita.kategori_id', 'left')
      ->get($this->table)->row();
  }

  public function get_recent($limit = 5)
  {
    $this->db->order_by('created_at', 'DESC');
    $this->db->limit($limit);
    return $this->db->get($this->table)->result();
  }
}
