<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpanel extends CI_Controller {

    public function index() {
        $this->load->view('admin/login');
    }

    public function login() {
        $this->load->model('Madmin');
        $u = $this->input->post('username');
        $p = $this->input->post('password');
        
        $cek = $this->Madmin->cek_login($u);

        if ($cek) {
            if ($cek['password'] == $p) {
                $data_session = array(
                    'userName' => $u,
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                redirect('kategori');
            } else {
                $this->session->set_flashdata('error', 'Password yang Anda Inputkan Salah. Silahkan Coba Lagi!');
                redirect('adminpanel');
            }
        } else {
            $this->session->set_flashdata('error', 'Username yang Anda Inputkan Salah. Silahkan Coba Lagi!');
            redirect('adminpanel');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('adminpanel');
    }
}
