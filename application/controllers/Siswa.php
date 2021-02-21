<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Judul');
        $this->judul = $this->Judul;
        $this->load->model('Siswa_model');
        $this->model = $this->Siswa_model;
    }

    public function index()
    {
        $j = "Data Siswa";
        $b = $this->uri->segment(1);
        $this->judul->set_judul($j);
        $this->judul->set_breadcrumb($b);

        $this->read();
    }

    public function read(){
        $query = $this->model->read();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/breadcrumb', array('judul' => $this->judul));
        $this->load->view('admin/siswa_view', array('query' => $query, 'model' => $this->model));
        $this->load->view('templates/footer');
        $this->load->view('templates/javascript/js');
        $this->load->view('templates/javascript/siswa_js');
    }
}
