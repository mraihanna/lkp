<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Company_model', 'company');
    is_logged_in();
  }

  public function settings()
  {
    $data['title']    = 'Settings Company';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();

    $data['company']  = $this->db->get('perusahaan')->row_array();

    $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('tlp', 'Telepon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('company/settings', $data);
      $this->load->view('templates/footer');
    } else {
      $this->company->updateCompany($data['company']['logo']);
      $this->session->set_flashdata('message', 'Added!');
      redirect('company/settings');
    }
  }
}
