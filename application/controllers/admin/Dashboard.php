<?php
// Bikin Kodingan Controller dashboard
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('id')) {
            $this->session->set_flashdata('failed', 'maaf anda belom login');
            redirect(base_url('login'));
        }
    }
    public function index()
    {
        // data untuk dikirim ke view
        $data = array(
            'page' => 'dashboard'
        );
        // echo "ini halaman dashboard";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }
}
// di dalamnya bikin fungsi index yang mena mpilkan tulisan "ini halaman dahsboard"
