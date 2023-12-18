<?php

class Model_gejala extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_gejala');
    }

    public function tambah_gejala($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_gejala($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_gejala($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data); 
    }

    public function hapus_gejala($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
