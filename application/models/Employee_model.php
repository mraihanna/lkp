<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_model extends CI_Model
{
  public function insertUnitKerja()
  {
    $unitKerja = $this->input->post('unit_kerja');

    $data = [
      'unit_kerja' => $unitKerja
    ];

    return $this->db->insert('user_unit_kerja', $data);
  }

  public function updateUnitKerja($id)
  {
    $unitKerja = $this->input->post('unit_kerja');

    $data = [
      'unit_kerja' => $unitKerja
    ];

    $this->db->set($data);
    $this->db->where('id', $id);
    $this->db->update('user_unit_kerja');
  }

  public function deleteUnitKerja($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_unit_kerja');
  }

  public function insertJabatan()
  {
    $jabatan = $this->input->post('jabatan');

    $data = [
      'jabatan' => $jabatan
    ];

    return $this->db->insert('user_jabatan', $data);
  }

  public function updateJabatan($id)
  {
    $jabatan = $this->input->post('jabatan');

    $data = [
      'jabatan' => $jabatan
    ];

    $this->db->set($data);
    $this->db->where('id', $id);
    $this->db->update('user_jabatan');
  }

  public function deleteJabatan($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_jabatan');
  }

  public function insertEmployee()
  {
    $nip            = $this->input->post('nip');
    $name           = $this->input->post('name');
    $email          = $this->input->post('email');
    $image          = 'default.png';
    $pass           = password_hash(123, PASSWORD_DEFAULT);
    $role_id        = $this->input->post('role');
    $unit_kerja_id  = $this->input->post('unit_kerja');
    $jabatan_id     = $this->input->post('jabatan');
    $atasan_id      = $this->input->post('atasan');

    if (!$atasan_id) {
      $atasan_id = 0;
    }

    $is_active      = 1;
    $date_created   = time();

    $data = [
      'nip'           => $nip,
      'name'          => $name,
      'email'         => $email,
      'image'         => $image,
      'password'      => $pass,
      'role_id'       => $role_id,
      'unit_kerja_id' => $unit_kerja_id,
      'jabatan_id'    => $jabatan_id,
      'atasan_id'     => $atasan_id,
      'is_active'     => $is_active,
      'date_created'  => $date_created
    ];

    $this->db->insert('user', $data);
  }

  public function getEmployee()
  {
    $query = "SELECT user.*, user_jabatan.jabatan, user_unit_kerja.unit_kerja, user_role.role
        FROM user JOIN user_jabatan
        ON user.jabatan_id = user_jabatan.id
        JOIN user_unit_kerja
        ON user.unit_kerja_id = user_unit_kerja.id
        JOIN user_role
        ON user.role_id = user_role.id";
    return $this->db->query($query)->result_array();
  }
}
