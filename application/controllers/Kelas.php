<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public $judul = NULL;
    public $model = NULL;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Judul');
        $this->judul = $this->Judul;
        $this->load->model('Kelas_model');
        $this->model = $this->Kelas_model;
    }

    public function index()
    {
        $j = "Data Kelas";
        $b = $this->uri->segment(1);
        $this->judul->set_judul($j);
        $this->judul->set_breadcrumb($b);

        $this->read();
    }

    public function read(){
        $loadkompetensikeahlian = $this->model->load_kompetensi_keahlian();
        $query = $this->model->read();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/breadcrumb', array('judul' => $this->judul));
        $this->load->view('admin/kelas_view',array('query' => $query,'loadkeahlian' => $loadkompetensikeahlian));
        $this->load->view('templates/footer');
        $this->load->view('templates/javascript/js');
        $this->load->view('templates/javascript/kelas_js');
    }
}
