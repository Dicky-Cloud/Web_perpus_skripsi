<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarbuku extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BukuModel');
    }

    public function index() 
    { // Harus sama dengan model yang di-load
        
    $data['buku'] = $this->BukuModel->get_all_buku();
        $this->load->view('Daftarbuku', $data);
    }
    
    public function get_all() {
        return $this->db->get('buku')->result(); // ganti nama_tabel_buku dengan nama tabel aslinya
    }
}
