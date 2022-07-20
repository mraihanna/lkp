<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Activity extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Activity_model', 'activity');
    is_logged_in();
  }

  public function satuanKerja()
  {
    $data['title']    = 'Satuan Kerja';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();

    $data['satuanKerja'] = $this->db->get('data_satuan_kerja')->result_array();

    $this->form_validation->set_rules('satuan_kerja', 'Satuan Kerja', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('activity/satuan-kerja', $data);
      $this->load->view('templates/footer');
    } else {
      $this->activity->insertSatuanKerja();
      $this->session->set_flashdata('message', 'Added!');
      redirect('activity/satuanKerja');
    }
  }

  public function editSatuanKerja($id)
  {
    $data['title']    = 'Satuan Kerja';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();

    $data['satuanKerja'] = $this->db->get('data_satuan_kerja')->result_array();

    $this->form_validation->set_rules('satuan_kerja', 'Satuan Kerja', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('activity/satuan-kerja', $data);
      $this->load->view('templates/footer');
    } else {
      $this->activity->updateSatuanKerja($id);
      $this->session->set_flashdata('message', 'Changed!');
      redirect('activity/satuanKerja');
    }
  }

  public function deleteSatuanKerja($id)
  {
    $this->activity->deleteSatuanKerja($id);
    redirect('activity/satuanKerja');
  }
}
