<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Target_model extends CI_Model
{
  public function insertTargetUser($id)
  {
    $det    =  $this->input->post('detail_kegiatan');
    $sDate  =  $this->input->post('start_date');
    $eDate  =  $this->input->post('end_date');

    $data  = [
      'user_id' => $id,
      'detail_kegiatan' => $det,
      'start_date' => $sDate,
      'end_date' => $eDate
    ];


    return $this->db->insert('data_target', $data);
  }

  public function updateTargetUser($id)
  {
    $det    =  $this->input->post('detail_kegiatan');
    $sDate  =  $this->input->post('start_date');
    $eDate  =  $this->input->post('end_date');

    $data  = [
      'detail_kegiatan' => $det,
      'start_date' => $sDate,
      'end_date' => $eDate
    ];

    $this->db->where('id', $id);
    $this->db->update('data_target', $data);
  }

  public function deleteTargetUser($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('data_target');
  }

  public function insertTargetAllUser($id)
  {
    $bawahan = $this->db->get_where('user', ['atasan_id' => $id])->result_array();

    $det    =  $this->input->post('detail_kegiatan');
    $sDate  =  $this->input->post('start_date');
    $eDate  =  $this->input->post('end_date');

    $data = [
      'detail_kegiatan' => $det,
      'start_date' => $sDate,
      'end_date' => $eDate
    ];

    foreach ($bawahan as $b) {
      $this->db->set('user_id', $b['id']);
      $this->db->insert('data_target', $data);
    }
  }
}
