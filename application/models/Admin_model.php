<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

  protected $table = 'admin';

  public function get_all()
  {
    return $this->db->get($this->table)->result();
  }

  public function get_by_id($id)
  {
    return $this->db->where('id', $id)->get($this->table)->row();
  }

  public function get_by_username($username)
  {
    return $this->db->where('username', $username)->get($this->table)->row();
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
