<?php

class Kerusakan extends CI_Controller
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
        $data['kerusakan'] = $this->model_kerusakan->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('kerusakan/data_kerusakan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_kerusakan()
    {
        $this->form_validation->set_rules('nama_kerusakan', 'Nama Kerusakan', 'required|trim', [
              'required' => 'Kerusakan harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Expert System Diagnosa Kerusakan Komputer dan Laptop';
            $data['kerusakan'] = $this->model_kerusakan->tampil_data()->result();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin');
            $this->load->view('kerusakan/data_kerusakan', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_kerusakan = $this->input->post('nama_kerusakan');
            $jenis = $this->input->post('jenis');

            $data = array(
                'nama_kerusakan' => $nama_kerusakan,
                'jenis' => $jenis,
            );

            $this->model_kerusakan->tambah_kerusakan($data, 'tb_kerusakan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Kerusakan berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;
              </span>
            </button>
          </div>');
            redirect('admin/kerusakan');
        }
    }

    public function edit_kerusakan($id)
    {
        $id = $this->input->post('fault_id');

        $data = array(
          'nama_kerusakan' => $this->input->post('nama_kerusakan'),
          'jenis' => $this->input->post('jenis')
        );

        $where = array(
          'fault_id' => $id
        );

        $this->model_kerusakan->update_kerusakan($where, $data, 'tb_kerusakan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
              Data Kerusakan berhasil diubah!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;
                </span>
              </button>
            </div>');
        redirect('admin/kerusakan');
    }

    public function hapus_kerusakan($id)
    {
        $where = array('fault_id' => $id);
        $this->model_kerusakan->hapus_kerusakan($where, 'tb_kerusakan');
        $this->db->query("ALTER TABLE tb_kerusakan AUTO_INCREMENT = 1");
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Kerusakan berhasil dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;
              </span>
            </button>
          </div>');
        redirect('admin/kerusakan');
    }

}