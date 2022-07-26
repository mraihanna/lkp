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
    $data['employee'] = $this->db->get_where('user', ['atasan_id' => $data['user']['id']])->result_array();
    $data['role']     = $this->db->get('user_role')->result_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/settings');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('target/list', $data);
    $this->load->view('templates/footer');
  }

  public function addTargetUser($id)
  {
    $data['title']    = 'Target';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['allUser']  = $this->db->get('user')->result_array();
    $data['role']     = $this->db->get('user_role')->result_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
    $data['targetUser'] = $this->db->get_where('data_target', ['user_id' => $id])->result_array();
    $data['id']         = $id;

    $this->form_validation->set_rules('detail_kegiatan', 'Detail Target', 'required');
    $this->form_validation->set_rules('start_date', 'Start Date', 'required');
    $this->form_validation->set_rules('end_date', 'End Date', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('target/user-target', $data);
      $this->load->view('templates/footer');
    } else {
      $this->target->insertTargetUser($id);
      $this->session->set_flashdata('message', 'Added!');
      redirect('target/addtargetuser/' . $id);
    }
  }

  public function editTargetUser($id_user, $id_target)
  {
    $data['title']    = 'Target';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['allUser']  = $this->db->get('user')->result_array();
    $data['role']     = $this->db->get('user_role')->result_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
    $data['targetUser'] = $this->db->get_where('data_target', ['user_id' => $id_user])->result_array();
    $data['id']         = $id_user;

    $this->form_validation->set_rules('detail_kegiatan', 'Detail Target', 'required');
    $this->form_validation->set_rules('start_date', 'Start Date', 'required');
    $this->form_validation->set_rules('end_date', 'End Date', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('target/user-target', $data);
      $this->load->view('templates/footer');
    } else {
      $this->target->updateTargetUser($id_target);
      $this->session->set_flashdata('message', 'Changed!');
      redirect('target/addtargetuser/' . $id_user);
    }
  }

  public function deleteTargetUser($id_user, $id_target)
  {
    $this->target->deleteTargetUser($id_target);
    $this->session->set_flashdata('message', 'Deleted!');
    redirect('target/addtargetuser/' . $id_user);
  }

  public function allEmployee()
  {
    $data['title']    = 'Target';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['allUser']  = $this->db->get('user')->result_array();
    $data['role']     = $this->db->get('user_role')->result_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();


    $this->form_validation->set_rules('detail_kegiatan', 'Detail Target', 'required');
    $this->form_validation->set_rules('start_date', 'Start Date', 'required');
    $this->form_validation->set_rules('end_date', 'End Date', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('target/all-target', $data);
      $this->load->view('templates/footer');
    } else {
      $this->target->insertTargetAllUser($data['user']['id']);
      $this->session->set_flashdata('message', 'Added!');
      redirect('target/allEmployee/');
    }
  }

  public function employee()
  {
    $data['title']    = 'Progress Employee';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['unitKerja'] = $this->db->get_where('user_unit_kerja', ['id' => $data['user']['unit_kerja_id']])->row_array();

    $data['role']     = $this->db->get('user_role')->result_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/settings');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('target/employee', $data);
    $this->load->view('templates/footer');
  }
}
