<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Target extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Target_model', 'target');
    is_logged_in();
  }

  public function list()
  {
    $data['title']    = 'Target';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['allUser']     = $this->db->get('user')->result_array();
    $data['role']     = $this->db->get('user_role')->result_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/settings');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('target/list', $data);
    $this->load->view('templates/footer');
  }

  public function userAdd($id)
  {
    $data['title']    = 'Target';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['allUser']  = $this->db->get('user')->result_array();
    $data['role']     = $this->db->get('user_role')->result_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('target/user-target', $data);
      $this->load->view('templates/footer');
    } else {
      // $this->role->insertRole();
      $this->session->set_flashdata('message', 'Added!');
      redirect('role');
    }
  }
}
