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
}
