<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkidkelas extends CI_Model
{
    public $id;

    public function set_id($ID){
        $this->id = $ID;
    }

    public function check()
    {
        $sql = "SELECT * FROM `kelas` WHERE id_kelas = '$this->id'";
        $query = $this->db->query($sql);
        if ($query->num_rows() == 0) {
            echo "true";
        } else {
            echo "false";
        }
    }
}