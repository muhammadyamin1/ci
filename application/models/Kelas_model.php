<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
    public $id_kelas;
    public $nama_kelas;
    public $id_kompetensi_keahlian; 

    public function read(){
        $sql = "SELECT id_kelas, nama_kelas, nama_kompetensi_keahlian FROM kelas, kompetensi_keahlian where kelas.id_kompetensi_keahlian = kompetensi_keahlian.id_kompetensi_keahlian";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function load_kompetensi_keahlian(){
        $sql = "SELECT * FROM kompetensi_keahlian";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function insert(){
        $data = [
            "id_kelas" => $this->id_kelas,
            "nama_kelas" => $this->nama_kelas,
            "id_kompetensi_keahlian" => $this->id_kompetensi_keahlian
        ];
        $this->db->insert('kelas', $data);
    }

    public function update(){
        $data = [
            'nama_kelas' => $this->nama_kelas,
            'id_kompetensi_keahlian' => $this->id_kompetensi_keahlian
        ];
        $where = "id_kelas = '".$this->id_kelas."'";
        $this->db->update('kelas',$data,$where);
    }

    public function delete(){
        $id = $this->id_kelas;
        $this->db->where('id_kelas', $id);
        $this->db->delete('kelas');
    }
}