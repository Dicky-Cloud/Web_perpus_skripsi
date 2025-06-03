<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarbukuModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        return $this->db->insert('buku', $data);
    }

    public function get_all() {
        return $this->db->get('buku')->result();
    }
}
