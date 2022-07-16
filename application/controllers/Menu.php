<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Menu_model', 'menu');
    is_logged_in();
  }

  public function index()
  {
    $data['title']    = 'Menu Management';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();

    $data['menu']     = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->menu->insertMenu();
      $this->session->set_flashdata('message', 'Added!');
      redirect('menu');
    }
  }

  public function editMenu($id)
  {
    $data['title']    = 'Menu Management';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();
    $data['menu']     = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'trim|required');
    $this->form_validation->set_rules('icon', 'Icon', 'trim|required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->menu->editMenu($id);
      $this->session->set_flashdata('message', 'Changed!');
      redirect('menu');
    }
  }

  public function deleteMenu($id)
  {
    $this->menu->deleteMenu($id);
    redirect('menu');
  }

  public function submenu()
  {
    $data['title']    = 'Sub Menu Management';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();
    $data['subMenu']  = $this->menu->getSubMenu();
    $data['menu']     = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('is_active', 'Icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/footer');
    } else {
      $this->menu->insertSubMenu();
      $this->session->set_flashdata('message', 'Added!');
      redirect('menu/submenu');
    }
  }

  public function editSubMenu($id)
  {
    $data['title']    = 'Sub Menu Management';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();
    $data['menu']     = $this->db->get('user_menu')->result_array();
    $data['subMenu']  = $this->menu->getSubMenu();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('is_active', 'Icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/footer');
    } else {
      $this->menu->editSubMenu($id);
      $this->session->set_flashdata('message', 'Changed!');
      redirect('menu/submenu');
    }
  }

  public function deleteSubMenu($id)
  {
    $this->menu->deleteSubMenu($id);
    redirect('menu/submenu');
  }
}
