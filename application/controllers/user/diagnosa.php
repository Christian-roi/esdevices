<?php

class Diagnosa extends CI_Controller
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
        $this->load->model('model_gejala');
    }
    public function index()
    {
        $data['title'] = 'Expert System Diagnosa Kerusakan Komputer dan Laptop';
        $data['gejala'] = $this->model_gejala->tampil_data()->result();
        $data['device'] = $this->model_device->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('user/diagnosa', $data);
        $this->load->view('templates/footer');
    }

    public function form_diagnosa()
    {
        $data['title'] = 'Form Diagnosa';
        $data['gejala'] = $this->model_gejala->tampil_data()->result();
        $data['device'] = $this->model_device->tampil_data_id();
        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar');
        $this->load->view('user/form_diagnosa', $data);
        $this->load->view('templates/footer');
    }

    /*
    public function insertJawaban()
    {
        $no = 1;
        foreach ($this->model_gejala->tampil_data()->result() as $p) {
            $data = array(
                'user_id' => $this->session->userdata('user_id'),
                'device_id' => $this->input->post('device_id'),
                'symp_id' => $p->symp_id,
                'jawaban' => $this->input->post('gejala_' . $no++)
            );
            $this->model_diagnosa->insertJawaban($data);
        }
        redirect('user/diagnosa');
    }
    */  

    public function insertJawaban()
    {
        $this->load->model('model_diagnosa'); // Load model yang diperlukan
        $this->load->model('model_gejala');

        // Simpan data ke tb_diagnosa
        $data_tb_diagnosa = array(
            'user_id' => $this->session->userdata('user_id'),
            'device_id' => $this->input->post('device_id'),
            'tgl_diagnosa' => date('Y-m-d H:i:s')
            // Tambahkan field lain yang diperlukan
        );
        $this->model_diagnosa->insertDiagnosa($data_tb_diagnosa); // Method untuk menyimpan ke tb_diagnosa

        $diagnosa_id = $this->db->insert_id(); // Ambil diagnosa_id yang baru saja di-generate

        // Simpan data ke tb_detail_diagnosa
        $no = 1;
        foreach ($this->model_gejala->tampil_data()->result() as $p) {
            $data_tb_detail_diagnosa = array(
                'diagnosa_id' => $diagnosa_id,
                'symp_id' => $p->symp_id,
                'jawaban' => $this->input->post('gejala_' . $no++)
            );
            $this->model_diagnosa->insertJawaban($data_tb_detail_diagnosa); // Method untuk menyimpan ke tb_detail_diagnosa
        }
        redirect('user/diagnosa/result/' . $diagnosa_id); // Redirect ke halaman result
    }

    public function result($diagnosa_id)
    {
        $data['title'] = 'Hasil Diagnosa';
        $data['diagnosa'] = $this->model_diagnosa->tampil_data_id($diagnosa_id);
        $data['detail_diagnosa'] = $this->model_diagnosa->tampil_data_detail_diagnosa($diagnosa_id);
        $data['data_jawaban'] = $this->model_diagnosa->data_jawaban($this->session->userdata('user_id'), $diagnosa_id);
        $data['data_kerusakan'] = $this->model_kerusakan->tampil_data()->result();
        $data['device'] = $this->model_device->tampil_data_id();
        $data['gejala'] = $this->model_gejala->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('user/result', $data);
        $this->load->view('templates/footer');
    }

    public function riwayat()
    {
        $data['title'] = 'Riwayat Diagnosa';
        $data['diagnosa'] = $this->model_diagnosa->tampil_data_id();
        $data['device'] = $this->model_device->tampil_data_id();
        $data['gejala'] = $this->model_gejala->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('user/riwayat', $data);
        $this->load->view('templates/footer');
    }

    public function delete($diagnosa_id)
    {
        $where = array('diagnosa_id' => $diagnosa_id);
        $this->model_diagnosa->hapus_diagnosa($diagnosa_id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Diagnosa Berhasil Dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;
          </span>
        </button>
      </div>');
        redirect('user/diagnosa/riwayat');
    }

}