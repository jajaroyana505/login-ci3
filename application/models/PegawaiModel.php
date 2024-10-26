<?php
class PegawaiModel extends CI_Model
{
    public function simpan(array $data)
    {
        // proses simpan ke database
        $this->db->insert('pegawai', $data);
    }

    public function getById($id)
    {
        $data = $this->db->query("SELECT pegawai.* , jabatan.kode, jabatan.nama_jabatan FROM pegawai LEFT JOIN jabatan ON `pegawai`.`kode_jabatan`=`jabatan`.`kode` WHERE `pegawai`.`id`=$id;");
        return $data;
    }

    public function getAll()
    {
        $data = $this->db->query("SELECT pegawai.* , jabatan.nama_jabatan FROM `pegawai` LEFT JOIN `jabatan` ON `pegawai`.`kode_jabatan`=`jabatan`.`kode`;");
        return $data;
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pegawai');
    }

    public function edit($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('pegawai', $data);
    }
}
