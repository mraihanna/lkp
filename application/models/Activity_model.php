<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Activity_model extends CI_Model
{
  public function insertSatuanKerja()
  {
    $satuanKerja = $this->input->post('satuan_kerja');

    $data = [
      'satuan_kerja' => $satuanKerja
    ];

    return $this->db->insert('data_satuan_kerja', $data);
  }

  public function updateSatuanKerja($id)
  {
    $satuanKerja = $this->input->post('satuan_kerja');

    $this->db->set('satuan_kerja', $satuanKerja);
    $this->db->where('id', $id);
    $this->db->update('data_satuan_kerja');
  }

  public function deleteSatuanKerja($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('data_satuan_kerja');
  }
}
