<?php

class Model_device extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_device');
    }

    public function tampil_data_id()
    {
        $id = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tb_device');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function tambah_device($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_device($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_device($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data); 
    }

    public function hapus_device($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
