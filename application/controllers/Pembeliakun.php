<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembeliakun extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Check if the user has admin role
        $this->load->model('MPembeli');
		$this->load->library('session');
		$this->load->library('form_validation');
    }

    
    public function register_akun() {
        $this->load->view('pembeli/register');
    }

	// public function register() 
	// {
	// 	$this->form_validation->set_rules('namaPembeli', 'Nama Pembeli', 'required');
	// 	$this->form_validation->set_rules('NIK', 'NIK Pembeli', 'required');
	// 	$this->form_validation->set_rules('alamat', 'alamat Pembeli', 'required');
	// 	$this->form_validation->set_rules('no_telp', 'no telp Pembeli', 'required');
	// 	// $this->form_validation->set_rules('no_telp', 'no telp Pembeli', 'required');
	// 	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_pembeli.email]');
    //     $this->form_validation->set_rules('nama', 'Name', 'required');
    //     $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

    //     if ($this->form_validation->run() == FALSE) {
    //         // Validation failed
    //         $this->load->view('client/auth/register');
    //     } else {
    //         // Validation passed, proceed with registration
    //         $data = array(
    //             'email' => $this->input->post('email'),
    //             'nama' => $this->input->post('nama'),
    //             'password' => md5($this->input->post('password')), // Storing password as MD5 hash
    //             'role' => 2 // Default role as user
    //         );

    //         if ($this->M_auth->register($data)) {
    //             $this->session->set_flashdata('success', 'Registration successful! You can now log in.');
    //             redirect('Auth/login');
    //         } else {
    //             $this->session->set_flashdata('error', 'Registration failed. Please try again.');
    //             $this->load->view('client/auth/register');
    //         }
    //     }
	// }


	// public function register() {
    //     // Set form validation rules
    //     $this->form_validation->set_rules('namaPembeli', 'Nama Pembeli', 'required');
    //     $this->form_validation->set_rules('NIK', 'nik', 'required');
    //     $this->form_validation->set_rules('gender', 'Gender', 'required');
    //     $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    //     $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required');
    //     $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_pembeli.email]');
    //     $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        
    //     if ($this->form_validation->run() == FALSE) {
    //         // Validation failed
    //         $this->load->view('pembeli/register');
    //     } else {
    //         // Validation passed, proceed with registration
    //         $data = array(
    //             'namaPembeli' => $this->input->post('namaPembeli'),
    //             'NIK' => $this->input->post('NIK'),
    //             'gender' => $this->input->post('gender'),
    //             'alamat' => $this->input->post('alamat'),
    //             'no_telp' => $this->input->post('no_telp'),
    //             'email' => $this->input->post('email'),
    //             'password' => md5($this->input->post('password')), // Storing password as MD5 hash
                
    //             'role' => 2 // Default role as user
    //         );

    //         if ($this->MPembeli->register($data)) {
    //             $this->session->set_flashdata('success', 'Registration successful! You can now log in.');
    //             redirect('pembeliakun/login_akun');
    //         } else {
    //             $this->session->set_flashdata('error', 'Registration failed. Please try again.');
    //             $this->load->view('pembeli/regsiter_akun');
    //         }
    //     }
    // }

	public function register() {
    // Set form validation rules
    $this->form_validation->set_rules('namaPembeli', 'Nama Pembeli', 'required');
    $this->form_validation->set_rules('NIK', 'NIK', 'required');
    $this->form_validation->set_rules('gender', 'Gender', 'required|in_list[P,L]');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_pembeli.email]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
    
    if ($this->form_validation->run() == FALSE) {
        // Validation failed
        $this->load->view('pembeli/register');
    } else {
        // Validation passed, proceed with registration
        $data = array(
            'namaPembeli' => $this->input->post('namaPembeli'),
            'NIK' => $this->input->post('NIK'),
            'gender' => $this->input->post('gender'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'role' => 2 
        );

        // // Debug: Print data
        // echo '<pre>'; print_r($data); echo '</pre>';

        // Load model if not already loaded
        $this->load->model('MPembeli');
        
        if ($this->MPembeli->register($data)) {
            $this->session->set_flashdata('success', 'Registration successful! You can now log in.');
            redirect('pembeliakun/login_akun');
        } else {
            $this->session->set_flashdata('error', 'Registration failed. Please try again.');
            $this->load->view('pembeli/register');
        }
    }
}

    public function login_akun() {
        $this->load->view('pembeli/login');
    }

    // public function login() {
    //     $u = $this->input->post('namaPembeli');
    //     $p = $this->input->post('password');
        
    //     $cek = $this->MPembeli->cek_login($u);

    //     if ($cek) {
    //         if ($cek['password'] == md5($p)) {
    //             $data_session = array(
    //                 'namaPembeli' => $u,
    //                 'status' => 'login'
    //             );
    //             $this->session->set_userdata($data_session);
    //             redirect('HalamanUtama');
    //         } else {
    //             $this->session->set_flashdata('error', 'Password yang Anda Inputkan Salah. Silahkan Coba Lagi!');
    //             redirect('pembeliakun/login_akun');
    //         }
    //     } else {
    //         $this->session->set_flashdata('error', 'Username yang Anda Inputkan Salah. Silahkan Coba Lagi!');
    //         redirect('pembeliakun/login_akun');
    //     }
    // }

	public function do_login() {
        $namaPembeli = $this->input->post('namaPembeli');
        $password = $this->input->post('password');

        $cek = $this->MPembeli->pelanggan_login($namaPembeli, $password);
        if ($cek) {
            $idPembeli = $cek->idPembeli;
            $namaPembeli = $cek->namaPembeli;
            $email = $cek->email;
            $role = $cek->role;

            // Create session
            $this->session->set_userdata('idPembeli', $idPembeli);
            $this->session->set_userdata('email', $email);
            $this->session->set_userdata('namaPembeli', $namaPembeli);
            $this->session->set_userdata('role', $role);

            // Redirect based on role
            if ($role == 2) {
                redirect('HalamanUtama'); // Adjust the URL to your admin dashboard
            } else {
                redirect('adminpanel');
            }
        } else {
            // If login fails
            $this->session->set_flashdata('error', 'Email atau Password salah');
            redirect('pembeliakun/login_akun');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('pembeliakun/login_akun');
    }
}
?>
