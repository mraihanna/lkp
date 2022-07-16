<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{

  public function insertRole()
  {
    $data = [
      'role' => $this->input->post('role')
    ];

    return $this->db->insert('user_role', $data);
  }

  public function updateRole($id)
  {
    $this->db->set('role', $this->input->post('role'));
    $this->db->where('id', $id);
    $this->db->update('user_role');
  }

  public function deleteRole($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_role');
  }
}
