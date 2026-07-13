<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {

  protected $table = 'profil';

  public function get()
  {
    return $this->db->where('id', 1)->get($this->table)->row();
  }

  public function update($data)
  {
    $this->db->where('id', 1)->update($this->table, $data);
  }
}
