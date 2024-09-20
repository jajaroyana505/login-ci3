<?php
class Login extends CI_Controller
{
    public function index()
    {
        $this->load->view('auth/header');
        $this->load->view('auth/login');
        $this->load->view('auth/footer');
    }
}
