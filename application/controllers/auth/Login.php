<?php
class Login extends CI_Controller
{
    public function index()
    {
        // Mendefinisakn role validasi form login
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'passwor', 'required');


        // cek validation 
        if ($this->form_validation->run() == true) {
            // Jika Validasi True jalankan prosess login

            // Ambil masing-masing data dari formulir kemudian masukan kedalam masing-masing varibel
            $email = $this->input->post('email');
            $password = $this->input->post('password');


            // cek apakah email ada atau tidak?
            $email_tersedia = $this->db->get_where('users', ['email' => $email])->num_rows();
            if ($email_tersedia) {
                // jika ada ambil data user berdasarkan email dari formulir login
                $data_user = $this->db->get_where('users', ['email' => $email])->row_object();

                $password_hash_user = $data_user->password;
                // cek password yang di inputkan dari formulir sama atau tidak dengan password yang ada di database
                if (password_verify($password, $password_hash_user)) {
                    // jika benar alihkan ke halaman dashboard

                    // bikin redirect ke halaman dashboard
                    echo "password benar";
                } else {
                    // jika password tidak sama kemabalikan ke halaman login dan berikan pesan kesalahan
                    $this->session->set_flashdata('failed', 'Password yang anda masukan salah!'); // membuat pesan kesalahan

                    redirect(base_url('login'));  //mengalihkan ke halaman login
                }
            } else {
                // jika emaal tidak ada kembali ke halaman login dan berikan pesan kesalah
                $this->session->set_flashdata('failed', 'Email yang anda masukan tidak terdaptar!'); //membuat pesan kesalahan
                redirect(base_url('login')); // mengalihkan ke halaman login
            }
        } else {
            // jika Validasi false tampilkna halaman login beserta eror jika ada
            $this->load->view('auth/header');
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        }
    }
}
