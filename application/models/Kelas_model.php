<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
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
}