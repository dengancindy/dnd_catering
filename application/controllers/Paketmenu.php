<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paketmenu extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation'); 
		$this->load->model('MPaketmenu');
		$this->load->model('MKategori');
		$this->load->model('M_halaman_utama');
	}
    public function index(){
		$data =  array(
			'judul' => 'Paketmenu',
			'page' => 'paketmenu/tampil',
			'pakmen' => $this->MPaketmenu->get_all_with_category(),
		);
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/paketmenu/tampil', $data);
		$this->load->view('admin/layout/footer');
	}
	 // Fungsi untuk menampilkan form tambah data paket menu
	 public function add() {
        $data = array(
            'judul' => 'Tambah Paket Menu',
            'page' => 'paketmenu/add',
            'kategori' => $this->MKategori->get_all_data()// Ambil semua data kategori
        );
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/paketmenu/formAdd', $data);
        $this->load->view('admin/layout/footer');
    }
	  // Fungsi untuk menyimpan data paket menu
	  public function save() {
        // Validasi form
        $this->form_validation->set_rules('idPaketMenu', 'ID Paket Menu', 'required');
        $this->form_validation->set_rules('namaKat', 'Kategori', 'required');
        $this->form_validation->set_rules('namaPaketMenu', 'Nama Paket Menu', 'required');
        // Upload gambar jika ada
        $config['upload_path'] = FCPATH . 'assets/admin/images/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG';
        $config['max_size'] = 2048; // ukuran maksimal 2MB
        $this->load->library('upload', $config);

     

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form kembali dengan error
            $this->add();
        } else {
              // Proses upload gambar
			 $uploadData = array();
			 foreach (['gambar'] as $field) {
				if ($this->upload->do_upload($field)) {
					$uploadData[$field] = $this->upload->data('file_name');
				} else {
					// Handle error upload, jika diperlukan
					$uploadData[$field] = ''; // atau set default jika diperlukan
				}
			}

            // Ambil nama kategori dari form
            $namaKat = $this->input->post('namaKat');
            // Cari id kategori berdasarkan nama kategori
            $kategori = $this->MKategori->get_by_name($namaKat);
            $idKat = $kategori->idKat;

            // Siapkan data untuk disimpan
            $data = array(
                'idPaketMenu' => $this->input->post('idPaketMenu'),
                'idKat' => $idKat,
                'namaPaketMenu' => $this->input->post('namaPaketMenu'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'gambar' => $uploadData['gambar'], // Fungsi upload gambar, implementasikan sesuai kebutuhan Anda
            );

            // Simpan data ke database
            $this->MPaketmenu->insert('tbl_paketmenu', $data);
            // Redirect ke halaman paket menu
            redirect('paketmenu');
        }
    }
    public function get_by_id($id) {
        $data = array(
            'judul' => 'Edit Paket Menu',
            'page' => 'paketmenu/edit',
            'paketmenu' => $this->MPaketmenu->get_by_id($id),
            'kategori' => $this->MKategori->get_all_data() // Ambil semua data kategori
        );
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/paketmenu/formEdit', $data);
        $this->load->view('admin/layout/footer');
    }

    // Fungsi untuk mengupdate data
    public function edit($id) {
        // Validasi form
        $this->form_validation->set_rules('namaKat', 'Kategori', 'required');
        $this->form_validation->set_rules('namaPaketMenu', 'Nama Paket Menu', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form kembali dengan error
            $this->get_by_id($id);  // Panggil fungsi get_by_id untuk memuat form edit dengan data
        } else {
            // Proses upload gambar jika ada
            $config['upload_path'] = FCPATH . 'assets/admin/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);
    
            $gambar = '';
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
            } else {
                $gambar = $this->input->post('gambar_lama');
            }
    
            // Ambil nama kategori dari form
            $namaKat = $this->input->post('namaKat');
            // Cari id kategori berdasarkan nama kategori
            $kategori = $this->MKategori->get_by_name($namaKat);
            $idKat = $kategori->idKat;
    
            // Siapkan data untuk diupdate
            $data = array(
                'idKat' => $idKat,
                'namaPaketMenu' => $this->input->post('namaPaketMenu'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'gambar' => $gambar,
            );
    
            // Update data ke database
            $this->MPaketmenu->update('tbl_paketmenu', $data, 'idPaketMenu', $id);
            // Redirect ke halaman paket menu
            redirect('paketmenu');
        }
    }

    

	// Fungsi untuk menghapus data
	public function delete($id) {
		// Hapus data berdasarkan ID
		$this->MPaketmenu->delete('tbl_paketmenu', 'idPaketMenu', $id);
		// Redirect ke halaman paket menu
		redirect('paketmenu');
	}

	public function detail_paket($idPaketMenu)
	{
		$data = array(

			'title' => "Detail Paket Menu",
			'paketDetail' => $this->MPaketmenu->get_by_id($idPaketMenu),
			'kategori_item' => $this->M_halaman_utama->get_data_kategori()
		);
		$this->load->view('template_pembeli/header',$data);
		$this->load->view('template_pembeli/navbar');
		$this->load->view('pembeli/detail_paket', $data);
		$this->load->view('template_pembeli/footer');
	}

}
        