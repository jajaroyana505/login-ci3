<?php

class Pegawai extends CI_Controller
{
    public function index()
    {
        // data untuk dikirim ke view
        $data = array(
            'page' => 'pegawai'
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/pegawai');
        $this->load->view('admin/footer');
    }

    // bikin fungsi namanya craete
    public function create()
    {
        $data = array(
            'page' => 'pegawai'
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/pegawai_tambah');
        $this->load->view('admin/footer');
    }
    // didalamnya memanggil view halaman pegawai_tambah.php
}
