<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['title']    = 'My Profile';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/settings');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates/footer');
  }

  public function edit()
  {
    $data['title']    = 'Edit Profile';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();

    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('user/edit', $data);
      $this->load->view('templates/footer');
    } else {
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
          $old_image = $data['user']['image'];
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

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
      redirect('user');
    }
  }

  public function changepassword()
  {
    $data['title']    = 'Change Password';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();

    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');


    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('user/change-password', $data);
      $this->load->view('templates/footer');
    } else {
      $current_password = $this->input->post('current_password');
      $new_passwword    = $this->input->post('new_password1');

      if (!password_verify($current_password, $data['user']['password'])) {
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

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
          redirect('user/changepassword');
        }
      }
    }
  }
}
