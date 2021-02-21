<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model{
    public function read(){
        $sql = "SELECT siswa.nisn,siswa.nis,siswa.nama,kelas.nama_kelas,siswa.alamat,siswa.no_telp,siswa.photo FROM siswa LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}