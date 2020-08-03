<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function hitung_kelas()
    {
        $query = $this->db->query('SELECT * FROM kelas');
        return $query->num_rows();
    }
    public function hitung_kompetensi()
    {
        $query = $this->db->query('SELECT * FROM kompetensi_keahlian');
        return $query->num_rows();
    }
    public function hitung_siswa()
    {
        $query = $this->db->query('SELECT * FROM siswa');
        return $query->num_rows();
    }
    public function hitung_petugas()
    {
        $query = $this->db->query('SELECT * FROM petugas');
        return $query->num_rows();
    }
    public function hitung_transaksi()
    {
        $query = $this->db->query('SELECT * FROM pembayaran');
        return $query->num_rows();
    }
}