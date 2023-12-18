<?php

class Model_user extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_user');
    }

    public function tambah_user($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_user($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_user($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data); 
    }

    public function hapus_user($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function user_by_id()
    {
        $id = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
