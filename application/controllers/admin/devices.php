<?php

class Devices extends CI_Controller
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
        $data['devices'] = $this->model_device->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('devices/data_devices', $data);
        $this->load->view('templates/footer');
    }

}