<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['title']    = 'Dashboard';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/settings');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('dashboard/index', $data);
    $this->load->view('templates/footer');
  }
}
