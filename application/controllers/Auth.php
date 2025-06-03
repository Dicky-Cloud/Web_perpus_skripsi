<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel'); // Memuat model untuk user
        $this->load->library('session'); // Memuat library session
        $this->load->helper('url'); // Memuat helper URL
    }

    public function index()
    {
        // Menampilkan halaman login
        $this->load->view('login/auth');
    }

    public function login()
    {
        // Mengambil input dari form login
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Ambil user berdasarkan username
        $user = $this->AuthModel->get_user_by_username($username);

      
            if (md5($password) === $user->password) {
    // Jika password cocok, set session
    $this->session->set_userdata([
        'user_id'  => $user->id_login,
        'username' => $user->username,
        'logged_in' => TRUE // ✅ ini penting untuk fungsi check_login()
    ]);

    redirect('home');
}
else {
                // Jika password salah, tampilkan pesan kesalahan
                $this->session->set_flashdata('error', 'Username atau password salah');
                redirect('auth');
            }
        } 
    public function logout()
    {
        // Menghancurkan session dan redirect ke halaman login
        $this->session->sess_destroy();
        redirect('auth');
    }
}
