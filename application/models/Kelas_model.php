<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
    public function load_kompetensi_keahlian(){
        $sql = "SELECT * FROM kompetensi_keahlian";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}