<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company_model extends CI_Model
{
  public function updateCompany($logo)
  {
    $perusahaan   = $this->input->post('perusahaan');
    $alamat       = $this->input->post('alamat');
    $tlp          = $this->input->post('tlp');
    $image        = $logo;

    // jika ada gambar
    $uploadImage = $_FILES['logo']['name'];

    if ($uploadImage) {
      $config['allowed_types']  = 'jpg|png|jpeg';
      $config['max_size']       = '2048'; //2 mega
      $config['upload_path']    = './assets/images/logo/';

      $this->load->library('upload', $config); //library confignya

      if ($this->upload->do_upload('logo')) {
        $old_image = $logo;
        unlink(FCPATH . 'assets/images/logo/' . $old_image);

        $image = $this->upload->data('file_name');
      } else { //kalogagal
        $this->session->set_flashdata('message-error', $this->upload->display_errors());
        redirect('company/settings');
      }
    }
    $data = [
      'perusahaan'  => $perusahaan,
      'alamat'      => $alamat,
      'tlp'         => $tlp,
      'logo'        => $image
    ];
    $this->db->where('id', 1);
    $this->db->update('perusahaan', $data);
  }
}
