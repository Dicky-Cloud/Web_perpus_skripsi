<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function check_login() {
    $ci =& get_instance();
    $ci->load->library('session'); // pastikan session diload

    if (!$ci->session->userdata('logged_in')) {
        redirect('auth'); // arahkan ke controller login kamu
        exit; // sangat penting untuk menghentikan eksekusi
    }
}
