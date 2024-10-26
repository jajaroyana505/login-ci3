<?php
class JabatanModel extends CI_Model
{
    public function simpan(array $data)
    {
        //proses simmpan kedatabase
        $this->db->insert('jabatan',  $data);
    }

    public function getByid($id)
    {
        $data = $this->db->query("SELECT * FROM jabatan WHERE id = $id;");
        return $data;
    }

    public function getAll()
    {
        $data = $this->db->query("SELECT * FROM jabatan;");
        return $data;
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jabatan');
    }

    public function edit($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('jabatan', $data);
    }
}
