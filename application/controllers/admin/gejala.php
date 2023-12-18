<?php

class Gejala extends CI_Controller
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
        $data['gejala'] = $this->model_gejala->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('gejala/data_gejala', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_gejala()
    {
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', [
            'required' => 'Keterangan harus diisi!'
        ]);
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required|trim', [
            'required' => 'Pertanyaan harus diisi!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Expert System Diagnosa Kerusakan Komputer dan Laptop';
            $data['gejala'] = $this->model_gejala->tampil_data()->result();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin');
            $this->load->view('gejala/data_gejala', $data);
            $this->load->view('templates/footer');
        } else {
            $keterangan = $this->input->post('keterangan');
            $pertanyaan = $this->input->post('pertanyaan');

            $data = array(
                'keterangan' => $keterangan,
                'pertanyaan' => $pertanyaan,
            );

            $this->model_gejala->tambah_gejala($data, 'tb_gejala');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Gejala berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;
              </span>
            </button>
          </div>');
            redirect('admin/gejala');
        }
    }

    public function edit_gejala($id)
    {
      $id = $this->input->post('symp_id');

      $data = array(
        'keterangan' => $this->input->post('keterangan'),
        'pertanyaan' => $this->input->post('pertanyaan')
      );

      $where = array(
            'symp_id' => $id
      );

      $this->model_gejala->update_gejala($where, $data, 'tb_gejala');
       $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            Data Gejala berhasil diubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;
              </span>
            </button>
          </div>');
      redirect('admin/gejala');
    }

    public function hapus_gejala($id)
    {
        $where = array('symp_id' => $id);
        $this->model_gejala->hapus_gejala($where, 'tb_gejala');
        $this->db->query("ALTER TABLE tb_gejala AUTO_INCREMENT = 1");
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Gejala berhasil dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;
              </span>
            </button>
          </div>');
        redirect('admin/gejala');
    }

}