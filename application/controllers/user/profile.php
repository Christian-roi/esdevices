<?php

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login atau tidak memiliki Hak Akses!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['title'] = 'Profile Page';
        $data['user'] = $this->model_user->user_by_id();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    //Make edit profile function
    public function edit_profile()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'nama_lengkap' => $nama,
            'username' => $username,
            'password' => $password
        );

        $where = array(
            'user_id' => $id
        );

        $this->model_user->update_user($where, $data, 'tb_user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Profil Anda Berhasil Diubah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </div>');
        redirect('user/profile');
    }
}