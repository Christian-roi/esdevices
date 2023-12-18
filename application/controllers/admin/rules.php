<?php

class Rules extends CI_Controller
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
        $data['rules'] = $this->model_rules->tampil_data()->result();
        $data['gejala'] = $this->model_gejala->tampil_data()->result();
        $data['kerusakan'] = $this->model_kerusakan->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('rules/data_rules', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_rules()
    {
      $this->form_validation->set_rules('fault_id', 'Kerusakan', 'required|trim', [
            'required' => 'Kerusakan harus diisi!'
      ]);
      if ($this->form_validation->run() == false) {
          $data['title'] = 'Expert System Diagnosa Kerusakan Komputer dan Laptop';
          $data['rules'] = $this->model_rules->tampil_data()->result();
          $data['gejala'] = $this->model_gejala->tampil_data()->result();
          $data['kerusakan'] = $this->model_kerusakan->tampil_data()->result();
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar_admin');
          $this->load->view('rules/data_rules', $data);
          $this->load->view('templates/footer');
      } else {
          $fault_id = $this->input->post('fault_id');
          $symp_id = $this->input->post('symp_id');
          $bobot_persentase = $this->input->post('bobot_persentase');

          $data = array(
              'fault_id' => $fault_id,
              'symp_id' => $symp_id,
              'bobot_persentase' => $bobot_persentase,
          );

          $this->model_rules->tambah_rules($data, 'tb_rules');
          $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Rules berhasil ditambahkan!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
        </div>');
          redirect('admin/rules');
      }
    }

    public function edit_rules($id)
    {
        $id = $this->input->post('rules_id');

        $data = array(
          'fault_id' => $this->input->post('fault_id'),
          'symp_id' => $this->input->post('symp_id'),
          'bobot_persentase' => $this->input->post('bobot_persentase')
        );

        $where = array(
            'rules_id' => $id
        );

        $this->model_rules->update_rules($where, $data, 'tb_rules');
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        Data Rules berhasil diupdate!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;
          </span>
        </button>
      </div>');
        redirect('admin/rules');
    }

    public function hapus_rules($id)
    {
        $where = array('rules_id' => $id);
        $this->model_rules->hapus_rules($where, 'tb_rules');
        $this->db->query("ALTER TABLE tb_rules AUTO_INCREMENT = 1");
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Rules berhasil dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;
          </span>
        </button>
      </div>');
        redirect('admin/rules');
    }

}