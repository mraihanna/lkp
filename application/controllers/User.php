<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'user');
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
      $this->user->updateUser($data['user']['image']);
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
      $this->user->changePassword($data['user']['password']);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
      redirect('user/changepassword');
    }
  }
}
