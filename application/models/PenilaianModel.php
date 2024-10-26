<?php
class PenilaianModel extends CI_Model
{
    public function get_kriteria_with_keterangan()
    {
        $this->db->select('kriteria.kode, kriteria.nama_kriteria, keterangan.id_ket, keterangan.max, keterangan.min, keterangan.keterangan');
        $this->db->from('kriteria');
        $this->db->join('keterangan', 'kriteria.kode = keterangan.kode_kriteria', 'left');
        $this->db->order_by('keterangan.max', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fungsi untuk menyimpan banyak data dengan batch insert
    public function insert_batch($data)
    {
        $this->db->insert_batch('penilaian', $data);
    }

    public function getAll()
    {

        $this->db->select('pegawai.nip, pegawai.email , pegawai.id as id_pegawai, pegawai.nama, jabatan.nama_jabatan, MAX(penilaian.nilai) as nilai');
        $this->db->from('pegawai');
        $this->db->join('penilaian', 'pegawai.nip = penilaian.nip_pegawai', 'left');
        $this->db->join('jabatan', 'pegawai.kode_jabatan = jabatan.kode');
        $this->db->group_by(array('pegawai.nip', 'pegawai.id', 'pegawai.nama', 'jabatan.nama_jabatan'));  // Tambahkan semua kolom non-agregat
        return $this->db->get();
    }

    public function getAllByNip($nip_pegawai)
    {
        $this->db->select('*');
        $this->db->from('penilaian');
        $this->db->where('nip_pegawai', "$nip_pegawai");
        $this->db->join('kriteria', 'kriteria.kode = penilaian.kode_kriteria');
        return $this->db->get();
    }
}
