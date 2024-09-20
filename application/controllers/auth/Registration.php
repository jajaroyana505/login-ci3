<?php

class Registration extends CI_Controller
{
    public function index()
    {
        // mendefinisikan aturan 
        $this->form_validation->set_rules('name', 'nama lengkap', 'required|min_length[3]');
        $this->form_validation->set_rules('no_tlp', 'no telepon', 'required|min_length[11]|max_length[13]|numeric');
        $this->form_validation->set_rules('nip', 'nip', 'required|numeric');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        // cek validasi
        if ($this->form_validation->run() == FALSE) {
            // jika validasi false
            // tampilkan form registrasi
            $this->load->view('auth/header');
            $this->load->view('auth/registration');
            $this->load->view('auth/footer');
        } else {
            $this->proses_register();
        }
    }


    public function proses_register()
    {
        // ambil data dari inputan kemudian masukan ke dalam masing2 variable
        $name = $this->input->post('name');
        $no_tlp = $this->input->post('no_tlp');
        $nip = $this->input->post('nip');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // enskripsi passwor dari user
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // parshing ulang data menjadi data array baru
        $data = array(
            "nama" => $name,
            "no_tlp" => $no_tlp,
            "nip" => $nip,
            "email" => $email,
            "password" => $password_hash
        );

        // Proses simpan data ke database
        $this->load->model('UserModel'); // load model
        $this->UserModel->simpan($data);

        // membuat flash data untuk pesan notifikasi
        $this->session->set_flashdata('success', 'Selamat registrasi berhasil!');

        // setelah berhasil di simpan alihkan ke halaman login
        redirect(base_url('login'));
    }
}
