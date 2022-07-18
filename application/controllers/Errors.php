<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Errors extends CI_Controller
{

  public function index()
  {
    $data['title']    = '404';

    $this->load->view('templates/error_header', $data);
    $this->load->view('error/404');
    $this->load->view('templates/error_footer');
  }

  public function server()
  {
    $data['title']    = '505';

    $this->load->view('templates/error_header', $data);
    $this->load->view('error/500');
    $this->load->view('templates/error_footer');
  }

  public function maintenance()
  {
    $data['title']    = '101';

    $this->load->view('templates/error_header', $data);
    $this->load->view('error/101');
    $this->load->view('templates/error_footer');
  }

  public function denied()
  {
    $data['title']    = '401';

    $this->load->view('templates/error_header', $data);
    $this->load->view('error/401');
    $this->load->view('templates/error_footer');
  }

  public function nyoba()
  {
    echo $this->input->post('kegiatan');
    echo '<br>';
    echo $this->input->post('tanggal');
    echo '<br>';
    echo $this->input->post('jam_mulai');
    echo '<br>';
    echo $this->input->post('jam_selesai');
    echo '<br>';
    echo $this->input->post('jumlah');
    echo '<br>';
    echo $this->input->post('satuan_kerja');
    echo '<br>';
    echo $this->input->post('tempat');
    echo '<br>';
    echo $this->input->post('keterangan');
    echo '<br>';

    var_dump($_FILES);
  }
}
