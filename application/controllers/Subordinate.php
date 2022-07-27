<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subordinate extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Report_model', 'report');
    is_logged_in();
  }

  public function report()
  {
    $data['title']      = 'Subordinate Report';
    $data['user']       = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']    = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();
    $data['subordinate'] = $this->db->get_where('user', ['atasan_id' => $data['user']['id']])->result_array();
    $data['countSubordinate'] = $this->db->get_where('user', ['atasan_id' => $data['user']['id']])->num_rows();

    $data['employee']   = $this->report->getEmployee($data['user']['nip']);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('subordinate/report', $data);
      $this->load->view('templates/footer');
    } else {
      // $this->employee->insertUnitKerja();
      $this->session->set_flashdata('message', 'Added!');
      redirect('employee/unitKerja');
    }
  }
}
