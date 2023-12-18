<?php

class Perangkat extends CI_Controller
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
        $data['title'] = 'Expert System Diagnosa Kerusakan Komputer dan Laptop';
        $data['devices'] = $this->model_device->tampil_data_id();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('user/perangkat', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_device()
    {
        $this->form_validation->set_rules('nama_perangkat', 'Nama Perangkat', 'required|trim', [
              'required' => 'Nama Perangkat harus diisi!'
        ]);
       if($this->form_validation->run() == false){
            $data['title'] = 'Expert System Diagnosa Kerusakan Komputer dan Laptop';
            $data['devices'] = $this->model_device->tampil_data_id();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('user/perangkat', $data);
            $this->load->view('templates/footer');
        }else{
            $nama_perangkat = $this->input->post('nama_perangkat');
            $jenis = $this->input->post('jenis');
            $processor = $this->input->post('processor');
            $jenis_ram = $this->input->post('jenis_ram');
            $jenis_penyimpanan = $this->input->post('jenis_penyimpanan');
            $sistem_operasi = $this->input->post('sistem_operasi');
            $status_garansi = $this->input->post('status_garansi');
            $user_id = $this->session->userdata('user_id');

            $data = array(
                'user_id' => $user_id,
                'nama_perangkat' => $nama_perangkat,
                'jenis' => $jenis,
                'processor' => $processor,
                'jenis_ram' => $jenis_ram,
                'jenis_penyimpanan' => $jenis_penyimpanan,
                'sistem_operasi' => $sistem_operasi,
                'status_garansi' => $status_garansi
            );

            $this->model_device->tambah_device($data, 'tb_device');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Perangkat berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;
              </span>
            </button>
          </div>');
            redirect('user/perangkat');
        }
    }

    public function edit_device($id)
    {
        $id = $this->input->post('device_id');

        $data = array(
          'nama_perangkat' => $this->input->post('nama_perangkat'),
          'jenis' => $this->input->post('jenis'),
          'processor' => $this->input->post('processor'),
          'jenis_ram' => $this->input->post('jenis_ram'),
          'jenis_penyimpanan' => $this->input->post('jenis_penyimpanan'),
          'sistem_operasi' => $this->input->post('sistem_operasi'),
          'status_garansi' => $this->input->post('status_garansi')
        );

        $where = array(
            'device_id' => $id
        );

        $this->model_device->update_device($where, $data, 'tb_device');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Perangkat berhasil diubah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;
          </span>
        </button>
      </div>');
        redirect('user/perangkat');
    }

    public function hapus_device($id)
    {
        $where = array('device_id' => $id);
        $this->model_device->hapus_device($where, 'tb_device');
        $this->db->query("ALTER TABLE tb_device AUTO_INCREMENT = 1");
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Perangkat berhasil dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;
              </span>
            </button>
          </div>');
        redirect('user/perangkat');
    }
}