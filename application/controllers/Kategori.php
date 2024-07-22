<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation'); 
		$this->load->model('MKategori');
	}

	public function index(){
		$data =  array(
			'judul' => 'Kategori',
			'page' => 'kategori/tampil',
			'kat' => $this->MKategori->get_all_data()
		);
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/kategori/tampil', $data);
		$this->load->view('admin/layout/footer');
	}

	public function add(){
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/kategori/formAdd');
		$this->load->view('admin/layout/footer');
    }   

	public function save(){
		$idKat = $this->input->post('idKat');
        $namaKat = $this->input->post('namaKat');

        // Upload gambar jika ada
        $config['upload_path'] = FCPATH . 'assets/admin/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048; // ukuran maksimal 2MB
        $this->load->library('upload', $config);

       // Proses upload gambar
			 $uploadData = array();
			 foreach (['gambarKat'] as $field) {
				if ($this->upload->do_upload($field)) {
					$uploadData[$field] = $this->upload->data('file_name');
				} else {
					// Handle error upload, jika diperlukan
					$uploadData[$field] = ''; // atau set default jika diperlukan
				}
			}
        // Data untuk disimpan ke database
        $data = array(
            'idKat' => $idKat,
            'namaKat' => $namaKat,
            'gambarKat' => $uploadData['gambarKat'],
        );

        // Simpan data gambar ke tbl_kategori
		$this->load->model('MKategori');
		$this->MKategori->insert('tbl_kategori', $data);
	
		redirect('kategori');
    }
	public function get_by_id($idKat) {
		$this->load->model('MKategori');
		$dataWhere = array('idKat' => $idKat); // Menambahkan parameter dataWhere
		$data['kategori'] = $this->MKategori->get_by_id('tbl_kategori', $dataWhere)->row_object();
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/kategori/formEdit', $data);
		$this->load->view('admin/layout/footer');
	}
	public function edit() {
		$idKat = $this->input->post('idKat'); 
		$namaKategori = $this->input->post('namaKat');
	
		// Handle file upload
		if (!empty($_FILES['gambarKat']['name'])) {
			$config['upload_path'] = './assets/admin/images/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $idKat . '_' . $_FILES['gambarKat']['name'];
	
			$this->load->library('upload', $config);
	
			if ($this->upload->do_upload('gambarKat')) {
				$uploadData = $this->upload->data();
				$gambarKat = $uploadData['file_name'];
				$dataUpdate['gambarKat'] = $gambarKat;
			}
		}
	
		$dataUpdate['namaKat'] = $namaKategori;
		
		$this->load->model('MKategori');
		$this->MKategori->update('tbl_kategori', $dataUpdate, 'idKat', $idKat);
		redirect('kategori');
	}

	public function delete($id){
	 // Hapus data cottage dan gambarnya berdasarkan idKat
	 $this->MKategori->delete('tbl_kategori', 'idKat', $id);
	 // Redirect kembali ke halaman kategori
	 redirect('kategori'); 
	}
}

