<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->library('form_validation'); 
		$this->load->model('MPesanan');
		$this->load->model('MKategori');
		$this->load->model('MPembeli');
		$this->load->model('MPaketmenu');
	}
    public function index() {
        $data['pesan'] = $this->MPesanan->get_all_orders();
        $data['pesanan'] = $this->MPesanan->get_pesanan();
		$data['user'] = $this->MPembeli->get_all_data();
		$data['paketmenu'] = $this->MPaketmenu->get_all_data_paket();
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/pesanan/tampil', $data);
        $this->load->view('admin/layout/footer');
    }
    public function add() {
		$data = array(
			'kategori' => $this->MKategori->get_all_data(),
			'paketmenu' => $this->MPaketmenu->get_all_data_paket(),
			'user' => $this->MPembeli->get_all_data()
		);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/pesanan/formAdd',$data);
        $this->load->view('admin/layout/footer');
    }
    
   public function save() {
    $this->load->model('MPesanan');

    // Prepare the data for tbl_pesanan
    $dataPesanan = array(
        'idPembeli' => $this->input->post('idPembeli'),
        'alamatPengiriman' => $this->input->post('alamatPengiriman'),
        'tglPesan' => $this->input->post('tglPesan'),
        'tglPengiriman' => $this->input->post('tglPengiriman'),
        'jam' => $this->input->post('jam'),
        'totalHarga' => $this->input->post('totalHarga'),
		'idPaketMenu' => $this->input->post('idPaketMenu'),
    );

    // Insert into tbl_pesanan and retrieve the inserted idPesanan
   $id_pesanan = $this->MPesanan->simpan_pesanan($dataPesanan);

    // Prepare the data for tbl_detailpesanan
    $dataDetailPesanan = array(
        'idPesanan' => $id_pesanan,
        'idPaketMenu' => $this->input->post('idPaketMenu'),
        'quantity' => $this->input->post('quantity'),
        'subtotal' => $this->input->post('quantity') * $this->input->post('harga')
    );

    // Insert into tbl_detailpesanan
    $this->MPesanan->insert('tbl_detailpesanan', $dataDetailPesanan);

    // Redirect to the pesanan index page
    redirect('pesanan');
}

public function update($id_pesanan) {
    $this->load->model('MPesanan');

    // Prepare the updated data for tbl_pesanan
    $dataPesanan = array(
        'idPembeli' => $this->input->post('idPembeli'),
        'alamatPengiriman' => $this->input->post('alamatPengiriman'),
        'tglPesan' => $this->input->post('tglPesan'),
        'tglPengiriman' => $this->input->post('tglPengiriman'),
        'jam' => $this->input->post('jam'),
        'totalHarga' => $this->input->post('totalHarga'),
		'idPaketMenu' => $this->input->post('idPaketMenu'),
    );

    // Update tbl_pesanan based on idPesanan
    $this->MPesanan->update_pesanan($id_pesanan, $dataPesanan);

    // Prepare the updated data for tbl_detailpesanan
    $dataDetailPesanan = array(
        'idPaketMenu' => $this->input->post('idPaketMenu'),
        'quantity' => $this->input->post('quantity'),
        'subtotal' => $this->input->post('quantity') * $this->input->post('harga')
    );

    // Update tbl_detailpesanan based on idPesanan
    $this->MPesanan->update_detail_pesanan($id_pesanan, $dataDetailPesanan);

    // Redirect to the pesanan index page
    redirect('pesanan');
}


public function delete($id) {
	$this->MPesanan->delete_pesanan($id);
	redirect('pesanan');
}

}    

