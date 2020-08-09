<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kompetensi_keahlian extends CI_Controller
{
    public $judul = NULL;
    public $model = NULL;
    public $check = NULL;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Judul');
        $this->judul = $this->Judul;
        $this->load->model('Kompetensi_keahlian_model');
        $this->model = $this->Kompetensi_keahlian_model;
        $this->load->model('CheckID/Checkidkeahlian');
        $this->check = $this->Checkidkeahlian;
    }

    public function index()
    {
        $j = "Data Kompetensi Keahlian";
        $b = $this->uri->segment(1);
        $this->judul->set_judul($j);
        $this->judul->set_breadcrumb($b);

        $this->read();
    }

    public function con_tambah()
    {
        if (isset($_POST['btnSubmit'])) {
            $this->model->id_kompetensi_keahlian = $_POST['idkeahlian'];
            $this->model->nama_kompetensi_keahlian = $_POST['keahlian'];
            $this->model->insert();
            $this->session->set_flashdata('pesan', 'tambah');
            redirect('kompetensi_keahlian');
        }
    }

    public function con_edit($id)
    {
        if (isset($_POST['btnSubmit'])) {
            $this->model->id_kompetensi_keahlian = $_POST['key'];
            $this->model->nama_kompetensi_keahlian = $_POST['keahlian'];
            $this->model->update();
            $this->session->set_flashdata('pesan', 'edit');
            redirect('kompetensi_keahlian');
        } else {
            $j = "Update Data Kompetensi Keahlian";
            $b = $this->uri->segment(1);
            $this->judul->set_judul($j);
            $this->judul->set_breadcrumb($b);
            $query = $this->db->query("SELECT * FROM kompetensi_keahlian WHERE id_kompetensi_keahlian='$id'");
            $row = $query->row();
            $this->model->id_kompetensi_keahlian = $row->id_kompetensi_keahlian;
            $this->model->nama_kompetensi_keahlian = $row->nama_kompetensi_keahlian;
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/breadcrumb', array('judul' => $this->judul));
            $this->load->view('admin/kompetensi_keahlian_update_view', array('model' => $this->model));
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        }
    }

    public function con_hapus($id)
    {
        $this->model->id_kompetensi_keahlian = $id;
        $this->model->delete();
        $this->session->set_flashdata('pesan', 'hapus');
        redirect('kompetensi_keahlian');
    }

    public function check()
    {
        $ID = $_POST['id'];
        $this->check->set_id($ID);
        $this->check->check();
    }

    public function deletechecked()
    {
        foreach ($_POST['id'] as $ID) {
            $this->model->hapusterpilih($ID);
        }
    }

    public function cetak_keahlian()
    {
        $query = $this->model->read();
        $this->load->view('cetak/cetak_keahlian', array('query' => $query));
    }

    public function cetak_keahlian_excel()
    {
        $this->load->library("excel");
        $query = $this->model->read();
        $this->load->view('cetak/cetak_keahlian_excel', array('query' => $query));
    }

    public function read()
    {
        $query = $this->model->read();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/breadcrumb', array('judul' => $this->judul));
        $this->load->view('admin/kompetensi_keahlian_view', array('query' => $query));
        $this->load->view('templates/footer');
        $this->load->view('templates/javascript/js');
        $this->load->view('templates/javascript/kompetensi_keahlian_js');
    }
}
