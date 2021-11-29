<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
    }

    public function index()
    {
        $this->load->view('templateslogin/header');
        $this->load->view('v_login');
        $this->load->view('templateslogin/footer');
    }

    public function proses()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        if ($this->auth->login_user($email, $password)) {
            redirect('admin');
        } else {
            $this->session->set_flashdata('error', 'email & Password salah');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('is_login');
        // $this->session->sess_destroy();
        redirect('login');
    }
}
