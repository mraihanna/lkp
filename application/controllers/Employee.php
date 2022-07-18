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

  public function register()
  {
    $data['title']        = 'Register Employee';
    $data['user']         = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']      = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();
    $this->db->where('id !=', 1);
    $data['allRole']      = $this->db->get('user_role')->result_array();
    $data['allUnitKerja'] = $this->db->get('user_unit_kerja')->result_array();
    $data['allUser']      = 'as';

    $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required');
    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('employee/register', $data);
      $this->load->view('templates/footer');
    } else {
      $role       = $this->input->post('role');
      $unitKerja  = $this->input->post('unit_kerja');
      redirect('employee/registerNext/' . $role . '/' . $unitKerja);
    }
  }

  public function registerNext($role, $unitKerja)
  {
    $data['title']        = 'Register Employee - Next';
    $data['user']         = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']      = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();
    $data['role']         = $role;
    $data['unitKerja']    = $unitKerja;
    $data['jabatanFunc']  = $this->db->get('user_jabatan')->result_array();
    $data['allUnitKerja'] = $this->db->get_where('user', ['unit_kerja_id' => $unitKerja, 'role_id' => 2])->result_array();

    $this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric|is_unique[user.nip]', [
      'is_unique' => 'This NIP has already Taken!'
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'This Email has already registered!'
    ]);
    $this->form_validation->set_rules('name', 'Full Name', 'required');
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
    if ($role != 2) {
      $this->form_validation->set_rules('atasan', 'Atasan', 'required');
    }

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('employee/register-next', $data);
      $this->load->view('templates/footer');
    } else {
      $this->employee->insertEmployee();
      $this->session->set_flashdata('message', 'Added!');
      redirect('employee/register');
    }
  }

  public function dataEmployee()
  {
    $data['title']      = 'Data Employee';
    $data['user']       = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']    = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();

    $data['employee']   = $this->employee->getEmployee();

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('employee/data-employee', $data);
      $this->load->view('templates/footer');
    } else {
      $this->employee->insertUnitKerja();
      $this->session->set_flashdata('message', 'Added!');
      redirect('employee/unitKerja');
    }
  }
}
