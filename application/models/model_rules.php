<?php

class Model_rules extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_rules');
    }

    public function tambah_rules($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_rules($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_rules($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data); 
    }

    public function hapus_rules($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
