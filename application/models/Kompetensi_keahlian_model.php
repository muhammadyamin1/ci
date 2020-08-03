<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kompetensi_keahlian_model extends CI_Model
{
    public $id_kompetensi_keahlian;
    public $nama_kompetensi_keahlian;

    public function read(){
        $sql = "SELECT * FROM kompetensi_keahlian";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function insert(){
        $data = [
            'id_kompetensi_keahlian' => $this->id_kompetensi_keahlian,
            'nama_kompetensi_keahlian' => $this->nama_kompetensi_keahlian
        ];
        $this->db->insert('kompetensi_keahlian', $data);
    }

    public function update(){
        $data = [
            'nama_kompetensi_keahlian' => $this->nama_kompetensi_keahlian
        ];
        $where = "id_kompetensi_keahlian = '".$this->id_kompetensi_keahlian."'";
        $this->db->update('kompetensi_keahlian',$data,$where);
    }

    public function delete(){
        $id = $this->id_kompetensi_keahlian;
        $this->db->where('id_kompetensi_keahlian', $id);
        $this->db->delete('kompetensi_keahlian');
    }

    public function hapusterpilih($ID){
        $this->db->where('id_kompetensi_keahlian', $ID);
        $this->db->delete('kompetensi_keahlian');
    }
}