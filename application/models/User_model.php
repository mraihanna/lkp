<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  public function updateUser($image)
  {
    $email  = $this->input->post('email');
    $name   = $this->input->post('name');

    // jika ada gambar
    $uploadImage = $_FILES['image']['name'];

    if ($uploadImage) {
      $config['allowed_types']  = 'jpg|png|jpeg';
      $config['max_size']       = '2048'; //2 mega
      $config['upload_path']    = './assets/images/avatar/';

      $this->load->library('upload', $config); //library confignya

      if ($this->upload->do_upload('image')) {
        $old_image = $image;
        if ($old_image != 'default.png') {
          unlink(FCPATH . 'assets/images/avatar/' . $old_image); //buat ngehapus
        }

        $new_image = $this->upload->data('file_name'); //berisi nama file baru
        $this->db->set('image', $new_image);
      } else { //kalogagal
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
        redirect('user');
      }
    }

    $this->db->set('name', $name);
    $this->db->where('email', $email);
    $this->db->update('user');
  }

  public function changePassword($pass)
  {
    $current_password = $this->input->post('current_password');
    $new_passwword    = $this->input->post('new_password1');

    if (!password_verify($current_password, $pass)) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Passwword</div>');
      redirect('user/changepassword');
    } else {
      if ($current_password == $new_passwword) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
        redirect('user/changepassword');
      } else {
        // password sudah ok
        $password_hash = password_hash($new_passwword, PASSWORD_DEFAULT);

        $this->db->set('password', $password_hash);
        $this->db->where('nip', $this->session->userdata('nip'));
        $this->db->update('user');
      }
    }
  }
}
