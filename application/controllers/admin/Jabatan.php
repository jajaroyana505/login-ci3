<?php

class Jabatan extends CI_Controller
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
        $data = [
            'page' => 'jabatan',
            'jabatan' => $this->db->get('jabatan')->result_array()
        ];

        $this->load->view('admin/header', $data);
        $this->load->view('admin/jabatan', $data);
        $this->load->view('admin/footer');
    }
    public function create()
    {
        //menetapkan rull pada masing masing inputan
        $this->form_validation->set_rules('kode_jabatan', 'Kode_jabatan', 'required');
        $this->form_validation->set_rules('nama_jabatan', 'nama_jabatan', 'required');

        //cek validasi apakah sudah di jalankan apa belum?
        if ($this->form_validation->run() == FALSE) {
            //jika gagal kembalikan ke halaman formulir jabatan dengan pesan kesalahan
            //jika belum tambahkan formulir tambah jabatan
            $data = array(
                'page' => 'jabatan',
                'jabatan' => $this->db->get('jabatan')->result_array()
            );
            $this->load->view('admin/header', $data);
            $this->load->view('admin/jabatan_tambah', $data);
            $this->load->view('admin/footer');
        } else {
            // echo "masuk";
            // die;
            $this->load->model('JabatanModel');
            //parshing data dari formulir jabatan
            $data = [
                "kode" => $this->input->post('kode_jabatan'),
                "nama_jabatan" => $this->input->post('nama_jabatan'),
            ];
            //jika sudah tervalidasi  proses simpan data ke database
            $this->JabatanModel->simpan($data);
            //jika berhasil kembalikan ke halaman jabatan dengan notifikasi data berhasil di simpan
            $this->session->set_flashdata('success', 'Data berhasil di simpan');
            redirect(base_url('jabatan'));
        }
    }


    public function edit($id)
    {
        $this->load->model('JabatanModel');
        $this->form_validation->set_rules('kode_jabatan', 'Kode_jabatan', 'required');
        $this->form_validation->set_rules('nama_jabatan', 'nama_jabatan', 'required');

        //cek validasi apakah sudah di jalankan apa belum?
        if ($this->form_validation->run() == FALSE) {
            //jika gagal kembalikan ke halaman formulir jabatan dengan pesan kesalahan
            //jika belum tambahkan formulir tambah jabatan
            $data = array(
                'page' => 'jabatan',
                'jabatan' => $this->JabatanModel->getById($id)->row_array()
            );
            $this->load->view('admin/header', $data);
            $this->load->view('admin/jabatan_edit', $data);
            $this->load->view('admin/footer');
        } else {
            // echo "masuk";
            // die;
            $this->load->model('JabatanModel');
            //parshing data dari formulir jabatan
            $data = [
                "kode" => $this->input->post('kode_jabatan'),
                "nama_jabatan" => $this->input->post('nama_jabatan'),
            ];
            //jika sudah tervalidasi  proses simpan data ke database
            $this->JabatanModel->simpan($data);
            //jika berhasil kembalikan ke halaman jabatan dengan notifikasi data berhasil di simpan
            $this->session->set_flashdata('success', 'Data berhasil di ubah');
            redirect(base_url('jabatan'));
        }
    }
}
