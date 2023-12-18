<?php

class Model_kerusakan extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_kerusakan');
    }

    public function tambah_kerusakan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_kerusakan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_kerusakan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data); 
    }

    public function hapus_kerusakan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}