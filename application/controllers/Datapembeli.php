<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapembeli extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation'); 
		$this->load->model('MDatapembeli');
	}

	public function index(){
		$data =  array(
			'judul' => 'Datapembeli',
			'page' => 'datapembeli/tampil',
			'datpem' => $this->MDatapembeli->get_all_data('tbl_pembeli')->result()
		);
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/datapembeli/tampil', $data);
		$this->load->view('admin/layout/footer');
	}
    public function add(){
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/datapembeli/formAdd');
		$this->load->view('admin/layout/footer');
    }   

	public function save(){
        $NIK = $this->input->post('NIK');
        $namaPembeli = $this->input->post('namaPembeli');
        $gender = $this->input->post('gender');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');

        
        // Data untuk disimpan ke database
        $data = array(
            'NIK' => $NIK,
            'namaPembeli' => $namaPembeli,
            'gender' => $gender,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
        );
	// Panggil model untuk menyimpan data
    $this->load->model('MDatapembeli');
    $this->MDatapembeli->insert('tbl_pembeli', $data);
		redirect('datapembeli');
    }
    public function get_by_id($idPembeli) {
		$this->load->model('MDatapembeli');
		$dataWhere = array('idPembeli' => $idPembeli); // Menambahkan parameter dataWhere
		$data['datapembeli'] = $this->MDatapembeli->get_by_id('tbl_pembeli', $dataWhere)->row_object();
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/datapembeli/formEdit', $data);
		$this->load->view('admin/layout/footer');
	}
	public function edit($idPembeli) {
    // Ambil data dari form
    $NIK = $this->input->post('NIK');
    $namaPembeli = $this->input->post('namaPembeli');
    $gender = $this->input->post('gender');
    $alamat = $this->input->post('alamat');
    $no_telp = $this->input->post('no_telp');

    // Data yang akan diupdate
    $dataUpdate['NIK'] = $NIK;
    $dataUpdate['namaPembeli'] = $namaPembeli;
    $dataUpdate['gender'] = $gender;
    $dataUpdate['alamat'] = $alamat;
    $dataUpdate['no_telp'] = $no_telp;

    // Lakukan update ke database
    $this->load->model('MDatapembeli');
    $this->MDatapembeli->update('tbl_pembeli', $dataUpdate, 'idPembeli', $idPembeli);

    // Redirect kembali ke halaman datapembeli
    redirect('datapembeli');
}


	public function delete($id){
	 // Hapus data cottage dan gambarnya berdasarkan idPembeli
	 $this->MDatapembeli->delete('tbl_pembeli', 'idPembeli', $id);
	 // Redirect kembali ke halaman kategori
	 redirect('datapembeli'); 
	}
}