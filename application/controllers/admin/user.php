<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != '1') {
              $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login atau tidak memiliki Hak Akses!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;
              </span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Expert System Diagnosa Kerusakan Komputer dan Laptop';
        $data['user'] = $this->model_user->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('users/data_user', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_data_user()
    {
        $nama = $this->input->post('nama');
        $role = $this->input->post('role');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'nama_lengkap' => $nama,
            'username' => $username,
            'password' => $password,
            'role' => $role,
        );

        $this->model_user->tambah_user($data, 'tb_user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Pengguna Baru berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/user');
    }
    
    public function edit_data_user($id)
    {
        $nama = $this->input->post('nama');
        $role = $this->input->post('role');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'nama_lengkap' => $nama,
            'username' => $username,
            'password' => $password,
            'role' => $role,
        );

        $where = array(
            'user_id' => $id
        );

        $this->model_user->update_user($where, $data, 'tb_user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pengguna berhasil diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/user');
    }

    public function hapus_data_user($id)
    {
        $where = array(
            'user_id' => $id
        );

        $this->model_user->hapus_user($where, 'tb_user');
        $this->db->query("ALTER TABLE tb_user AUTO_INCREMENT = 1");
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pengguna berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/user');
    }

}