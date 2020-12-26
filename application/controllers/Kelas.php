<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public $judul = NULL;
    public $model = NULL;
    public $check = NULL;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Judul');
        $this->judul = $this->Judul;
        $this->load->model('Kelas_model');
        $this->model = $this->Kelas_model;
        $this->load->model('CheckID/Checkidkelas');
        $this->check = $this->Checkidkelas;
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

    public function con_tambah(){
        if(isset($_POST['btnSubmit'])) {
            $this->model->id_kelas = str_replace(' ','',$_POST['idkelas']);
            $this->model->nama_kelas = $_POST['kelas'];
            $this->model->id_kompetensi_keahlian = $_POST['k_keahlian'];
            $this->model->insert();
            $this->session->set_flashdata('pesan', 'tambah');
            redirect('kelas');
        }
    }

    public function con_edit($id){
        if(isset($_POST['btnSubmit'])) {
            $this->model->id_kelas = $_POST['key'];
            $this->model->nama_kelas = $_POST['kelas'];
            $this->model->id_kompetensi_keahlian = $_POST['k_keahlian'];
            $this->model->update();
            $this->session->set_flashdata('pesan', 'edit');
            redirect('kelas');
        }else{
            $j = "Update Data Kelas";
            $b = $this->uri->segment(1);
            $this->judul->set_judul($j);
            $this->judul->set_breadcrumb($b);
            $loadkompetensikeahlian = $this->model->load_kompetensi_keahlian();
            $query = $this->db->query("SELECT * FROM kelas WHERE id_kelas='$id'");
            $row = $query->row();
            $this->model->id_kelas = $row->id_kelas;
            $this->model->nama_kelas = $row->nama_kelas;
            $this->model->id_kompetensi_keahlian = $row->id_kompetensi_keahlian;
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/breadcrumb', array('judul' => $this->judul));
            $this->load->view('admin/kelas_update_view', array('loadkeahlian' => $loadkompetensikeahlian, 'model' => $this->model));
            $this->load->view('templates/footer');
            $this->load->view('templates/javascript/js');
            $this->load->view('templates/javascript/kelas_js');
        }
    }

    public function check(){
        $ID = $_POST['id'];
        $this->check->set_id($ID);
        $this->check->check();
    }

    public function con_hapus($id){
        $this->model->id_kelas = $id;
        $data = $this->model->delete();
        if($data != 0){
            $this->session->set_flashdata('pesan', 'gagalhapus');
            redirect('kelas');
        }else{
            $this->session->set_flashdata('pesan', 'hapus');
            redirect('kelas');
        }
    }

    public function deletechecked()
    {
        $ID = $_POST['id'];
        $this->model->hapusterpilih($ID);
    }

    public function cetak_kelas(){
        $query = $this->model->read();
        $this->load->view('cetak/cetak_kelas', array('query' => $query));
    }

    public function cetak_kelas_excel(){
        $query = $this->model->read();
        $this->load->view('cetak/cetak_kelas_excel', array('query' => $query));
    }
}
