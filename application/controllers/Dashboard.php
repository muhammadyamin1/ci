<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public $judul = NULL;
    public $dashboard = NULL;
    public function index()
    {
        $this->load->model('Judul');
        $this->load->model('Dashboard_model');
        $this->judul = $this->Judul;
        $this->dashboard = $this->Dashboard_model;
        $j = "Dashboard";
        $b = $this->uri->segment(1);
        $this->judul->set_judul($j);
        $this->judul->set_breadcrumb($b);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/breadcrumb', array('judul' => $this->judul));
        $this->load->view('admin/dashboard_view', array('Dashboard_model' => $this->Dashboard_model));
        $this->load->view('templates/footer');
        $this->load->view('templates/javascript/js');
        $this->load->view('templates/javascript/dashboard_js');
    }
}
