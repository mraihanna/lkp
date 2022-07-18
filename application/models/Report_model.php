<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{
  public function insertDailyReport($id)
  {
    $user_id      = $id;
    $kegiatan     = $this->input->post('kegiatan');
    $tanggal      = $this->input->post('tanggal');
    $jam_mulai    = $this->input->post('jam_mulai');
    $jam_selesai  = $this->input->post('jam_selesai');
    $jumlah       = $this->input->post('jumlah');
    $satuan_kerja = $this->input->post('satuan_kerja');
    $tempat       = $this->input->post('tempat');
    $keterangan   = $this->input->post('keterangan');
    $new_doc      = 0;

    $uploadDoc    = $_FILES['dok_pend']['name'];

    if ($uploadDoc) {
      $config['allowed_types']  = 'pdf';
      $config['max_size']       = '2048'; //2 mega
      $config['upload_path']    = './assets/dokumen/';

      $this->load->library('upload', $config); //library confignya

      if ($this->upload->do_upload('dok_pend')) {

        $new_doc = $this->upload->data('file_name');
      } else {
        $this->session->set_flashdata('message-file', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
        redirect('report');
      }
    }

    $data = [
      'user_id'         => $user_id,
      'nama_kegiatan'   => $kegiatan,
      'tanggal_dimulai' => $tanggal,
      'jam_mulai'       => $jam_mulai,
      'jam_selesai'     => $jam_selesai,
      'jumlah_satuan'   => $jumlah,
      'satuan_kerja_id' => $satuan_kerja,
      'tempat_kegiatan' => $tempat,
      'keterangan'      => $keterangan,
      'dok_pendukung'   => $new_doc,
      'verifikator_id'  => 0,
      'is_verify'       => 0
    ];

    return $this->db->insert('data_kegiatan', $data);
  }

  public function getEmployee($nip)
  {
    $query = "SELECT user.*, user_jabatan.jabatan, user_unit_kerja.unit_kerja, user_role.role
        FROM user JOIN user_jabatan
        ON user.jabatan_id = user_jabatan.id
        JOIN user_unit_kerja
        ON user.unit_kerja_id = user_unit_kerja.id
        JOIN user_role
        ON user.role_id = user_role.id
        WHERE user.nip = " . $nip;
    return $this->db->query($query)->result_array();
  }
}
