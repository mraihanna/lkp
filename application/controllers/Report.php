<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Report_model', 'report');
    is_logged_in();
  }

  public function index()
  {
    $data['title']    = 'Daily Report';
    $data['user']     = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']  = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();
    $data['role']     = $this->db->get('user_role')->result_array();
    $id               = $data['user']['id'];

    $this->db->order_by('end_date', 'asc');
    $data['target']   = $this->db->get_where('data_target', ['user_id' => $data['user']['id']])->result_array();

    $data['satuan']   = $this->db->get('data_satuan_kerja')->result_array();

    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('target', 'Target', 'required');
    $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
    $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah Satuan', 'required');
    $this->form_validation->set_rules('satuan_kerja', 'Satuan Kerja', 'required');
    $this->form_validation->set_rules('tempat', 'Tempat Kegiatan', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    $this->form_validation->set_rules('dok_pend', 'Dokumen Pendukung', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('report/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->report->insertDailyReport($id);
      $this->session->set_flashdata('message', 'Added!');
      redirect('report');
    }
  }

  public function history()
  {
    $data['title']      = 'History Report';
    $data['user']       = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['jabatan']    = $this->db->get_where('user_role', ['id' => $data['user']['role_id']])->row_array();

    $data['employee']   = $this->report->getEmployee($data['user']['nip']);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/settings');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('report/history', $data);
      $this->load->view('templates/footer');
    } else {
      // $this->employee->insertUnitKerja();
      $this->session->set_flashdata('message', 'Added!');
      redirect('employee/unitKerja');
    }
  }
}
