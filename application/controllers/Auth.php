<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index($nip = "")
  {
    if ($this->session->userdata('nip')) {
      redirect('dashboard');
    }

    $data['title']  = 'Login';
    $data['nip']    = $nip;
    // var_dump($nip);

    $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $nip      = $this->input->post('nip');
    $password = $this->input->post('password');

    $user     = $this->db->get_where('user', ['nip' => $nip])->row_array();
    // usernya ada
    if ($user) {
      // usernya aktif
      if ($user['is_active'] == 1) {
        // cek password
        if (password_verify($password, $user['password'])) {
          $data = [
            'nip'   => $user['nip'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) {
            $this->session->set_flashdata('message', 'Success!');
            redirect('dashboard');
          } else {
            $this->session->set_flashdata('message', 'Success!');
            redirect('dashboard');
          }
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
          redirect('auth/index/' . $nip);
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This account is not active</div>');
        redirect('auth/index/' . $nip);
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIP is not registered</div>');
      redirect('auth/index/' . $nip); //nih ini bener nih hahaay
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('nip');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('message', 'success');
    redirect('auth');
  }
}
