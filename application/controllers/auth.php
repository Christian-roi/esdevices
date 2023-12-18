<?php

class Auth extends CI_Controller
{
    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username wajib diisi!'
        ]);     
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password wajib diisi!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('form_login');
            $this->load->view('templates/footer');
        } else {
            $auth = $this->model_auth->cek_login();
            if ($auth == FALSE) {
                 $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Username atau Password Anda Salah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;
              </span>
            </button>
          </div>');
                redirect(base_url('auth/login'));
            } else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('user_id', $auth->user_id);
                $this->session->set_userdata('role', $auth->role);
                switch ($auth->role) {
                    case 1:
                        redirect('admin/dashboard_admin');
                        break;
                    case 2:
                        redirect('dashboard');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', [
            'required' => 'Nama Lengkap wajib diisi!',
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]', [
            'required' => 'Username wajib diisi!',
            'is_unique' => 'Username sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password2]', [
            'required' => 'Password wajib diisi!',
            'matches' => 'Password tidak cocok!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password]', [
            'required' => 'Konfirmasi Password wajib diisi!',
            'matches' => 'Password tidak cocok!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('form_regis');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => htmlspecialchars($this->input->post('password', true)),
                'role' => 2
            ];
            $this->model_auth->register($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Akun Anda berhasil dibuat. Silahkan Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;
              </span>
            </button>
          </div>');
            redirect(base_url('auth/login'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('home'));
    }
}