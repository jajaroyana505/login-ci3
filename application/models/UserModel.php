<?php

class UserModel extends CI_Model
{
    public function simpan($data)
    {
        return $this->db->insert('users', $data);
    }
}
