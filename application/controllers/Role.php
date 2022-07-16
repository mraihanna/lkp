<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $this->load->model('Role_model', 'role'); //jadi menu dikanan tuh alias nya nanti ketika manggil
    is_logged_in();
  }

  public function index()
  {
    $data['title']    = 'Role';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['role']     = $this->db->get('user_role')->result_array();

    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('role/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->role->insertRole();
      $this->session->set_flashdata('message', 'Added!');
      redirect('role');
    }
  }

  public function access($roleId)
  {
    $data['title']    = 'Role Access';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['role']     = $this->db->get_where('user_role', ['id' => $roleId])->row_array();
    $this->db->where('id !=', 10);
    $data['menu']     = $this->db->get('user_menu')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/settings');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('role/access', $data);
    $this->load->view('templates/footer');
  }

  public function changeAccess()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('user_access_menu', $data);

    if ($result->num_rows() < 1) {
      $this->db->insert('user_access_menu', $data);
    } else {
      $this->db->delete('user_access_menu', $data);
    }

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Change</div>');
  }

  public function editRole($id)
  {
    $data['title']    = 'Role';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['role']     = $this->db->get('user_role')->result_array();

    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('role/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->role->updateRole($id);
      $this->session->set_flashdata('message', 'Changed!');
      redirect('role');
    }
  }

  public function deleteRole($id)
  {
    $this->role->deleteRole($id);
    redirect('role');
  }
}
