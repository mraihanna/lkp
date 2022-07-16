<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Employee_model', 'employee');
    is_logged_in();
  }

  public function unitKerja()
  {
    $data['title']      = 'Unit Kerja Management';
    $data['user']       = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']    = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();

    $data['unitKerja']  = $this->db->get('user_unit_kerja')->result_array();

    $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('employee/unit-kerja', $data);
      $this->load->view('templates/footer');
    } else {
      $this->employee->insertUnitKerja();
      $this->session->set_flashdata('message', 'Added!');
      redirect('employee/unitKerja');
    }
  }

  public function editUnitKerja($id)
  {
    $data['title']      = 'Unit Kerja Management';
    $data['user']       = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']    = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();

    $data['unitKerja']  = $this->db->get('user_unit_kerja')->result_array();

    $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('employee/unit-kerja', $data);
      $this->load->view('templates/footer');
    } else {
      $this->employee->updateUnitKerja($id);
      $this->session->set_flashdata('message', 'Changed!');
      redirect('employee/unitKerja');
    }
  }

  public function deleteUnitKerja($id)
  {
    $this->employee->deleteUnitKerja($id);
    redirect('employee/unitkerja');
  }

  public function jabatan()
  {
    $data['title']        = 'Jabatan Management';
    $data['user']         = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']      = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();

    $data['jabatanReal']  = $this->db->get('user_jabatan')->result_array();

    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('employee/jabatan', $data);
      $this->load->view('templates/footer');
    } else {
      $this->employee->insertJabatan();
      $this->session->set_flashdata('message', 'Added!');
      redirect('employee/jabatan');
    }
  }

  public function editJabatan($id)
  {
    $data['title']        = 'Jabatan Management';
    $data['user']         = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']      = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();

    $data['jabatanReal']  = $this->db->get('user_jabatan')->result_array();

    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('employee/jabatan', $data);
      $this->load->view('templates/footer');
    } else {
      $this->employee->updateJabatan($id);
      $this->session->set_flashdata('message', 'Changed!');
      redirect('employee/jabatan');
    }
  }

  public function deletejabatan($id)
  {
    $this->employee->deleteJabatan($id);
    redirect('employee/jabatan');
  }
}
