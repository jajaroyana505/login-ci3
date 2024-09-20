<?php

class Registration extends CI_Controller
{
    public function index()
    {
        $this->load->view('auth/header');
        $this->load->view('auth/registration');
        $this->load->view('auth/footer');
    }

    public function proses_register()
    {
        $user = array(
            "nama" => $this->input->post('name'),
            "no_tlp" => $this->input->post('no_tlp'),
            "nip" => $this->input->post('nip'),
            "email" => $this->input->post('email'),
            "password" => $this->input->post('password'),
        );
        $this->db->insert('users', $user);
        // var_dump($this->input->post());
    }
}
