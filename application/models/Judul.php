<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Judul extends CI_Model
{
    private $judul;

    public function set_judul($j)
    {
        $this->judul = $j;
    }

    public function get_judul()
    {
        return $this->judul;
    }

    public function set_breadcrumb($b)
    {
        $this->breadcrumb = $b;
    }

    public function get_breadcrumb()
    {
        if($this->breadcrumb == "dashboard" || $this->breadcrumb == ""){
            $this->breadcrumb = [
                "<a href='".base_url()."dashboard'>Dashboard</a>"
            ];
        }
        else if($this->breadcrumb == "kelas"){
            $this->breadcrumb = [
                "Master Data",
                "<a href='".base_url()."kelas'>Kelas</a>"
            ];
        }
        else if($this->breadcrumb == "kompetensi_keahlian"){
            $this->breadcrumb = [
                "Master Data",
                "<a href='".base_url()."kompetensi_keahlian'>Kompetensi Keahlian</a>"
            ];
        }
        else{
            $this->breadcrumb = ["Breadcrumb Is Not Defined"];
        }
        return $this->breadcrumb;
    }
}
