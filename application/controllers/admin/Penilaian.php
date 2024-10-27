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

            // simpan catatan penilaian pegawai
            $this->db->insert('catatan', [
                "nip_pegawai" =>  $nip_pegawai[1],
                "text" => $this->input->post("catatan")
            ]);

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

        $grouped_data = [];

        // Loop untuk mengelompokkan data berdasarkan 'kode' dan 'nama_kriteria'
        foreach ($data_nilai as $row) {
            $kode = $row['kode'];
            $nama_kriteria = $row['nama_kriteria'];
            $nilai = $row['nilai'];

            // Jika kategori belum ada di array, tambahkan
            if (!isset($grouped_data[$kode])) {
                $grouped_data[$kode] = [
                    'kode' => $kode,
                    'nama_kriteria' => $nama_kriteria,
                    'nilai' => $nilai,
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

        $avg = $this->db->select_avg('nilai')
            ->where('nip_pegawai', $data_pegawai['nip'])
            ->get('penilaian')
            ->row_array()['nilai'];
        $total = $this->db->select_sum('nilai')
            ->where('nip_pegawai', $data_pegawai['nip'])
            ->get('penilaian')
            ->row_array()['nilai'];
        $catatan = $this->db->get_where('catatan', ["nip_pegawai" => $data_pegawai['nip']])
            ->row_array()['text'];


        switch ($avg) {
            case ($avg > 90):
                $predikat = "A";
                break;
            case ($avg > 75):
                $predikat = "B";
                break;
            case ($avg > 60):
                $predikat = "C";
                break;
            case ($avg > 45):
                $predikat = "D";
                break;
            default:
                $predikat = "E";
                break;
        }
        $data = [
            'page' => 'Penilaian',
            'pegawai' => $data_pegawai,
            'nilai' => $grouped_data,
            'rata_rata' => $avg,
            'jumlah' => $total,
            'predikat' => $predikat,
            'catatan' => $catatan,
        ];

        $this->load->view('admin/header', $data);
        $this->load->view('admin/penilaian_detail', $data);
        $this->load->view('admin/footer');
    }

    public function print($id_pegawai)
    {
        $this->load->model('PegawaiModel');
        $this->load->model('PenilaianModel');
        $data_pegawai = $this->PegawaiModel->getByid($id_pegawai)->row_array();
        $data_nilai = $this->PenilaianModel->getAllByNip($data_pegawai['nip'])->result_array();

        $grouped_data = [];

        // Loop untuk mengelompokkan data berdasarkan 'kode' dan 'nama_kriteria'
        foreach ($data_nilai as $row) {
            $kode = $row['kode'];
            $nama_kriteria = $row['nama_kriteria'];
            $nilai = $row['nilai'];

            // Jika kategori belum ada di array, tambahkan
            if (!isset($grouped_data[$kode])) {
                $grouped_data[$kode] = [
                    'kode' => $kode,
                    'nama_kriteria' => $nama_kriteria,
                    'nilai' => $nilai,
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

        $avg = $this->db->select_avg('nilai')
            ->where('nip_pegawai', $data_pegawai['nip'])
            ->get('penilaian')
            ->row_array()['nilai'];
        $total = $this->db->select_sum('nilai')
            ->where('nip_pegawai', $data_pegawai['nip'])
            ->get('penilaian')
            ->row_array()['nilai'];
        $catatan = $this->db->get_where('catatan', ["nip_pegawai" => $data_pegawai['nip']])
            ->row_array()['text'];


        switch ($avg) {
            case ($avg > 90):
                $predikat = "A";
                break;
            case ($avg > 75):
                $predikat = "B";
                break;
            case ($avg > 60):
                $predikat = "C";
                break;
            case ($avg > 45):
                $predikat = "D";
                break;
            default:
                $predikat = "E";
                break;
        }
        $data = [
            'page' => 'Penilaian',
            'pegawai' => $data_pegawai,
            'nilai' => $grouped_data,
            'rata_rata' => $avg,
            'jumlah' => $total,
            'predikat' => $predikat,
            'catatan' => $catatan,
        ];
        $this->load->view("admin/blanko_print_penilain", $data);
    }
}
