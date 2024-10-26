<?php

class User extends CI_Controller
{
    public function index()
    {
        $data = [
            "page" => 'user',
            "users" => $this->db->get("users")->result_array(),
            
        ];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('admin/footer');
    }

    public function create()
    {
        // mendefinisikan aturan 
        $this->form_validation->set_rules('name', 'nama lengkap', 'required|min_length[3]');
        $this->form_validation->set_rules('no_tlp', 'no telepon', 'required|min_length[11]|max_length[13]|numeric');
        $this->form_validation->set_rules('nip', 'nip', 'required|numeric');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('role', 'role', 'required');

        // cek validasi
        if ($this->form_validation->run() == FALSE) {
            // jika validasi false
            // tampilkan form registrasi
            $data = [
                "page" => 'user',
            ];
            $this->load->view('admin/header', $data);
            $this->load->view('admin/user_tambah');
            $this->load->view('admin/footer');
        } else {
            $data = [
                "nama" => $this->input->post('name'),
                "no_tlp" => $this->input->post('no_tlp'),
                "nip" => $this->input->post('nip'),
                "email" => $this->input->post('email'),
                "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                "role" => $this->input->post('role'),
            ];

            $this->load->model('UserModel');
            $this->UserModel->simpan($data);

            $this->session->set_flashdata('success', 'User baru berhasil ditambahkan');
            redirect(base_url('user'));
        }
    }
}
