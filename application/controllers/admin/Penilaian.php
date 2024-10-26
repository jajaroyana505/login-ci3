<?php

class Penilaian extends CI_Controller

{
    public function index()
    {
        $this->load->model('PenilaianModel');
        $data = [
            "page" => "Penilaian",
            "pegawai" => $this->PenilaianModel->getAll()->result_array()
        ];

        $this->load->view('admin/header', $data);
        $this->load->view('admin/penilaian', $data);
        $this->load->view('admin/footer');
    }



    public function penilaian_pegawai($id)
    {

        $this->load->model('PegawaiModel');
        $this->load->model('PenilaianModel');

        $result = $this->PenilaianModel->get_kriteria_with_keterangan();
        // Array untuk menampung hasil akhir
        $grouped_data = [];

        // Loop untuk mengelompokkan data berdasarkan 'kode' dan 'nama_kriteria'
        foreach ($result as $row) {
            $kode = $row['kode'];
            $nama_kriteria = $row['nama_kriteria'];

            // Jika kategori belum ada di array, tambahkan
            if (!isset($grouped_data[$kode])) {
                $grouped_data[$kode] = [
                    'kode' => $kode,
                    'nama_kriteria' => $nama_kriteria,
                    'keterangan' => []
                ];
            }

            // Tambahkan keterangan ke dalam array keterangan untuk kategori tersebut
            $grouped_data[$kode]['keterangan'][] = [
                'id_ket' => $row['id_ket'],
                'max' => $row['max'],
                'min' => $row['min'],
                'keterangan' => $row['keterangan']
            ];
        }

        // Ubah array dari associative ke indexed
        $grouped_data = array_values($grouped_data);




        $data = [
            "page" => "Penilaian",
            "pegawai" => $this->PegawaiModel->getById($id)->row_array(),
            "kriteria" => $grouped_data,
        ];

        $this->load->view('admin/header', $data);
        $this->load->view('admin/penilaian_pegawai', $data);
        $this->load->view('admin/footer');
    }

    public function create()
    {
        $this->load->model('PenilaianModel');

        // Ambil data dari form
        $nip_pegawai = $this->input->post('nip_pegawai'); // Ambil NIP Pegawai (array)
        $kode_kriteria = $this->input->post('kode_kriteria'); // Ambil Kode Kriteria (array)
        $nilai = $this->input->post('nilai'); // Ambil Nilai (array)

        // Pastikan jumlah data konsisten
        if (count($nip_pegawai) === count($kode_kriteria) && count($kode_kriteria) === count($nilai)) {
            // Siapkan array data untuk batch insert
            $data = array();
            for ($i = 0; $i < count($nip_pegawai); $i++) {
                $data[] = array(
                    'nip_pegawai' => $nip_pegawai[$i],
                    'kode_kriteria' => $kode_kriteria[$i],
                    'nilai' => $nilai[$i]
                );
            }

            // Panggil fungsi batch insert di model
            $this->PenilaianModel->insert_batch($data);

            // Redirect setelah berhasil simpan
            redirect(base_url('admin/penilaian'));
        } else {
            // Jika data tidak konsisten, tampilkan error
            echo "Data tidak valid.";
        }


        // echo "<pre>";
        // var_dump();
        // echo "</pre>";
    }

    public function detail($id_pegawai)
    {
        $this->load->model('PegawaiModel');
        $this->load->model('PenilaianModel');
        $data_pegawai = $this->PegawaiModel->getByid($id_pegawai)->row_array();
        $data_nilai = $this->PenilaianModel->getAllByNip($data_pegawai['nip'])->result_array();
        $data = [
            'page' => 'Penilaian',
            'pegawai' => $data_pegawai,
            'nilai' => $data_nilai,
        ];

        $this->load->view('admin/header', $data);
        $this->load->view('admin/penilaian_detail', $data);
        $this->load->view('admin/footer');
    }
}
